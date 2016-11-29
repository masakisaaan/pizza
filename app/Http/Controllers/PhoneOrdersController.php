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

use App\Http\Requests\AdminPhoneUserEditRequestForWeb;
use Illuminate\Http\Request;
use App\Http\Requests\phoneSearchRequest;
use App\Service\PhoneOrderService;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;  //サービスに移植後削除

use App\Http\Requests\AdminPhoneUserEditRequest;


class PhoneOrdersController extends Controller
{




    //電話番号入力ページ
    public function index(){
        return view('pizzzzza.order.accept.input');
    }




    //電話番号入力ページ＞バリデーションチェック処理
    public function input(phoneSearchRequest $request){
        $this->show($request);
        return redirect('/pizzzzza/order/accept/customer/detail');
    }



    //メモ::タスク、バリデーションチェックを、もう１つつくってUSRとTMP両方で使えるように

    //電話番号入力ページ＞会員情報確認＞会員情報編集＞更新ボタン押された＞バリデーションチェック処理
    public function updateWeb(AdminPhoneUserEditRequestForWeb $request){

        //
        //  handlerで、会員情報編集画面から、更新ボタンが押された時：WEB会員バージョン
        //

        $user_update = $request->all();


        //POSTデータの受取
        $name = $user_update['name'];
        $name_katakana = $user_update['name_katakana'];
        $postal = $user_update['postal'];
        $address1 = $user_update['address1'];
        $address2 = $user_update['address2'];
        $address3 = $user_update['address3'];
        $phone = $user_update['phone'];


        //Web会員か、PHONE会員か、会員IDは何番か。
        $userType = session()->get('phone_order_user_type');
        $userId = session()->get('customer_id');


        if($userType == "web"){    //Web会員
            //追加POSTデータの受取
            $birthday = $user_update['birthday'];
            $email = $user_update['email'];
            $gender_id = $user_update['gender'];
            DB::table('users')->where('users.id','=',$userId)->update(['name' => $name,'kana' => $name_katakana,'email' => $email, 'gender_id' => $gender_id, 'birthday' => $birthday, 'postal' => $postal, 'address1' => $address1, 'address2' => $address2, 'address3' => $address3, 'phone' => $phone]);
            Flash::success('会員情報の更新が完了しました。');

        }else{
            Flash::error('エラーが発生しました。');
        }

        return redirect('/pizzzzza/order/accept/customer/detail');

    }

    //電話番号入力ページ＞会員情報確認＞会員情報編集＞更新ボタン押された＞バリデーションチェック処理
    public function updatePhone(AdminPhoneUserEditRequest $request){

        //
        //  handlerで、会員情報編集画面から、更新ボタンが押された時：WEB会員バージョン
        //

        dd('phone');

        $user_update = $request->all();


        //POSTデータの受取
        $name = $user_update['name'];
        $name_katakana = $user_update['name_katakana'];
        $postal = $user_update['postal'];
        $address1 = $user_update['address1'];
        $address2 = $user_update['address2'];
        $address3 = $user_update['address3'];
        $phone = $user_update['phone'];


        //Web会員か、PHONE会員か、会員IDは何番か。
        $userType = session()->get('phone_order_user_type');
        $userId = session()->get('customer_id');

        if($userType == "phone"){
            DB::table('temporaries_users_master')->where('temporaries_users_master.id','=',$userId)->update(['name' => $name,'kana' => $name_katakana,'postal' => $postal, 'address1' => $address1, 'address2' => $address2, 'address3' => $address3, 'phone' => $phone]);
            Flash::success('会員情報の更新が完了しました。');

        }else{
            Flash::error('エラーが発生しました。');
        }
        return redirect('/pizzzzza/order/accept/customer/detail');
    }





    //電話番号入力ページ＞お客様情報・注文履歴表示ページ
    // ※処理内容：電話番号が見つかれば会員情報を表示し、見つからなければ新規登録ページへリダイレクトする
    public function show(Request $request){

        //
        //  どのページから遷移してきたかによって、$phoneに設定する値を変更する
        //

            if(isset($request->phone)) {    //電話番号入力ページからアクセスした場合
                $phone = $request->get('phone');
                session()->put('phone',$phone);

            }else if(session()->has('phone')){      //戻るボタンからアクセスした場合
                $phone = session()->get('phone');

            }else{      //電話番号入力なし＆セッションに保存されているわけでもない不正なアクセス
                Flash::error('エラーが発生しました。');
                return redirect('/pizzzzza/order/top');
            }


         //
         // 会員情報が見つかるか検索
         //

            // 番号からUser情報を引き出す
            $phoneOrder = new PhoneOrderService();
            $userWeb = $phoneOrder->searchPhoneNumber($phone);

            if(!is_null($userWeb)){
                $user = $userWeb;
                session()->put('phone_order_user_type','web');  // 編集時に使用
                return view('pizzzzza.order.accept.customer.detail', compact('user'));
            }

            // 会員マスタから見つからないので、Temporary Tableから値をさがす　
            $userTmp = DB::table('temporaries_users_master')->where('temporaries_users_master.phone','=',$phone)->first();

            if (!is_null($userTmp)) {
                $user = $userTmp;
                session()->put('phone_order_user_type','phone'); //編集時に使用
                return view('pizzzzza.order.accept.customer.detail', compact('user'));
            }


        //
        //  電話番号が見つからない
        //

        return redirect()->route('newCustomer');

    }




    // POSTデータの受け皿。
    public function handler(Request $request)
{

    //
    //  顧客情報確認画面からの遷移であれば
    //
    //　※ 想定値 : $request -> detailPost ->  "戻る" / "注文へ" / "編集"
    //


    if (isset($request->detailPost)) {

        if ($request->detailPost == "戻る") {
            return redirect('/pizzzzza/order/accept/input');
        } else if ($request->detailPost == "注文へ") {
            $this->orderSelect($request);
            return redirect('/pizzzzza/order/accept/item/select');
        } else if ($request->detailPost == "編集") {
            if (session()->has('customer_id')) {
                session()->forget('customer_id');
            }
            session()->put('customer_id', $request->customer_id);
            return redirect('/pizzzzza/order/accept/customer/edit');
        } else {
            Flash::error('エラーが発生しました。');
            return redirect('/pizzzzza/order/top');
        }

    }


    //
    //  編集画面からの遷移であれば
    //
    //  ※　想定値 : $request -> editPost -> "戻る" / "更新"

    if (isset($request->editPost)) {

        if ($request->editPost == "戻る") {
            return redirect('/pizzzzza/order/accept/customer/detail');

        } else if ($request->editPost == "更新") {


            /*
            $customer_id = session()->get('customer_id');
            $customer_type = session()->get('phone_order_user_type');

            if ($customer_type == "web"){
                 session()->put('request', $request->all());
                 $this->updateWeb($request);
                 return redirect('/pizzzzza/order/accept/customer/update/web');
            } else if ($customer_type == "phone") {
                 session()->put('request', $request->all());
                 $this->updatePhone($requestData);
                 return redirect('/pizzzzza/order/accept/customer/update/phone');
            } else {
                dd('会員種別が不定');
            }
            */

        }
    }
}



    //電話番号入力ページ＞お客様情報・注文履歴表示ページ＞お客様情報編集ページ
    public function edit(){

        //
        //  @handlerから処理が渡ってくるが、この時sessionに値を保持しそれを使用する。
        //

        // 電話番号入力の際、セッションに会員IDとWEB会員かPHONE会員かを保存しているので、存在確認
        if(!session()->has('customer_id') || !session()->has('phone_order_user_type')){
            Flash::error('エラーが発生しました。');
            return redirect('/pizzzzza/order/top');
        }

        $customer_id = session()->get('customer_id');
        $customer_type = session()->get('phone_order_user_type');

        // 会員の情報を取得し、viewする
        if($customer_type == "web"){
            $user = DB::table('users')->join('genders_master','genders_master.id','=','users.gender_id')->where('users.id','=',$customer_id)->first();
            $genders = DB::table('genders_master')->get();
            return view('pizzzzza.order.accept.customer.edit',compact('user','genders'));

        }else if($customer_type == "phone"){
            $user = DB::table('temporaries_users_master')->where('temporaries_users_master.id','=',$customer_id)->first();
            return view('pizzzzza.order.accept.customer.edit',compact('user'));

        }else{
            Flash::error('エラーが発生しました。');
            return redirect('/pizzzzza/order/top');
        }


    }



    //電話番号入力ページ＞お客様情報入力ページ
    public function newCustomer(){
        return view('pizzzzza.order.accept.customer.input');
    }



    //商品入力・選択ページ
    public function orderSelect(){
        return view('pizzzzza.order.accept.item.select');
    }



    //注文情報確認ページ
    public function orderConfirm(){
        return view('pizzzzza.order.accept.item.confirm');
    }
}
