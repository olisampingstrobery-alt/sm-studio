<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (\Illuminate\Support\Facades\Schema::getConnection()->getDriverName() !== 'mysql') {
            return;
        }
        // Skip if already correct (fresh DB has pending already from create migration)
        try {
            $columns = DB::select("SHOW COLUMNS FROM inquiries WHERE Field = 'status'");
            if (!empty($columns) && isset($columns[0]->Type) && str_contains($columns[0]->Type, "'pending'") && str_contains($columns[0]->Type, "'completed'")) {
                // Already has pending/completed enum, no need to alter
                // Also ensure default is pending - check via extra?
                return;
            }
        } catch (\Throwable $e) {
            // fallback to try alter
        }
        try {
            DB::statement("ALTER TABLE inquiries MODIFY status ENUM('pending','contacted','completed','rejected') DEFAULT 'pending' NOT NULL");
        } catch (\Throwable $e) {
            if (!str_contains($e->getMessage(), '1265') && !str_contains($e->getMessage(), 'Data truncated')) {
                throw $e;
            }
        }
    }

    public function down(): void
    {
        if (\Illuminate\Support\Facades\Schema::getConnection()->getDriverName() !== 'mysql') {
            return;
        }
        try {
            DB::statement("ALTER TABLE inquiries MODIFY status ENUM('new','contacted','in_progress','closed','spam') DEFAULT 'new' NOT NULL");
        } catch (\Throwable $e) {
            if (!str_contains($e->getMessage(), '1265') && !str_contains($e->getMessage(), 'Data truncated')) {
                throw $e;
            }
            // If data truncated, truncate table first then alter
            try {
                DB::table('inquiries')->truncate();
                DB::statement("ALTER TABLE inquiries MODIFY status ENUM('new','contacted','in_progress','closed','spam') DEFAULT 'new' NOT NULL");
            } catch (\Throwable $e2) {
                // ignore
            }
        }
    }
};
