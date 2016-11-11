<?php
/**
 *
 *  従業員用ページ
 *      ・電話番号入力ページ
 *      ・電話番号入力ページ＞お客様情報・注文履歴表示ページ
 *      ・電話番号入力ページ＞お客様情報・注文履歴表示ページ＞お客様情報編集ページ
 *      ・電話番号入力ページ＞お客様情報入力ページ
 *      ・商品入力・選択ページ
 *      ・注文情報確認ページ
 *
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PhoneOrdersController extends Controller
{
    //電話番号入力ページ
    public function phoneInput(){
        return view('order.accept.input');
    }

    //電話番号入力ページ＞お客様情報・注文履歴表示ページ
    public function phoneDetail(){
        return view('order.accept.customer.detail');
    }

    //電話番号入力ページ＞お客様情報・注文履歴表示ページ＞お客様情報編集ページ
    public function phoneEdit(){
        return view('order.accept.customer.edit');
    }

    //電話番号入力ページ＞お客様情報入力ページ
    public function phoneRegister(){
        return view('order.accept.customer.input');
    }

    //商品入力・選択ページ
    public function phoneOrderSelect(){
        return view('order.accept.item.select');
    }

    //注文情報確認ページ
    public function phoneOrderConfirm(){
        return view('order.accept.item.confirm');
    }
}
