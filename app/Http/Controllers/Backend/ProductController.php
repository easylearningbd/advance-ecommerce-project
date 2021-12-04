<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Prod;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\VideoLesson;
use App\Services\MediaHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Image;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{

    /**
     * @OA\Get(path="/api/products",
     *   tags={"Products"},
     *   summary="Returns products as json",
     *   description="Returns products",
     *   operationId="getProducts",
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
    public function index(ProductFilter $filters)
    {
        [$entries, $count, $sum] = Product::filter($filters);
        $entries = $entries->get();
        return response(new ProductResourceCollection(['data' => $entries, 'count' => $count], true));
    }

    public function index2(ProductFilter $filters)
    {
        $products = Prod::latest()->get();
        return view('backend.product.index', compact('products'));
    }

    public function create(ProductFilter $filters)
    {
        return view('backend.product.create');
    }

    /**
     * Write Your Code..
     *
     * @return string
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $valiator = $request->validate([
            'name' => 'required',
//            'detail' => 'required',
            'image' => 'required',
        ]);

        $videoLesson = new VideoLesson();
        $videoLesson->lesson_name = $request->name;
        $videoLesson->product_id = $request->product_id;
        $videoLesson->save();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $videoLesson->addMediaFromRequest('image')->toMediaCollection('videoList');
        }

        return redirect()->route('product.view.video.lessons.list', $request->product_id);

    }

    /**
     * @OA\Get(path="/api/products/{productId}",
     *   tags={"Products"},
     *   summary="Returns product by id as json",
     *   description="Returns products by id",
     *   operationId="getProductsbyid",
     *
     *  @OA\Parameter(
     *       description="ID of product",
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
    public function show(int $productId)
    {
        $entry = Product::query()->findOrFail($productId);
        $entry['user_order_date'] = $entry->user_order_date;
        $videoLessons = VideoLesson::query()->where('product_id', $productId)->get();
        $entry['lessons'] = $videoLessons;

        foreach ($entry['lessons'] as $key => $videoLesson) {
            $medias = $videoLesson->getMedia('videoList');
            $mediaItem = $medias->first();
            $videoLink = $this->getLessonVideoDownloadLink($videoLesson);
            $entry['lessons'][$key]['video'] = $videoLink;
        }

        return response(new ProductResource(['data' => $entry]));
    }

    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));

    }


    public function StoreProduct(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        ]);

        if ($files = $request->file('file')) {
            $destinationPath = 'storage/upload/pdf'; // upload path
            $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $digitalItem);
        }


        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('storage/upload/products/thambnail/' . $name_gen);
        $save_url = 'storage/upload/products/thambnail/' . $name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thambnail' => $save_url,

            'digital_file' => $digitalItem,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);


        ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('storage/upload/products/multi-image/' . $make_name);
            $uploadPath = 'storage/upload/products/multi-image/' . $make_name;

            MultiImg::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);

        }

        ////////// Een Multiple Image Upload Start ///////////


        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    }


    public function ManageProduct()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }


    public function EditProduct($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subSubCategory = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('categories', 'brands', 'subcategory', 'subSubCategory', 'products', 'multiImgs'));
    }


    public function viewVideoLessonsList($productId)
    {
        $videoLessons = VideoLesson::where('product_id', $productId)->get();

        return view('backend.product.product_view_video_lessons_list', compact('videoLessons', 'productId'));
    }


    public function UploadVideoLesson($productId)
    {
        return view('backend.product.product_edit_media', compact('productId'));
    }

    public function MultiMediaUpdate(Request $request, int $productId)
    {
//        dd($productId);
        $products = Product::query()->findOrFail($productId);
        if ($request->hasFile('video') && $request->file('video')->isValid()) {
            $products->addMediaFromRequest('video')->toMediaCollection('videoList');
            $notification = array(
                'message' => 'Product Media Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('product.view.video.lessons.list', $productId)->with($notification);
        }
        $notification = array(
            'message' => 'Product Media Failed',
            'alert-type' => 'error'
        );

        return redirect()->route('product.edit.media', $productId)->with($notification);
    }

    public function MultiMediaDelete($videoLessonId)
    {
        $videoLesson = VideoLesson::query()->findOrFail($videoLessonId);
        $videoLesson->delete();

        $medias = $videoLesson->getMedia('videoList');
        $media = $medias->first();
        $myMedia = Media::find($media->id);
        $myMedia->update(['collection_name' => 'videoListDeleted']);
        Artisan::call('media-library:regenerate --ids=' . $myMedia->id);


        $notification = array(
            'message' => 'Product Media Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.view.video.lessons.list', $videoLesson->product_id)->with($notification);
    }

    public function ProductDataUpdate(Request $request)
    {

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    }


/// Multiple Image Update
    public function MultiImageUpdate(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);

            if (file_exists($imgDel->photo_name)) {
                unlink($imgDel->photo_name);
            }

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('storage/upload/products/multi-image/' . $make_name);
            $uploadPath = 'storage/upload/products/multi-image/' . $make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


    /// Product Main Thambnail Update ///
    public function ThambnailImageUpdate(Request $request)
    {
        $pro_id = $request->id;
        $oldImage = $request->old_img;

        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('storage/upload/products/thambnail/' . $name_gen);
        $save_url = 'storage/upload/products/thambnail/' . $name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Image Thambnail Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


    //// Multi Image Delete ////
    public function MultiImageDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);

        if (file_exists($oldimg)) {
            unlink($oldimg->photo_name);
        }

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function ProductDelete($id)
    {
        $product = Product::findOrFail($id);

        if (file_exists($product->product_thambnail)) {
            unlink($product->product_thambnail);
        }

        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $img) {
            if (file_exists($img->photo_name)) {
                unlink($img->photo_name);
            }

            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// end method


    // product Stock
    public function ProductStock()
    {

        $products = Product::latest()->get();
        return view('backend.product.product_stock', compact('products'));
    }

    /**
     * @param $isFreeLesson
     * @param $videoLesson
     * @return string
     */
    private function getLessonVideoDownloadLink($videoLesson): string
    {
        $isFreeLesson = $videoLesson->is_free;
        return $isFreeLesson === 0 ? MediaHelper::getHashedMediaUrlByLessonId($videoLesson->id) : $videoLesson->getFirstMediaUrl('videoList');
    }


}
