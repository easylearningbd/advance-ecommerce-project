<?php


namespace App\Services;


use App\Models\OrderItem;
use App\Models\VideoLesson;

class MediaHelper
{

    public static function getHashedMediaUrlByLessonId($videoLessonId): string
    {
        $videoLesson = VideoLesson::query()->findOrFail($videoLessonId);

        $userId = request()->header('user_id');
        if (!$userId) {
            return '';
        }
        $orderItem = OrderItem::with('order')
            ->whereHas('order', function ($query) use ($userId) {
                $query->where('user_id', '=', $userId);
            })
            ->where('product_id', $videoLesson->product_id)
            ->first();
//        dd($orderItem);
        return '/download/' . $orderItem->hashed_key . '/' . $videoLesson->product_id . '/' . $videoLessonId;
    }
}
