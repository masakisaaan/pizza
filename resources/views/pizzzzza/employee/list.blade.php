@extends('template/admin')

@section('title', '従業員管理画面')

@section('css')
    <link rel="stylesheet" href="/css/pages/index.css" media="all" title="no title">
@endsection

@section('main')
<h1>従業員管理画面</h1>
    <div id="manager_button">
       <a href="#"><input type="button" class="btn btn-primary btn-lg" name="name" value="編集"></a>
       <a href="#"><input type="button" class="btn btn-primary btn-lg" name="name" value="追加"></a>
     </div>
       <div class="container">
   <table class="table"> <!-- サンプル -->
     <thead>
       <tr>
         <th></th>
         <th>ID</th>
         <th>氏名</th>
         <th>フリガナ</th>
         <th>生年月日</th>
         <th>性別</th>
         <th>契約開始日</th>
         <th>契約終了日</th>
         <th>登録日時</th>
         <th>更新日時</th>
         <th>住所</th>
       </tr>
     </thead>
     <tbody>
       <tr>
         <th scope="row"><input type="checkbox" name="name" value=""></th>
           <td>001</td>
           <td>近澤</td>
           <td>チカザワ</td>
           <td>16600101</td>
           <td>M</td>
           <td>19991212</td>
           <td>25101212</td>
          <td>00000000</td>
           <td>00000000</td>
           <td>aaaaaaaaaaaaaaaaaaaaa</td>
       </tr>
        </tbody>
   </table>
 </div>

@endsection