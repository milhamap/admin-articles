<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Repositories\TagRepository;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TagService
{
    private TagRepository $tagRepository;
    private Request $request;
    private TagRequest $tagRequest;

    public function __construct (TagRepository $tagRepository, Request $request, TagRequest $tagRequest)
    {
        $this->tagRepository = $tagRepository;
        $this->tagRequest = $tagRequest;
        $this->request = $request;
    }

    public function create (): bool
    {
        $validatedData = $this->tagRequest->validated();

        $this->tagRepository->create($validatedData);

        return true;
    }

    public function gets ()
    {
        return $this->tagRepository->getAll();
    }

    public function checkSlug (): string
    {
        $slug = SlugService::createSlug($this->tagRepository->getTag(), 'slug', $this->request->name);
        return $slug;
    }

    public function getTagById (int $id)
    {
        return $this->tagRepository->getOne($id);
    }

    public function getTagBySlug (string $slug)
    {
        return $this->tagRepository->getOneBySlug($slug);
    }

    public function updateBySlug (string $slug): bool
    {
        $validatedData = $this->tagRequest->validated();

        $this->tagRepository->update($slug, $validatedData);

        return true;
    }

    public function deleteBySlug (string $slug): bool
    {
        $this->tagRepository->delete($slug);

        return true;
    }
}
