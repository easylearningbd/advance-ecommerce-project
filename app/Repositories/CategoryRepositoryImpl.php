<?php


namespace App\Repositories;


use App\Interfaces\Repositories\CategoryRepository;
use App\Models\Category;

class CategoryRepositoryImpl implements CategoryRepository
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function show(int $category_id)
    {
        return Category::query()
            ->findOrFail($category_id);
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
