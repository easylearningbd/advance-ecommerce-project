<?php


namespace App\Interfaces\Repositories;


interface ProductRepository
{
    public function index();

    public function getByIds(array $productIds);

    public function show(int $category_id);

    public function store();

    public function update();

    public function destroy();
}
