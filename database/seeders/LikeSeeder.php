<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ownerPost = User::factory()
            ->state(['name' => 'Owner Post Like seeder'])
            ->createOne();

        $post = Post::factory()
            ->state([
                'content' => 'Like Seeder'
            ])
            ->for($ownerPost)
            ->createOne();
        
        for ($i=0; $i < 5; $i++) {
            $post->likedByUsers()
                ->attach(
                    (User::factory()
                        ->state([
                            'name' => 'User like post seeder'.$i
                        ])
                        ->createOne())->id
                );
        }
    }
}
