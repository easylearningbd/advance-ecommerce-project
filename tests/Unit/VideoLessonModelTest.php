<?php

namespace Tests\Feature;

use App\Models\VideoLesson;
use Tests\TestCase;

class VideoLessonModelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_an_item()
    {
        $item = new VideoLesson();
        $item->product_id = 1;
        $item->lesson_name = "lesson 2";
        $item->save();
        $this->assertDatabaseHas('video_lessons', $item->toArray());
    }
}
