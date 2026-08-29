<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolio';

    protected $fillable = [
        'client_id',
        'category_id',
        'title',
        'slug',
        'client_name',
        'description',
        'challenge',
        'solution',
        'process',
        'result',
        'technology',
        'featured_image',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'technology' => 'array',
        'is_featured' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}