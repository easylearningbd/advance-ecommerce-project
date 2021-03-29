<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;
use Image;
use Auth;
use Illuminate\Support\Facades\Hash;


class AdminUserController extends Controller
{
    public function AllAdminRole(){

    	$adminuser = Admin::where('type',2)->latest()->get();
    	return view('backend.role.admin_role_all',compact('adminuser'));

    } // end method 


    public function AddAdminRole(){
    	return view('backend.role.admin_role_create');
    }



 public function StoreAdminRole(Request $request){
   	 

    	$image = $request->file('profile_photo_path');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
    	$save_url = 'upload/admin_images/'.$name_gen;

	Admin::insert([
		'name' => $request->name,
		'email' => $request->email,
		'password' => Hash::make($request->password),
		'phone' => $request->phone,
		'brand' => $request->brand,
		'category' => $request->category,
		'product' => $request->product,
		'slider' => $request->slider,
		'coupons' => $request->coupons,

		'shipping' => $request->shipping,
		'blog' => $request->blog,
		'setting' => $request->setting,
		'returnorder' => $request->returnorder,
		'review' => $request->review,

		'orders' => $request->orders,
		'stock' => $request->stock,
		'reports' => $request->reports,
		'alluser' => $request->alluser,
		'adminuserrole' => $request->adminuserrole,
		'type' => 2,
		'profile_photo_path' => $save_url,
		'created_at' => Carbon::now(),
		 

    	]);

	    $notification = array(
			'message' => 'Admin User Created Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('all.admin.user')->with($notification);

    } // end method 





}
 