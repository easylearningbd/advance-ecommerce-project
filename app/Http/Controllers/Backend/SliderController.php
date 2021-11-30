<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Filters\SliderFilter;
use App\Http\Resources\SliderResourceCollection;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{

    /**
     * @OA\Get(path="/api/sliders",
     *   tags={"Sliders"},
     *   summary="Returns sliders as json",
     *   description="Returns sliders",
     *   operationId="getSliders",
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
        [$entries, $count, $sum] = Slider::filter($filters);
        $entries = $entries->get();
        return response(new SliderResourceCollection(['data' => $entries, 'count' => $count]));
    }

    public function SliderView()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));
    }


    public function SliderStore(Request $request)
    {

        $request->validate([

            'slider_img' => 'required',
        ], [
            'slider_img.required' => 'Plz Select One Image',

        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('storage/upload/slider/' . $name_gen);
        $save_url = 'storage/upload/slider/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'group_id' => $request->group_id,
            'model_id' => $request->model_id,
            'model_name' => $request->model_name,
            'action_type' => $request->action_type,
            'action' => $request->action,
            'slider_img' => $save_url,

        ]);

        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function SliderEdit($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('sliders'));
    }


    public function SliderUpdate(Request $request)
    {

        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('slider_img')) {
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('storage/upload/slider/' . $name_gen);
            $save_url = 'storage/upload/slider/' . $name_gen;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,

            ]);

            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-slider')->with($notification);

        } else {

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,


            ]);

            $notification = array(
                'message' => 'Slider Updated Without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-slider')->with($notification);

        } // end else
    }


    public function SliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_img;

        if (file_exists($img)) {
            unlink($img);
        }

        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Delectd Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


    public function SliderInactive($id)
    {
        Slider::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Slider Inactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


    public function SliderActive($id)
    {
        Slider::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Slider Active Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


}
