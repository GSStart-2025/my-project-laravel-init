<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EloquentRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_has_phone_relationship()
    {
        
        $user = User::factory()->has(Phone::factory())->create();
        
        $this->assertInstanceOf(Phone::class, $user->phone);
        $this->assertEquals($user->id, $user->phone->user_id);
    }

    public function test_user_has_posts_relationship()
    {
        $user = User::factory()->has(Post::factory()->count(3))->create();
        
        $this->assertCount(3, $user->posts);
        $this->assertInstanceOf(Post::class, $user->posts->first());
    }

    public function test_post_has_comments_relationship()
    {
        $post = Post::factory()->has(Comment::factory()->count(5))->create();
        
        $this->assertCount(5, $post->comments);
        $this->assertInstanceOf(Comment::class, $post->comments->first());
    }

    public function test_user_has_roles_relationship()
    {
        $user = User::factory()->create();
        $roles = Role::factory()->count(2)->create();
        
        $user->roles()->attach($roles);
        
        $this->assertCount(2, $user->roles);
        $this->assertInstanceOf(Role::class, $user->roles->first());
    }
}