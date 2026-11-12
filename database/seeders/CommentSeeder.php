<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = Post::factory()
            ->for(
                User::factory()
                    ->state([
                        'name' => 'Owner Post Comment seeder'
                    ])
                    ->createOne()
            )
            ->createOne();

        $loop = User::factory()->count(2)->create();

        foreach ($loop as $user) {
            Comment::factory()
                ->for($user)
                ->for($post)
                ->createOne();
        }
    }
}
