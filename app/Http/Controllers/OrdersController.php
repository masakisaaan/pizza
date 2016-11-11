<?php
/**
 *
 *  顧客用ページ
 *      ・注文確認ページ
 *      ・注文完了ページ
 *
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrdersController extends Controller
{
    //  注文確認ページ
    public function orderConfirm(){
        return view('order.confirm');
    }

    //  注文完了ページ
    public function orderComplete(){
        return view('order.complete');
    }
}
