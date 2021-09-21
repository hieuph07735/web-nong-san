<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Exception;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('Client.checkout');
    }
    public function postCheckout(CheckoutRequest $rq)
    {
        try {
            //Save infomation for customer
            $customer =  new Customer();
            $customer->name = $rq->name;
            $customer->email = $rq->email;
            $customer->address = $rq->address;
            $customer->phone = $rq->phone;
            $customer->save();

            //Save order
            $order = new Order();
            $order->customer_id = $customer->id;
            $order->date_order = date('Y-m-d H:i:s');
            $order->total_price = str_replace(',', '', $rq->total);
            $order->note = $rq->note;
            $order->save();

            //Save order detail
            if (count(session('cart')) > 0) {
                foreach (session('cart') as $key => $items) {
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $key;
                    $orderItem->quanlity = $items['amount'];
                    $orderItem->price = $items['price'];
                    $orderItem->save();
                }
            }
            $rq->session()->forget('cart');
            return redirect()->route('home');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
