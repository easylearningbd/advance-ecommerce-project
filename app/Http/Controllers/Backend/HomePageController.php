<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Filters\SliderFilter;
use App\Http\Resources\SliderResourceCollection;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Image;

class HomePageController extends Controller
{

    /**
     * @OA\Get(path="/api/homepage",
     *   tags={"Homepage"},
     *   summary="Returns homepage as json",
     *   description="Returns homepage",
     *   operationId="getHomepage",
     *   parameters={},
     *   @OA\Response(
     *     response=200,
     *     description="successful operation",
     *     @OA\Schema(
     *       additionalProperties={
     *         "type":"integer",
     *         "format":"int32"
     *       }
     *     )
     *   )
     * )
     */
    public function index(SliderFilter $filters)
    {
        $config = config('homepage');
//        dd($config['sliders'][0]);
        $data = [];

        foreach ($config['sliders'] as $item) {
            $sliders = Slider::query()->whereIn('id', $item);
            $slidersItems = $sliders->get();
            $data['sliders'][] = $slidersItems;
        }

        foreach ($config['categories'] as $item) {
            $products = Product::query()->where('category_id', $item);
            $productItems = $products->get();
            $data['product_categories']['products'][] = $productItems;
        }

//        foreach ($config['categories'] as $key => $item) {
//            $categories = Category::query()->where('id', $item);
//            $categoryItems = $categories->get();
//            $data['products'][$key]['category'] = $categoryItems;
//        }

        foreach ($config['categories'] as $key => $item) {
            $categories = Category::query()->where('id', $item);
            $categoryItems = $categories->get();
            $data['product_categories']['categories'][] = $categoryItems;
        }

        return response(new SliderResourceCollection(['data' => $data]));
    }

}
