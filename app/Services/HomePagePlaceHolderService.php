<?php


namespace App\Services;


use App\Interfaces\Repositories\CategoryRepository;
use App\Interfaces\Repositories\ProductRepository;
use App\Interfaces\Repositories\SliderRepository;

class HomePagePlaceHolderService
{

    public static function getContent(array $config): array
    {
//        dd($config);
        if ($config['type'] == 'slider') {
            return self::generateSliderData($config);
        } else if ($config['type'] == 'user_action') {
            return self::generateUserActionData($config);
        } else if ($config['type'] == 'product_category') {
            return self::generateData($config);
        }
    }

    private static function generateSliderData(array $config): array
    {
        $data = array();
        $data['type'] = $config['type'];
        $group_id = (integer)$config['value'];

        $data['data']['items'] = app()->make(SliderRepository::class)
            ->getGroup($group_id);
        // TODO : can we use bfliter as
        return $data;
    }

    private static function generateUserActionData(array $config): array
    {
        $data = array();
        $data['type'] = $config['type'];
        $data['key'] = $config['key'];
        $data['value'] = $config['value'];
        return $data;
    }

    private static function generateData(array $config): array
    {
        $data = array();
        $data['type'] = $config['type'];

        $categoryId = (integer)$config['category_id'];
        $productIds = (array)$config['product_ids'];

        $data['data']['items']['category'] = app()->make(CategoryRepository::class)
            ->show($categoryId);

        $data['data']['items']['products'] = app()->make(ProductRepository::class)
            ->getByIds($productIds);

        return $data;
    }
}
