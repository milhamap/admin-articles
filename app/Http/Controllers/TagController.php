<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Repositories\TagRepository;

class TagController extends Controller
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tagService = new TagService(
            $this->tagRepository,
            $this->request,
            $this->tagRequest
        );
        return view('dashboard.tags.index', [
            'tags' => $tagService->gets()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $tagService = new TagService(
            $this->tagRepository,
            $this->request,
            $this->tagRequest
        );

        $tagService->create();

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $tagService = new TagService(
            $this->tagRepository,
            $this->request,
            $this->tagRequest
        );

        return view('dashboard.tags.show', [
            'tag' => $tagService->getTagBySlug($slug)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $tagService = new TagService(
            $this->tagRepository,
            $this->request,
            $this->tagRequest
        );

        return view('dashboard.tags.edit', [
            'tag' => $tagService->getTagBySlug($slug)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $slug)
    {
        $tagService = new TagService(
            $this->tagRepository,
            $this->request,
            $this->tagRequest
        );

        $tagService->updateBySlug($slug);

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $tagService = new TagService(
            $this->tagRepository,
            $this->request,
            $this->tagRequest
        );

        $tagService->deleteBySlug($slug);

        return redirect()->route('tags.index');
    }

    public function slug () {
        $tagService = new TagService(
            $this->tagRepository,
            $this->request,
            $this->tagRequest
        );
        $slug = $tagService->checkSlug();

        return response()->json(['slug' => $slug]);
    }

}
