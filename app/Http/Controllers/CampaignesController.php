<?php
/**
 *
 *  顧客用ページ
 *      ・キャンペーン一覧ページ
 *      ・キャンペーン詳細ページ
 *
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CampaignesController extends Controller
{
    //  キャンペーン一覧ページ
    public function campaignList()  {
        return view('campaign.list');
    }

    //  キャンペーン詳細ページ
    public function campaignDetail()  {
        return view('campaign.detail');
    }
}
