<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Filters\BrandFilter;
use App\Http\Resources\BrandResource;
use App\Http\Resources\BrandResourceCollection;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{

    /**
     * @OA\Get(path="/api/brands",
     *   tags={"Brands"},
     *   summary="Returns brands as json",
     *   description="Returns brands",
     *   operationId="getBrands",
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
    public function index(BrandFilter $filters)
    {
        [$entries, $count, $sum] = Brand::filter($filters);
        $entries = $entries->get();
        return response(new BrandResourceCollection(['data' => $entries, 'count' => $count]));
    }
    /**
     * @OA\Get(path="/api/brands/{brandId}",
     *   tags={"Brands"},
     *   summary="Returns Brand by id as json",
     *   description="Returns Brand by id",
     *   operationId="getBrandById",
     *
     *  @OA\Parameter(
     *       description="ID of BlobrandgPost",
     *       name="brandId",
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
    public function show(int $id)
    {
        $entry = Brand::query()->findOrFail($id);
        return response(new BrandResource(['data' => $entry]));
    }

    public function BrandView()
    {

        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));

    }


    public function BrandStore(Request $request)
    {

        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_image' => 'required',
        ], [
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_hin.required' => 'Input Brand Hindi Name',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('storage/upload/brand/' . $name_gen);
        $save_url = 'storage/upload/brand/' . $name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin),
            'brand_image' => $save_url,

        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function BrandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));

    }


    public function BrandUpdate(Request $request)
    {

        $brand_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('brand_image')) {

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('storage/upload/brand/' . $name_gen);
            $save_url = 'storage/upload/brand/' . $name_gen;

            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin),
                'brand_image' => $save_url,

            ]);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.brand')->with($notification);

        } else {

            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin),


            ]);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.brand')->with($notification);

        } // end else
    }


    public function BrandDelete($id)
    {

        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;

        if (file_exists($img)) {
            unlink($img);
        }

        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


}
