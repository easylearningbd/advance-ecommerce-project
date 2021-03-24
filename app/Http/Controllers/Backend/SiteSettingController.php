<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Image;

class SiteSettingController extends Controller
{
    public function SiteSetting(){

    	$setting = SiteSetting::find(1);
    	return view('backend.setting.setting_update',compact('setting'));
    }
}
 