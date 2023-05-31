<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostService
{
    private PostRepository $postRepository;
    private Request $request;
    private PostRequest $postRequest;

    public function __construct (PostRepository $postRepository, Request $request, PostRequest $postRequest)
    {
        $this->postRepository = $postRepository;
        $this->postRequest = $postRequest;
        $this->request = $request;
    }

    public function create (): bool
    {
        $validatedData = $this->postRequest->validated();

        $this->postRepository
        ->create($validatedData);

        return true;
    }

    public function getPosts () {
        return $this->postRepository->gets();
    }

    public function getCategoriesByPost () {
        return $this->postRepository->getCategoryByPost();
    }

    public function getPostByUserId (int $id) {
        return $this->postRepository->getPostByUserId($id);
    }

    public function getPostBySlug (string $slug) {
        return $this->postRepository->getPostBySlug($slug);
    }
    public function checkSlug (): string
    {
        $slug = SlugService::createSlug($this->postRepository->getPost(), 'slug', $this->request->title);
        return $slug;
    }

    public function updateBySlug (string $slug): bool
    {
        $validatedData = $this->postRequest->validated();

        $this->postRepository->update($slug, $validatedData);

        return true;
    }

    public function deleteBySlug (string $slug): bool
    {
        $this->postRepository->delete($slug);

        return true;
    }
}
