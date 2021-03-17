<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
 
 

class OrderController extends Controller
{
    
	// Pending Orders 
	public function PendingOrders(){
		$orders = Order::where('status','Pending')->orderBy('id','DESC')->get();
		return view('backend.orders.pending_orders',compact('orders'));

	} // end mehtod 






}
 