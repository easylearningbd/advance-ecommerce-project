<?php


namespace App\Interfaces\Repositories;


interface CategoryRepository
{
    public function index();

    public function show(int $category_id);

    public function store();

    public function update();

    public function destroy();
}
