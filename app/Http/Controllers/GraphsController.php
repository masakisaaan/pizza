<?php


/**
 *
 *  管理者用ページ
 *      ・売れ筋確認ページ
 *      ・売上確認ページ
 *
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GraphsController extends Controller
{
    //  近日の売れ筋確認ページ
    public function popular()  {
        return view('analysis.popular');
    }

    //  近日の売上確認ページ
    public function earning()  {
        return view('analysis.earning');
    }
}
