<?php


namespace App\Http\Repositories;


use App\Models\Order;
use Carbon\Carbon;

class OrderRepositoriesImpl
{
    public function store(array $data, $user_id, $total_amount, ?string $status = 'pending', ?string $payment_type = 'Cash On Delivery', ?string $currency = 'Tomans')
    {
        return Order::insertGetId([
            'user_id' => $user_id,
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
