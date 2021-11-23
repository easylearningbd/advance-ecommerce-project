<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResourceCollection;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\VideoLesson;
use Image;

class MediaController extends Controller
{

    /**
     * @OA\Get(path="/download/{orderItemHashedKey}/{productId}/{lessonId}",
     *   tags={"Media"},
     *   summary="Returns download link",
     *   description="Returns  download link",
     *   operationId="getDownloadLink",
     *
     *   parameters={},
     *
     *
     *  @OA\Parameter(
     *       description="orderItemHashedKey",
     *       name="orderItemHashedKey",
     *       required=true,
     *       in="path",
     *       example="d167774a-5b88-434d-861d-70a16a0b3d54",
     *       @OA\Schema(
     *           type="string"
     *       )
     *   ),
     *
     *  @OA\Parameter(
     *       description="productId",
     *       name="productId",
     *       required=true,
     *       in="path",
     *       example="1",
     *       @OA\Schema(
     *           type="integer",
     *           format="int64"
     *       )
     *   ),
     *
     *  @OA\Parameter(
     *       description="lessonId",
     *       name="lessonId",
     *       required=true,
     *       in="path",
     *       example="1",
     *       @OA\Schema(
     *           type="integer",
     *           format="int64"
     *       )
     *   ),
     *
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

    public function download($orderItemHashedKey, $productId, $lessonId)
    {
        $data = [];
        $orderItem = OrderItem::query()
            ->where('hashed_key', $orderItemHashedKey)
            ->where('product_id', $productId)
            ->firstOrFail();

        $videoLesson = VideoLesson::query()
            ->where('product_id', $productId)
            ->where('id', $lessonId)
            ->firstOrFail();

        $medias = $videoLesson->getMedia('videoList');
        $mediaItem = $medias->first();

        return response()->download($mediaItem->getPath(), $mediaItem->file_name);
    }

}
