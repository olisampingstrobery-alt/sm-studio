<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Fix enum to match application code (routes/web.php and InquiryController)
        // Previously: ['new','contacted','in_progress','closed','spam'] default 'new'
        // Now: ['pending','contacted','completed','rejected'] default 'pending'
        // This fixes: SQLSTATE[01000]: Warning: 1265 Data truncated for column 'status' at row 1 when inserting 'pending'
        DB::statement("ALTER TABLE inquiries MODIFY status ENUM('pending','contacted','completed','rejected') DEFAULT 'pending' NOT NULL");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE inquiries MODIFY status ENUM('new','contacted','in_progress','closed','spam') DEFAULT 'new' NOT NULL");
    }
};
