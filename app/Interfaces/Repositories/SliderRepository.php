<?php


namespace App\Interfaces\Repositories;


interface SliderRepository
{
    public function index();

    public function get(int $id);

    public function getGroup(int $group_id);

    public function show();

    public function store();

    public function update();

    public function destroy();
}
