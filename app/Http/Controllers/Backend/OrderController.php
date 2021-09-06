<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Filters\OrderFilter;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderResourceCollection;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use DB;
use PDF;


class OrderController extends Controller
{

    /**
     * @OA\Get(path="/api/orders",
     *   tags={"Orders"},
     *   summary="Returns orders as json",
     *   description="Returns orders",
     *   operationId="getOrders",
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
    public function index(OrderFilter $filters)
    {
        [$entries, $count, $sum] = Order::filter($filters);
        $entries = $entries->get();
        return response(new OrderResourceCollection(['data' => $entries, 'count' => $count]));
    }
    /**
     * @OA\Get(path="/api/orders/{orderId}",
     *   tags={"Orders"},
     *   summary="Returns order by id as json",
     *   description="Returns orders by id",
     *   operationId="getOrdersById",
     *
     *  @OA\Parameter(
     *       description="ID of order",
     *       name="orderId",
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
        $entry = Order::query()->findOrFail($id);
        return response(new OrderResource(['data' => $entry]));
    }

    // Pending Orders
	public function PendingOrders(){
		$orders = Order::where('status','pending')->orderBy('id','DESC')->get();
		return view('backend.orders.pending_orders',compact('orders'));

	} // end mehtod


	// Pending Order Details
	public function PendingOrdersDetails($order_id){

		$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('backend.orders.pending_orders_details',compact('order','orderItem'));

	} // end method



	// Confirmed Orders
	public function ConfirmedOrders(){
		$orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
		return view('backend.orders.confirmed_orders',compact('orders'));

	} // end mehtod


	// Processing Orders
	public function ProcessingOrders(){
		$orders = Order::where('status','processing')->orderBy('id','DESC')->get();
		return view('backend.orders.processing_orders',compact('orders'));

	} // end mehtod


		// Picked Orders
	public function PickedOrders(){
		$orders = Order::where('status','picked')->orderBy('id','DESC')->get();
		return view('backend.orders.picked_orders',compact('orders'));

	} // end mehtod



			// Shipped Orders
	public function ShippedOrders(){
		$orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
		return view('backend.orders.shipped_orders',compact('orders'));

	} // end mehtod


			// Delivered Orders
	public function DeliveredOrders(){
		$orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
		return view('backend.orders.delivered_orders',compact('orders'));

	} // end mehtod


				// Cancel Orders
	public function CancelOrders(){
		$orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
		return view('backend.orders.cancel_orders',compact('orders'));

	} // end mehtod




	public function PendingToConfirm($order_id){

      Order::findOrFail($order_id)->update(['status' => 'confirm']);

      $notification = array(
			'message' => 'Order Confirm Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('pending-orders')->with($notification);


	} // end method





	public function ConfirmToProcessing($order_id){

      Order::findOrFail($order_id)->update(['status' => 'processing']);

      $notification = array(
			'message' => 'Order Processing Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('confirmed-orders')->with($notification);


	} // end method



		public function ProcessingToPicked($order_id){

      Order::findOrFail($order_id)->update(['status' => 'picked']);

      $notification = array(
			'message' => 'Order Picked Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('processing-orders')->with($notification);


	} // end method


	 public function PickedToShipped($order_id){

      Order::findOrFail($order_id)->update(['status' => 'shipped']);

      $notification = array(
			'message' => 'Order Shipped Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('picked-orders')->with($notification);


	} // end method


	 public function ShippedToDelivered($order_id){

	 $product = OrderItem::where('order_id',$order_id)->get();
	 foreach ($product as $item) {
	 	Product::where('id',$item->product_id)
	 			->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
	 }

      Order::findOrFail($order_id)->update(['status' => 'delivered']);

      $notification = array(
			'message' => 'Order Delivered Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('shipped-orders')->with($notification);


	} // end method


	public function AdminInvoiceDownload($order_id){

		$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

		$pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('invoice.pdf');

	} // end method



}
