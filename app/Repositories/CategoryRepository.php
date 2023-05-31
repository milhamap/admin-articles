<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function create (array $data): Category
    {
        return Category::create($data);
    }

    public function getAll ()
    {
        return Category::get();
    }

    public function getCategory () {
        return Category::class;
    }

    public function getOne (int $id): Category
    {
        return Category::findOrFail($id);
    }

    public function getOneBySlug (string $slug): Category
    {
        return Category::where('slug', $slug)->firstOrFail();
    }

    public function update (string $slug, array $data): bool
    {
        return Category::where('slug', $slug)->update($data);
    }

    public function delete (string $slug): bool
    {
        return Category::where('slug', $slug)->delete();
    }
}
