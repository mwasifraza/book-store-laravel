<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::truncate();
  
        $data = File::get("database/data/categories.json");
        $categories = json_decode($data);
  
        foreach ($categories as $key => $value) {
            Category::create([
                "id" => $value->id,
                "category_name" => $value->category_name,
            ]);
        }
    }
}
