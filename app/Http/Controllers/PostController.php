<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Services\CategoryService;
use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;

class PostController extends Controller
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
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $postService = new PostService(
            $this->postRepository,
            $this->request,
            $this->postRequest
        );
        return view('posts', [
            'posts' => $postService->getPosts(),
        ]);
    }
    public function index()
    {
        $postService = new PostService(
            $this->postRepository,
            $this->request,
            $this->postRequest
        );
        return view('dashboard.posts.index', [
            'posts' => $postService->getPostByUserId(auth()->user()->id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoryService $categoryService, TagService $tagService)
    {
        return view('dashboard.posts.create', [
            'categories' => $categoryService->gets(),
            'tags' => $tagService->gets(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $postService = new PostService(
            $this->postRepository,
            $this->request,
            $this->postRequest
        );
        $postService->create();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $postService = new PostService(
            $this->postRepository,
            $this->request,
            $this->postRequest
        );
        return view('dashboard.posts.show', [
            'post' => $postService->getPostBySlug($slug),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug, CategoryService $categoryService, TagService $tagService)
    {
        $postService = new PostService(
            $this->postRepository,
            $this->request,
            $this->postRequest
        );
        return view('dashboard.posts.edit', [
            'post' => $postService->getPostBySlug($slug),
            'categories' => $categoryService->gets(),
            'tags' => $tagService->gets(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $slug)
    {
        // var_dump($this->request->all());die();
        $postService = new PostService(
            $this->postRepository,
            $this->request,
            $this->postRequest
        );
        $postService->updateBySlug($slug);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $postService = new PostService(
            $this->postRepository,
            $this->request,
            $this->postRequest
        );
        $postService->deleteBySlug($slug);

        return redirect()->route('posts.index');
    }

    public function slug () {
        $postService = new PostService(
            $this->postRepository,
            $this->request,
            $this->postRequest
        );
        $slug = $postService->checkSlug();

        return response()->json(['slug' => $slug]);
    }
}
