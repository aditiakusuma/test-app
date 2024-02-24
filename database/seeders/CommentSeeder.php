<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory(30)->create()->each(function ($article) {
            $numComments = rand(1, 5);
            for ($i = 0; $i < $numComments; $i++) {
                $article->comments()->create([
                    'content' => 'This is comment ' . ($i + 1) . ' for article ' . $article->id,
                    'name' => 'User ' . ($i + 1),
                    'email' => 'user'. ($i + 1) . '@gmail.com'
                ]);
            }
        });
    }
}
