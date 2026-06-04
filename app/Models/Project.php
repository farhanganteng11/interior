<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    use HasFactory;
    protected $fillable = [
        'title','slug','description','category','location',
        'client_name','year','area_sqm','thumbnail','gallery',
        'is_featured','sort_order'
    ];
    protected $casts = ['gallery' => 'array', 'is_featured' => 'boolean'];
}