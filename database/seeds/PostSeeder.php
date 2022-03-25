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
        for ($i = 0; $i < 10; $i++) {
            $post = new Post();
            $post->title = $faker->sentence();
            $post->content = $faker->paragraphs(2, true);
            $post->image = $faker->imageUrl(360, 360, 'animals', true, 'cats');
            $post->slug = Str::slug($post->title, '-');
            $post->save();
        }
    }
}
