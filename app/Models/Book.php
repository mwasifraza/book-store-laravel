<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category; 

class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $primaryKey = "id";

    protected $fillable = [
        'title',
        'description',
        'cover_photo',
        'author',
        'price',
    ];

    public function categories_info()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

}