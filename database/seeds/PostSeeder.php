<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $post = new Post();
            $post->title = $faker->sentence(4);
            $post->content = $faker->paragraphs(3, true);
            $post->image = $faker->imageUrl(360, 360);
            $post->is_published = 1;
            $post->slug = Str::slug($post->title, '-');
            $post->save();
        }
    }
}
