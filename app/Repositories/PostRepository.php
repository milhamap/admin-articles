<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function create (array $data): Post
    {
        $post = Post::create($data);
        $post->tags()->attach($data['tags']);
        return $post;
    }

    public function update(string $slug, array $data): Post
    {
        //post data excerpt tags
        $postData = collect($data)->except('tags')->toArray();
        $post = Post::where('slug', $slug)->first();
        $post->update($postData);
        $post->tags()->sync($data['tags']);
        return $post;
    }

    public function delete(string $slug): bool
    {
        $post = Post::where('slug', $slug)->first();
        $post->tags()->detach();
        return $post->delete();
    }


    public function getPostByUserId (int $userId)
    {
        return Post::where('user_id', $userId)->get();
    }

    public function getPostBySlug (string $slug)
    {
        return Post::where('slug', $slug)->first();
    }
    public function getPost ()
    {
        return Post::class;
    }

    public function gets() {
        return Post::all();
    }

    public function getCategoryByPost ()
    {
        return Post::with('category')->get();
    }
}
