<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'title',
        'description',
        'cover_photo',
        'category',
        'author',
        'price',
    ];
}
