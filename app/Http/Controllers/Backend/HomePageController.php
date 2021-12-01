<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Filters\SliderFilter;
use App\Http\Resources\SliderResourceCollection;
use App\Services\HomePagePlaceHolderService;
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
        $homePagePlaceHolderConfigs = config('homepage');

        $data = [];
        foreach ($homePagePlaceHolderConfigs as $config){
            $data[] = HomePagePlaceHolderService::getContent($config);
        }

        return response(new SliderResourceCollection(['data' => $data]));
    }

}
