<?php


namespace App\Repositories;


use App\Http\Filters\ReviewFilter;
use App\Models\Review;
use phpDocumentor\Reflection\Types\Integer;

class ReviewRepositoryImp implements \App\Interfaces\Repositories\ReviewRepository
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function get(ReviewFilter $filters, array $userId)
    {
        return Review::query()
            ->where('status', 1)
            ->where('user_id', $userId)
//            ->whereIn('product_id', $product_id)
            ->orderBy('id', 'DESC')
            ->filter($filters);
    }

    public function show()
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
