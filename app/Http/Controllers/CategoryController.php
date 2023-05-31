<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;


class CategoryController extends Controller
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryService = new CategoryService(
            $this->categoryRepository,
            $this->request,
            $this->categoryRequest
        );
        return view('dashboard.categories.index', [
            'categories' => $categoryService->gets()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $categoryService = new CategoryService(
            $this->categoryRepository,
            $this->request,
            $this->categoryRequest
        );

        $categoryService->create();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $categoryService = new CategoryService(
            $this->categoryRepository,
            $this->request,
            $this->categoryRequest
        );

        return view('dashboard.categories.show', [
            'category' => $categoryService->getCategoryBySlug($slug)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $categoryService = new CategoryService(
            $this->categoryRepository,
            $this->request,
            $this->categoryRequest
        );

        return view('dashboard.categories.edit', [
            'category' => $categoryService->getCategoryBySlug($slug)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $slug)
    {
        $categoryService = new CategoryService(
            $this->categoryRepository,
            $this->request,
            $this->categoryRequest
        );

        $categoryService->updateBySlug($slug);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $categoryService = new CategoryService(
            $this->categoryRepository,
            $this->request,
            $this->categoryRequest
        );

        $categoryService->deleteBySlug($slug);

        return redirect()->route('categories.index');
    }

    public function slug () {
        $categoryService = new CategoryService(
            $this->categoryRepository,
            $this->request,
            $this->categoryRequest
        );
        $slug = $categoryService->checkSlug();

        return response()->json(['slug' => $slug]);
    }
}
