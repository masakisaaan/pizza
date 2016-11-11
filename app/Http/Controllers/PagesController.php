<?php
/**
 *
 *  顧客用ページ
 *      ・会社概要ページ
 *      ・個人情報保護方針ページ
 *      ・利用規約ページ
 *      ・Q&Aページ
 *
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    //会社概要ページ
    public function company(){ return view('company.index'); }

    //個人情報保護方針ページ
    public function privacypolicy(){ return view('privacypolicy.index'); }

    //利用規約ページ
    public function agreement(){ return view('agreement.index'); }

    //Q&Aページ
    public function faq(){ return view('faq.index'); }



}
