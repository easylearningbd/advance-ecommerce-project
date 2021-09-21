<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Filters\ReviewFilter;
use App\Http\Resources\ReviewResourceCollection;
use App\Interfaces\Repositories\ReviewRepository;
use App\Models\Review;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    public function ReviewStore(Request $request)
    {

        $product = $request->product_id;

        $request->validate([

            'summary' => 'required',
            'comment' => 'required',
        ]);

        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'rating' => $request->quality,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Review Will Approve By Admin',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }


    public function PendingReview()
    {
        $review = Review::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('backend.review.pending_review', compact('review'));

    }


    public function ReviewApprove($id)
    {

        Review::where('id', $id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function PublishReview()
    {
        $review = Review::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('backend.review.publish_review', compact('review'));
    }

    /**
     * @OA\Get(path="/api/users/reviews",
     *   tags={"Users"},
     *   summary="Returns reviews for current users as json",
     *   description="Returns reviews",
     *   operationId="getReviews",
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
    public function productPublishedReview(ReviewFilter $filters)
    {
        $userId = request()->user()->id;
        [$items, $count, $sum] = app()->make(ReviewRepository::class)->get($filters, $userId);

        return response(new ReviewResourceCollection(['data' => $items->get(), 'count' => $count]));
    }

    public function DeleteReview($id)
    {

        Review::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Review Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method


}
