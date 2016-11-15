<?php
/**
 *
 *  顧客用ページ
 *      ・カートページ
 *
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \App\Service\CartService;

class CartsController extends Controller
{
    //  カートページ
    public function index()  {

        $cart = new CartService();

        list($products,$productCount,$productMap,$total) = $cart->showCart();

        return view('cart.index',compact('products','productCount','productMap','total'));
    }

    public function store(Request $request) {

        $id  = $request->get("id");
        $sum = $request->get("sum");

        $cart = new CartService();

        $cart->addProduct($id,$sum);

        return redirect()->route('cart');
    }

    public function clear() {

        CartService::clear();

        return redirect()->route('cart');
    }
}
