<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BookCategory::truncate();
  
        $data = File::get("database/data/book_category.json");
        $book_category = json_decode($data);
  
        foreach ($book_category as $key => $value) {
            BookCategory::create([
                "book_id" => $value->book_id,
                "category_id" => $value->category_id,
            ]);
        }
    }
}
