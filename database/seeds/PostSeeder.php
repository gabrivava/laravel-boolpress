<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newPost = new Post;
            $newPost->title = $faker->word();
            $newPost->image = $faker->imageUrl(640, 480, 'Post', true, $newPost->title);
            $newPost->paragraph = $faker->paragraph(5, true);
            $newPost->author = $faker->name();
            $newPost->save();
        }
    }
}
