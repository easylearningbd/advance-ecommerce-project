<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use Carbon\Carbon;
use App\Models\ShipDistrict;
use App\Models\ShipState;

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
    $district = ShipDistrict::with('division')->orderBy('id','DESC')->get();
		return view('backend.ship.district.view_district',compact('division','district'));
    }


public function DistrictStore(Request $request){

    	$request->validate([
    		'division_id' => 'required',  
    		'district_name' => 'required',  	 
    	 
    	]);
    	 

	ShipDistrict::insert([
	 
		'division_id' => $request->division_id,
		'district_name' => $request->district_name,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'District Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 



public function DistrictEdit($id){

  $division = ShipDivision::orderBy('division_name','ASC')->get();
  $district = ShipDistrict::findOrFail($id);
	 return view('backend.ship.district.edit_district',compact('district','division'));
    }




 public function DistrictUpdate(Request $request,$id){

    	ShipDistrict::findOrFail($id)->update([
	 
		'division_id' => $request->division_id,
		'district_name' => $request->district_name,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'District Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('manage-district')->with($notification);


    } // end mehtod 





      public function DistrictDelete($id){

    	ShipDistrict::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'District Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    } // end method 
 

   //// End Ship District


 ////////////////// Ship State //////////

    public function StateView(){
    $division = ShipDivision::orderBy('division_name','ASC')->get();
    $district = ShipDistrict::orderBy('district_name','ASC')->get();
    $state = ShipState::with('division','district')->orderBy('id','DESC')->get();
		return view('backend.ship.state.view_state',compact('division','district','state'));
    }




    public function StateStore(Request $request){

    	$request->validate([
    		'division_id' => 'required',  
    		'district_id' => 'required', 
    		'state_name' => 'required', 	 
    	 
    	]);
    	 

	ShipState::insert([
	 
		'division_id' => $request->division_id,
		'district_id' => $request->district_id,
		'state_name' => $request->state_name,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'State Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 


public function StateEdit($id){
    $division = ShipDivision::orderBy('division_name','ASC')->get();
    $district = ShipDistrict::orderBy('district_name','ASC')->get();
    $state = ShipState::findOrFail($id);
		return view('backend.ship.state.edit_state',compact('division','district','state'));
    }




 public function StateUpdate(Request $request,$id){

    	ShipState::findOrFail($id)->update([
	 
		'division_id' => $request->division_id,
		'district_id' => $request->district_id,
		'state_name' => $request->state_name,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'State Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('manage-state')->with($notification);


    } // end mehtod 


public function StateDelete($id){

    	ShipState::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'State Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    } // end method 


    //////////////// End Ship State ////////////







    


}
 