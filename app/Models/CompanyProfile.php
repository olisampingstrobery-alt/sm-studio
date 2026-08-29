<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tagline',
        'description',
        'vision',
        'mission',
        'core_values',
        'address',
        'phone',
        'email',
        'whatsapp',
        'logo',
        'favicon',
    ];

    protected $casts = [
        'core_values' => 'array',
    ];
}