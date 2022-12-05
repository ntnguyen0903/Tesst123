<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Users;
use Cart;

use App\Mail\demomail;
use Illuminate\Support\Facades\Mail;


class CartController extends Controller
{
    function index()
    {
        //dd(Cart::content());
        return view('client.home.cart');
    }
    function add($id)
    {
        $product = Product::find($id);
        //dd($product);
        // Cart::add('1','sp1',1,9.99 ,10);
        // dd(Cart::content());
        $a = [
            'id' => $product->idproduct,
            'name' => $product->ten,
            'img' => $product->img,
            'qty' => 1,
            'price' => $product->gia_km,
            'weight' => 0
        ];
        Cart::add($a);
        return redirect('/client/cart');
    }
    function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect('/client/cart');
    }

    function checkout()
    {
        return view('client.home.checkout');
    }
    function checkout1(Request $r)
    {
        $data = $r->all();
        // dd($data);
        $data['ngaydat'] = date('y-m-d h:i:s');
        $data['idorder'] = time();
        $data['trangthai'] = 0;
        $data['idusers'] = session('users')['idusers'];
        //dd($data['idusers'] = session('users')['idusers']);
        //$data = Users::where('idusers', '1')->first();
        $o = Order::create($data);
        // dd($o);
        $idorder = $o->idorder;
        foreach (Cart::content() as $item) {
            $data2 = [
                'idorder' => $idorder,
                'idproduct' => $item->id,
                'soluong' => $item->qty,
                'gia' => $item->price

            ];
            Order_Detail::create($data2);
        }
        //-----gui mail ne---------
        $email['email'] = session('users')['email'];
        Mail::to($email)->send(new demomail());
        //----xoa all gio hang------
        Cart::destroy();
        session()->flash('finish', 'Cảm ơn quý khách đã mua hàng! ');
        return redirect('/');
    }
    function demo()
    {
       Mail::to('ntnguyen09032001@gmail.com')->send(new demomail());
    }
    function finish()
    {
        //dd(Cart::content());
        return view('client.home.finish');
    }

    function edit(Request $r)
    {
        Cart::update($r->rowId, $r->qty);
        return response()->json(['n'=>Cart::count()] );
    }
}
