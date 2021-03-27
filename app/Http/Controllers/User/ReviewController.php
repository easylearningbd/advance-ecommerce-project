<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Auth;
use Carbon\Carbon; 


class ReviewController extends Controller
{
    public function ReviewStore(Request $request){

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
    		'created_at' => Carbon::now(),

    	]);

    	$notification = array(
			'message' => 'Review Will Approve By Admin',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);


    } // end mehtod 




}
 