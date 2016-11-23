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
use Illuminate\Support\Collection;
use Illuminate\Routing\Controller;

use App\Http\Requests;
use App\Service\MypageService;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//バリデーション
use Illuminate\Support\ServiceProvider;


use Illuminate\Support\Facades\DB;  //サービスに移植後削除

class MypagesController extends Controller
{
    //注文履歴ページ
    //課題：１ページ１０件とかになれば、処理が変わる。
    //メモ：selectを、valueにすると、ずつ取得するから、for文で回すのに有効か？
    //開発の余地：order_statesが1の場合、制作済み。2の場合、まだ。って処理を追加？
    public function orderHistory()
    {
        //認証済み？
        if (Auth::check()) {
            //ユーザIDを取得
            $userId = Auth::user()->id;
            //注文IDごとに、GROUPBY して、「注文日」「注文番号」「合計金額」「クーポン（NULL/int）」を取得。
            $orders = DB::table('orders_master')->leftjoin('coupons_master', 'coupons_master.coupon_number', '=', 'orders_master.coupon_id')->join('users', 'users.id', '=', 'orders_master.user_id')->join('orders_details_table', 'orders_details_table.id', '=', 'orders_master.id')->join('products_prices_master', 'products_prices_master.id', '=', 'orders_details_table.price_id')->where('users.id', $userId)->select('orders_details_table.id', DB::raw('SUM(products_prices_master.product_price * orders_details_table.number) as total_price'), 'orders_master.order_date', 'coupons_master.coupon_discount')->groupby('orders_details_table.id', 'orders_master.order_date', 'coupons_master.coupon_discount')->get();
            //取得した項目を、送信。
            return view('mypage.order.history', ["orders" => $orders]);
        } else {
            //アクセスエラーページに飛ばす。 Permission Denied.
            return ('ログインしてください！');
        }
    }




    //注文詳細ページ
    //ユーザID一致の、注文一覧を取得する。注文IDが異なってても、その人の注文をすべて。
    // 重要　$contentsArray = DB::table('orders_master')->leftjoin('coupons_master', 'coupons_master.coupon_number', '=', 'orders_master.coupon_id')->join('users', 'users.id', '=', 'orders_master.user_id')->join('orders_details_table', 'orders_details_table.id', '=', 'orders_master.id')->join('products_prices_master', 'products_prices_master.id', '=', 'orders_details_table.price_id')->where('users.id', $userId)->select('orders_master.id', 'orders_master.order_date', 'orders_master.order_appointment_date', 'orders_master.state_id', 'coupons_master.coupon_discount', 'products_prices_master.product_price', 'orders_details_table.number')->get();
    public function orderDetail($id)
    {
        //認証済み？
        if (Auth::check()) {
            //ユーザIDを取得
            $userId = Auth::user()->id;

            //お客様情報を取得
            $users = DB::table('users')->where('users.id', $userId)->select('users.name', 'users.kana', 'users.postal', 'users.address1', 'users.address2', 'users.address3', 'users.phone')->get();

            //注文情報を取得（日時・注文ID・割引金額・合計金額）
            $orders = DB::table('orders_master')->leftjoin('coupons_master', 'coupons_master.coupon_number', '=', 'orders_master.coupon_id')->join('users', 'users.id', '=', 'orders_master.user_id')->join('orders_details_table', 'orders_details_table.id', '=', 'orders_master.id')->join('products_prices_master', 'products_prices_master.id', '=', 'orders_details_table.price_id')->where('users.id', $userId)->where('orders_details_table.id', '=', $id)->select('orders_master.order_date', 'coupons_master.coupon_discount', DB::raw('SUM(products_prices_master.product_price * orders_details_table.number) as total_price'), 'coupons_master.coupon_name')->groupby('orders_master.order_date', 'coupons_master.coupon_discount', 'coupons_master.coupon_name')->get();

            //商品情報を取得（商品名・商品価格・商品画像・個数）
            $contents = DB::table('orders_master')->leftjoin('coupons_master', 'coupons_master.coupon_number', '=', 'orders_master.coupon_id')->join('users', 'users.id', '=', 'orders_master.user_id')->join('orders_details_table', 'orders_details_table.id', '=', 'orders_master.id')->join('products_prices_master', 'products_prices_master.id', '=', 'orders_details_table.price_id')->join('products_master', 'products_prices_master.product_id', '=', 'products_master.id')->where('users.id', $userId)->where('orders_details_table.id', '=', $id)->select('orders_master.order_date', 'orders_master.id as order_id', 'coupons_master.coupon_discount', 'products_prices_master.product_price', 'products_master.product_name', 'products_master.product_image', 'orders_details_table.number', 'coupons_master.coupon_name')->get();

            //return view('mypage.order.detail');
            return view('mypage.order.detail', ["users" => $users, "orders" => $orders, "contents" => $contents]);
        } else {
            return 'ログインしてください！';
        }

    }




    //登録情報確認ページ
    public function detail()
    {
        //認証済み？
        if (Auth::check()) {
            //ユーザIDを取得
            $userId = Auth::user()->id;

            //お客様情報（性別やメールアドレス・パスワード）を取得
            $users = DB::table('users')->where('users.id', $userId)->select('users.name', 'users.kana', 'users.postal', 'users.address1', 'users.address2', 'users.address3', 'users.phone', 'users.gender_id', 'users.birthday', 'users.email')->get();

            //return view('mypage.order.detail');
            return view('mypage.detail', ["users" => $users]);
        } else {
            return 'ログインしてください！';
        }
    }





    //登録情報編集ページ
    public function edit()
    {
        //認証済み？
        if (Auth::check()) {
            //ユーザIDを取得
            $userId = Auth::user()->id;

            //お客様情報（性別やメールアドレス・パスワード）を取得
            $users = DB::table('users')->where('users.id', $userId)->select('users.name', 'users.kana', 'users.postal', 'users.address1', 'users.address2', 'users.address3', 'users.phone', 'users.gender_id', 'users.birthday', 'users.email')->get();

            //return view('mypage.order.detail');
            return view('mypage.edit', ["users" => $users]);
        } else {
            return 'ログインしてください！';
        }
    }





    //更新確認ページ
    public function confirm(Request $request)
    {
        //
        //  ログイン確認
        //
        if(!Auth::check()) {
            //未ログイン時の処理
            return "ログインしてください！";
        }

        //
        //  現在のお客様情報取得
        //

        //ユーザIDを取得
        $userId = Auth::user()->id;
        //現在のお客様情報（性別やメールアドレス・パスワード）を取得
        $tmpUserDb = DB::table('users')->where('users.id', $userId)->select('users.name', 'users.kana', 'users.email', 'users.password', 'users.postal', 'users.address1', 'users.address2', 'users.address3', 'users.phone', 'users.gender_id', 'users.birthday', 'users.email')->get();
        //DBの結果を、$tmpUser->の形で参照できるように。
        list($tmpUser) = $tmpUserDb;

        //
        //  パスワード照合（変更用パスワードと、DBのパスワードの一致確認）
        //

        //DBのパスワードを、変数に
        $dbPassword = $tmpUser->password;
        //POSTされたパスワードを変数に
        $confirm_password = $request->input('confirm_password');
        //パスワード照合処理本体。（！つけているので、間違っていた時の処理を書く。）
        if (!password_verify($confirm_password, $dbPassword)) {
            //変更用パスワードエラー時の処理
            return "変更用パスワードが違います";
        }


        //
        //  バリデーションチェック
        //
        //var_dump($_POST);
        //バリデーションチェック　その１（エラー）

            $rules = [
                'name' => 'required' ,
                'email' => 'required|email'
            ];
            $this->validate($request, $rules);

        //バリデーションチェック　その２（エラー。項目はこれで良くて、チェック内容はもう少し増える）
        /*
            $this->validate($request, [
            //$validator =Validator::make($request->all(),[
                 //  required : 必須
                'name' => 'required|unique:posts|max:255',
                'name_katakana' => 'required|unique:posts|',
                'postal' => 'required|unique:posts|size:7|integer',
                'address1' => 'required|unique:posts|',
                'address2' => 'required|unique:posts|',
                'address3' => 'unique:posts|',
                'birthday' => 'required|unique:posts|',
                'phone' => 'required|unique:posts|integer',
                'gender' => 'required|unique:posts|',
                'email' => 'required|unique:posts|email',
                'new_password' => 'required|unique:posts|new_password_confirm|min:6',
                'new_password_confirm' => 'required|unique:posts|new_password',
                'confirm_password' => 'required|unique:posts|'
            ]);
        */

/*
        //POSTデータの受け取り
        $name = $request->input('name');
        $name_katakana = $request->input('name_katakana');
        $postal = $request->input('postal');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $address3 = $request->input('address3');
        $birthday = $request->input('$birthday');
        $phone = $request->input('phone');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $new_password = $request->input('new_password');
        $new_password_confirm = $request->input('new_password_confirm');
        $confirm_password = $request->input('confirm_password');
*/
        //
        //  POSTデータを$userに
        //
        //$userに、POSTデータをセットする。
        $user = array();
        //POSTデータの受け取り
        $user['name'] = $request->input('name');
        $user['name_katakana'] = $request->input('name_katakana');
        $user['postal'] = $request->input('postal');
        $user['address1'] = $request->input('address1');
        $user['address2'] = $request->input('address2');
        $user['address3'] = $request->input('address3');
        $user['birthday'] = $request->input('$birthday');
        $user['phone'] = $request->input('phone');
        $user['gender'] = $request->input('gender');
        $user['email'] = $request->input('email');
        $user['new_password'] = $request->input('new_password');
        $user['new_password_confirm'] = $request->input('new_password_confirm');
        $user['confirm_password'] = $request->input('confirm_password');

        //
        //  性別を、int型に
        //
        //性別だけ、POST時に値が「男」「女」になっているので、それをDB格納用（int 1or2）に変更。
        if($user['gender'] == "男"){
            $gender_id = 1;
        }else{
            $gender_id = 2;
        }

        // dd($name,$name_katakana,$postal,$address1,$address2,$address3,$birthday,$phone,$gender,$email,$new_password,$new_password_confirm,$confirm_password);




        return view('mypage.confirm' ,[$user]);






        //SQLの確認ログ取得用。実行された後の生文がみれる
        DB::enableQueryLog();

        //
        //  更新SQL　値のセット　（変更箇所の「色」と「SQL文」を設定。（色は、view側でクラスを付与することで実現）
        //
        //$update[]に、更新内容が入る。
        $update = array();
        if ($tmpUser->name != $user['name']) {
            $update['name'] = $user['name'];
            $class["name"] = "update";
        }
        if ($tmpUser->kana != $user['name_katakana']) {
            $update['kana'] = $user['name_katakana'];
            $class["name_katakana"] = "update";
        }
        if ($tmpUser->email != $user['email']) {
            $update['email'] = $user['email'];
            $class["email"] = "update";
        }
        //パスワードが、new_passwordと異なる場合
        if ($tmpUser->password != $user['new_password']) {
            //BCRYPTで暗号化
            $hash_new_password = password_hash($user['new_password'],PASSWORD_DEFAULT);
            $update['password'] = $hash_new_password;
            $class["new_password"] = "update";
        }
        if ($tmpUser->postal != $user['postal']) {
            $update['postal'] = $user['postal'];
            $class["postal"] = "update";
        }
        if ($tmpUser->address1 != $user['address1']) {
            $update['address1'] = $user['address1'];
            $class["address1"] = "update";
        }
        if ($tmpUser->address2 != $user['address2']) {
            $update['address2'] = $user['address2'];
            $class["address2"] = "update";
        }
        if ($tmpUser->address3 != $user['address3']) {
            $update['address3'] = $user['address3'];
            $class["address3"] = "update";
        }
        if ($tmpUser->phone != $user['phone']) {
            $update['phone'] = $user['phone'];
            $class["phone"] = "update";
        }
        if ($tmpUser->gender_id != $user['gender_id']) {
            $update['gender_id'] = $user['gender_id'];
            $class["gender"] = "update";
        }


        //
        //  更新SQL　Run
        //
        //更新内容があれば
        if(isset($update)) {
            $query = DB::table('users')->where('id', $userId)->update($update);
        }
        //SQLログ確認用　セットで使う。
           // dd(DB::getQueryLog());


        //
        //  使用後変数の初期化（バグ回避）
        //
        //更新内容
        if(isset($update)) {
            $update = array();
        }
        //更新SQL本文
        if(isset($query)){
            $query = "";
        }
        //POSTされた値
        if(isset($user)){
            //顧客からPOSTされた、更新する生の値
            $user = array();
        }
        //パスワード変更時のハッシュ化されたNewパスワード
        if(issset($hash_new_password)){
            $hash_new_password = "";
        }
        $dbPassword = "";



        //更新SQL　その２。
        //DB::table('users')->where('id', 5)->update(['name' => $name], ['kana' => $name_katakana], ['postal' => $postal], ['address1' => $address1], ['address2' => $address2], ['address3' => $address3], ['phone' => $phone], ['birthday' => $birthday], ['gender_id' => $gender], ['password' => $name]);

        return view('mypage.confirm' ,[]);


    }
}
