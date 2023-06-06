<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shiping;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;


class OrderController extends Controller
{
    public function order(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
        ]);
        $cart_data = session('cart');
        $user_id = Auth::user()->id;
        $data = Shiping::where('user_id', $user_id)->orderBy('order_id', 'desc')->first();
        if (isset($data->order_id)) {
            $order_id = $data->order_id + 1;
        } else {
            $order_id = 1;
        }
        $save_data = [];
        foreach ($cart_data as $data) {
            $save_data[] = [
                'product_name' => $data['name'],
                'product_img' => $data['image'],
                'qty' => $data['quantity'],
                'user_id' => $user_id,
                'order_id' => $order_id,
                'price' => $data['price'],
            ];
        }
        session()->forget('cart');
        DB::table('orders')->insert($save_data);
        $shiping_data = Shiping::create([
            'user_id' => $user_id,
            'order_id' => $order_id,
            'discount_amount' => $request->discount_amount,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'country' => $request->country,
            'postcode' => $request->postcode,
            'address' => $request->address,
        ]);
        return redirect()->route('stripe');
    }
    public function myOrder()
    {
        $order = Order::where('user_id', Auth::user()->id)->orderBy('order_id')->get();
        return view('Frontend.myorder', ['order' => $order]);
    }
}
