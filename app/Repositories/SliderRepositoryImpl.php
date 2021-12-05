<?php


namespace App\Repositories;


use App\Interfaces\Repositories\SliderRepository;
use App\Models\Slider;

class SliderRepositoryImpl implements SliderRepository
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function get(int $id)
    {
        return Slider::query()
            ->findOrFail($id);
    }

    public function getGroup(int $group_id)
    {
        return Slider::query()
            ->where('group_id', $group_id)
            ->orderBy('id', 'DESC')
            ->take(10)
            ->get();
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
