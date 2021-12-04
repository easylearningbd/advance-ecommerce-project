<?php


namespace App\Http\Repositories;


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

class OrderRepositoriesImpl
{
    public function store(array $data, $total_amount, $payment_type = 'Cash On Delivery', $currency = 'Tomans', $status = 'pending')
    {
        return Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $data['division_id'],
            'district_id' => $data['district_id'],
            'state_id' => $data['state_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'post_code' => $data['post_code'],
            'notes' => $data['notes'],

            'payment_type' => $payment_type,
            'payment_method' => $payment_type,

            'currency' => $currency,
            'amount' => $total_amount,

            'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => $status,
            'created_at' => Carbon::now(),
        ]);
    }
}
