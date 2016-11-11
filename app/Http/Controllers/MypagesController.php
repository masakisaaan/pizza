<?php
/**
 *
 *  顧客用ページ
 *      ・注文履歴ページ
 *      ・注文詳細ページ
 *      ・登録情報確認ページ
 *      ・登録情報編集ページ
 *      ・登録情報更新確認ページ
 *
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MypagesController extends Controller
{
    //注文履歴ページ
    public function orderHistory(){
        return view('mypage.order.history');
    }

    //注文詳細ページ
    public function orderDetail(){
        return view('mypage.order.detail');
    }

    //登録情報確認ページ
    public function detail(){
        return view('mypage.detail');
    }

    //登録情報編集ページ
    public function edit(){
        return view('mypage.edit');
    }

    //更新確認ページ
    public function confirm(){
        return view('mypage.confirm');
    }
}
