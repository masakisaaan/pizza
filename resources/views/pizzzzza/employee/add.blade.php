@extends('template/admin')

@section('title', '従業員追加画面')

@section('css')
    <link rel="stylesheet" href="/css/pages/index.css" media="all" title="no title">
@endsection

@section('main')
    <div class="wrap">
      <h1>従業員追加</h1>
      <div class="form-group table-responsive">
        <table class="table">
          <tbody>
          <tr>
            <th class="text-center" style="padding-top:12px;"><label for="">氏名</label></th>
            <td><input class="form-control" type="text" name="name" value=""></td>
          </tr>
          <tr>
            <th class="text-center" style="padding-top:12px;"><label for="">フリガナ</label></th>
            <td><input class="form-control" type="text" name="name" value=""></td>
          </tr>
          <tr>
            <th class="text-center" style="padding-top:12px;"><label for="">生年月日</label></th>
            <td><input class="form-control" id="example-date-input" type="date" name="name" value="" size="5" style="width:30%;"></td>
          </tr>
          <tr>
            <th class="text-center" style="padding-top:12px;"><label for="">性別</label></th>
            <td><input class="" type="radio" name="name" value="男">男
            <input class="" type="radio" name="name" value="女">女</td>
          </tr>
          <tr>
             <th class="text-center" style="padding-top:12px;"><label for="example-date-input">契約開始日</label></th>
             <td><input class="form-control" id="example-date-input" type="date" name="name" value="" size="5" style="width:30%"></td>
          </tr>
          <tr>
             <th class="text-center" style="padding-top:12px;"><label for="example-date-input">契約終了日</label></th>
             <td><input class="form-control" id="example-date-input" type="date" name="name" value="" size="5" style="width:30%"></td>
          </tr>
          </tbody>
        </table>
          </div>
            <div id="menuedit_button">
              <button type="button" class="btn btn-primary btn-lg"name="button">戻る</button>
              <button type="button" class="btn btn-primary btn-lg"name="button">確認</button>
            </div>
    </div>

@endsection
