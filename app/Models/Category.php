<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book; 

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $primaryKey = "id";

    protected $fillable = [
        'category_name',
    ];

    public function book()
    {
        return $this->hasOne(Book::class, 'category');
    }
}
