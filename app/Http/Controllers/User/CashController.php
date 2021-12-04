<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Repositories\OrderRepositoriesImpl;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CashController extends Controller
{
    private OrderRepositoriesImpl $orderRepositoriesImpl;

    public function __construct()
    {
        $this->orderRepositoriesImpl = new OrderRepositoriesImpl();
    }

    public function CashOrder(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

        // dd($charge);

        $order_id = $this->orderRepositoriesImpl->store($request->all(), Auth::id(), $total_amount, null, null, null);

        // Start Send Email
        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        // End Send Email

        $carts = Cart::content();
        foreach ($carts as $cart) {
            self::storeOrderItem($order_id, $cart);
        }


        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Your Order Place Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);


    }

    /**
     * @param $order_id
     * @param $cart
     */
    public static function storeOrderItem($order_id, $cart)
    {
        return OrderItem::create([
            'order_id' => $order_id,
            'product_id' => $cart->id??$cart->product_id,
            'color' => $cart->options->color??"",
            'size' => $cart->options->size??"",
            'qty' => $cart->qty,
            'price' => $cart->price,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'hashed_key' => (string)Str::uuid(),
            'hashed_expired_at' => Carbon::now()->addDays(1),
        ]);
    }


}
