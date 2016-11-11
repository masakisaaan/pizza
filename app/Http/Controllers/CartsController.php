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

class CartsController extends Controller
{
    //  カートページ
    public function cart()  {
        return view('cart');
    }
}
