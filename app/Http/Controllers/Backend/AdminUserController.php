<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;
use Image;

class AdminUserController extends Controller
{
    public function AllAdminRole(){

    	$adminuser = Admin::where('type',2)->latest()->get();
    	return view('backend.role.admin_role_all',compact('adminuser'));

    } // end method 




}
 