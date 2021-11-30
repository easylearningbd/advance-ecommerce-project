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
        if ($config['style_type'] == 'slider') {
            return self::generateSliderData($config);
        } else if ($config['style_type'] == 'user_action') {
            return self::generateUserActionData($config);
        } else if ($config['style_type'] == 'product_category') {
            return self::generateData($config);
        }

        return $config;

    }

    private static function generateSliderData(array $config): array
    {
        $data = array();
        $data['style_type'] = $config['style_type'];
        $group_id = (integer)$config['value'];

        $data['items'] = app()->make(SliderRepository::class)
            ->getGroup($group_id);
        // TODO : can we use bfliter as
        return $data;
    }

    private static function generateUserActionData(array $config): array
    {
        $data = array();
        $data['style_type'] = $config['style_type'];
        $data['title'] = $config['title'] ?? "";
        $data['action_type'] = $config['action_type'] ?? "";
        $data['action'] = $config['action'] ?? "";
        return $data;
    }

    private static function generateData(array $config): array
    {
        $data = array();
        $data['style_type'] = $config['style_type'];
        $data['action_type'] = $config['action_type'] ?? "";
        $data['action'] = $config['action'] ?? "";

        $categoryId = (integer)$config['category_id'];
        $productIds = (array)$config['product_ids'];

        $data['category'] = app()->make(CategoryRepository::class)
            ->show($categoryId);

        $data['category']['products'] = app()->make(ProductRepository::class)
            ->getByIds($productIds);

        return $data;
    }
}
