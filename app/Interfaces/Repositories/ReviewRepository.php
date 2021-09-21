<?php


namespace App\Interfaces\Repositories;


use App\Http\Filters\ReviewFilter;
use phpDocumentor\Reflection\Types\Integer;

interface ReviewRepository
{
    public function index();

    public function get(ReviewFilter $filters, int $userId);

    public function show();

    public function store();

    public function update();

    public function destroy();
}
