<?php
/**
 *
 *  従業員用商品管理ページ
 *      ・商品一覧ページ
 *      ・商品編集ページ
 *      ・商品追加ページ
 *
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminMenusController extends Controller
{
    //  従業員一覧ページ
    public function AdminMenuList()  {
        return view('pizzzzza.menu.list');
    }

    //  従業員編集ページ
    public function AdminMenuEdit()  {
        return view('pizzzzza.menu.edit');
    }

    //  従業員追加ページ
    public function AdminMenuAdd()  {
        return view('pizzzzza.menu.add');
    }
}