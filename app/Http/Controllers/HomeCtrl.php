<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Product;
use App\Order;
use App\OrderDetail;

use Auth;

class HomeCtrl extends Controller
{
    public function login_form()
    {
        return view('admin.login');
    }

    public function login_proses(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();
        if ($user !== null) {
            if (password_verify($password, $user->password)) {
                if ($user->role === 1) {
                    Auth::attempt(['email' => $email, 'password' => $password]);
                    return redirect('/admin/list-order');
                }elseif ($user->role === 0) {
                    Auth::attempt(['email' => $email, 'password' => $password]);
                    return redirect('/');
                }else {
                    $request->session()->flash('error', 'Anda tidak punya otorisasi!');
                    return back();
                }
            }else{
                $request->session()->flash('error', 'Password salah!');
                return back();
            }
        }else {
            $request->session()->flash('error', 'Email tidak terdaftar!');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function index()
    {
        $products = Product::all();
        return view('home.index', compact('products'));
    }

    public function checkout_form(Request $request)
    {
        return view('checkout.index');
    }

    public function checkout_store(Request $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['telepon'] = $request->telepon;
        $data['address'] = $request->address;

        $cart = $request->session()->get('cart');
        $order = new Order;
        $order->code = 'ODR-'.time();
        $order->user_id = Auth::user()->id;
        $order->status = 0;
        if ($order->save()) {
            $total = 0;
            foreach ($cart as $key => $c) {
                // counting amount
                $total += $c['quantity']*$c['price'];

                // decrease qty product
                $product = Product::where('id', $c['id'])->first();
                $product->quantity = $product->quantity - $c['quantity'];
                $product->save();

                // store to order detail
                $od = new OrderDetail;
                $od->product_id = $c['id'];
                $od->order_id = $order->id;
                $od->quantity = $c['quantity'];
                $od->price = $c['price'];
                $od->amount = $c['quantity']*$c['price'];
                $od->save();
            }
            $order->grand_total = $total;
            $order->address = json_encode($data);
            $order->save();
        }
        
        $request->session()->forget('cart');
        return redirect('/purchase');
    }

    public function purchase()
    {
        $orders = Order::all();
        return view('purchase.index', compact('orders'));
    }

    public function purchase_details($code)
    {
        $order = Order::where('code', $code)->first();
        return view('purchase.details', compact('order'));
    }


    public function list_order_admin()
    {
        $orders = Order::all();
        return view('admin.order', compact('orders'));
    }

    public function approve_order(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        if ($order !== null) {
            $order->status = true;
            $order->save();
            $request->session()->flash('success', 'Order '.$order->code.' Approved!');
            return back();
        }
    }

    public function disapprove_order(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        if ($order !== null) {
            $order->status = false;
            $order->save();
            $request->session()->flash('success', 'Order '.$order->code.' Disapproved!');
            return back();
        }
    }
}

