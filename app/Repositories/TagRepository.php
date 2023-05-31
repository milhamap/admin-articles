<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    public function create (array $data): Tag
    {
        return Tag::create($data);
    }

    public function getAll ()
    {
        return Tag::get();
    }

    public function getTag () {
        return Tag::class;
    }

    public function getOne (int $id): Tag
    {
        return Tag::findOrFail($id);
    }

    public function getOneBySlug (string $slug): Tag
    {
        return Tag::where('slug', $slug)->firstOrFail();
    }

    public function update (string $slug, array $data): bool
    {
        return Tag::where('slug', $slug)->update($data);
    }

    public function delete (string $slug): bool
    {
        return Tag::where('slug', $slug)->delete();
    }}
