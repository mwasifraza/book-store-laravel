<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Book::truncate();
  
        $data = File::get("database/data/books.json");
        $books = json_decode($data);
  
        foreach ($books as $key => $value) {
            Book::create([
                "id" => $value->id,
                "title" => $value->title,
                "description" => $value->description,
                "cover_photo" => $value->cover_photo,
                "author" => $value->author,
                "price" => $value->price,
            ]);
        }
    }
}
