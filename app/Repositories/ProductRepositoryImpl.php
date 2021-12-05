<?php


namespace App\Repositories;


use App\Interfaces\Repositories\ProductRepository;
use App\Models\Product;

class ProductRepositoryImpl implements ProductRepository
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function getByIds(array $productIds)
    {
        return Product::query()
            ->whereIn('id', $productIds)
            ->orderBy('updated_at', 'desc')
            ->take(10)
            ->get();
    }

    public function show(int $category_id)
    {
        // TODO: Implement show() method.
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
