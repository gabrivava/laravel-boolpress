<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'actuality',
            'curiosity',
            'news',
            'tech',
            'gossip'
        ];

        foreach ($categories as $category) {
            $singolaCategory = new Category();
            $singolaCategory->name = $category;
            $singolaCategory->slug = Str::slug($category);
            $singolaCategory->save();
        }
    }
}
