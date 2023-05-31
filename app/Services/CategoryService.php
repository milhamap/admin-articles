<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryService
{
    private CategoryRepository $categoryRepository;
    private Request $request;
    private CategoryRequest $categoryRequest;

    public function __construct (CategoryRepository $categoryRepository, Request $request, CategoryRequest $categoryRequest)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryRequest = $categoryRequest;
        $this->request = $request;
    }

    public function create (): bool
    {
        $validatedData = $this->categoryRequest->validated();

        $this->categoryRepository->create($validatedData);

        return true;
    }

    public function gets ()
    {
        return $this->categoryRepository->getAll();
    }

    public function checkSlug (): string
    {
        $slug = SlugService::createSlug($this->categoryRepository->getCategory(), 'slug', $this->request->name);
        return $slug;
    }

    public function getCategoryById (int $id)
    {
        return $this->categoryRepository->getOne($id);
    }

    public function getCategoryBySlug (string $slug)
    {
        return $this->categoryRepository->getOneBySlug($slug);
    }

    public function updateBySlug (string $slug): bool
    {
        $validatedData = $this->categoryRequest->validated();

        $this->categoryRepository->update($slug, $validatedData);

        return true;
    }

    public function deleteBySlug (string $slug): bool
    {
        $this->categoryRepository->delete($slug);

        return true;
    }
}
