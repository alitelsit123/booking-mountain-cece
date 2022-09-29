<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapToken()
    {
        $leader = $this->order->members()->whereRole('leader')->first();
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->invoice_code,
                'gross_amount' => $this->order->total_price,
            ],
            'item_details' => [
                [
                    'id' => $leader->id,
                    'price' => $this->order->total_price,
                    'quantity' => 1,
                    'name' => 'Tiket Pendakian',
                ]
            ],
            'customer_details' => [
                'first_name' => $leader->name,
                'email' => $leader->email,
                'phone' => $leader->phone,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
