<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use Carbon\Carbon;
use App\Models\ShipDistrict;

class ShippingAreaController extends Controller
{
    
	public function DivisionView(){
		$divisions = ShipDivision::orderBy('id','DESC')->get();
		return view('backend.ship.division.view_division',compact('divisions'));

	}


public function DivisionStore(Request $request){

    	$request->validate([
    		'division_name' => 'required',   	 
    	 
    	]);
    	 

	ShipDivision::insert([
	 
		'division_name' => $request->division_name,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Division Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 



    public function DivisionEdit($id){

  $divisions = ShipDivision::findOrFail($id);
	 return view('backend.ship.division.edit_division',compact('divisions'));
    }



    public function DivisionUpdate(Request $request,$id){

    	ShipDivision::findOrFail($id)->update([
	 
		'division_name' => $request->division_name,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Division Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('manage-division')->with($notification);


    } // end mehtod 


    public function DivisionDelete($id){

    	ShipDivision::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Division Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    } // end method 



    //// Start Ship District 

    public function DistrictView(){
    $division = ShipDivision::orderBy('division_name','ASC')->get();
    $district = ShipDistrict::orderBy('id','DESC')->get();
		return view('backend.ship.district.view_district',compact('division','district'));
    }

   //// End Ship District
    


}
 