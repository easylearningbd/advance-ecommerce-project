<?php


namespace App\Services;


use App\Http\Resources\ProductResourceCollection;
use App\Interfaces\Repositories\CategoryRepository;
use App\Interfaces\Repositories\ProductRepository;
use App\Interfaces\Repositories\SliderRepository;
use Behamin\BResources\Traits\CollectionResource;

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

        return self::generateUserActionData($config);

    }

    private static function generateSliderData(array $config): array
    {
        $data = array();
        $data['type'] = $config['type'];
        $group_id = (integer)$config['value'];

        $data['items'] = app()->make(SliderRepository::class)
            ->getGroup($group_id);
        // TODO : can we use bfliter as
        return $data;
    }

    private static function generateUserActionData(array $config): array
    {
        $data = array();
        $data['type'] = $config['type'];
        $data['title'] = $config['title'] ?? "";
        $data['key'] = $config['key'] ?? "";
        $data['value'] = $config['value'] ?? "";
        return $data;
    }

    private static function generateData(array $config): array
    {
        $data = array();
        $data['type'] = $config['type'];

        $categoryId = (integer)$config['category_id'];
        $productIds = (array)$config['product_ids'];

        $data['category'] = app()->make(CategoryRepository::class)
            ->show($categoryId);
        $products = app()->make(ProductRepository::class)
            ->getByIds($productIds);
        $data['category']['products'] = new ProductResourceCollection(['data' => $products], true);

        return $data;
    }
}
