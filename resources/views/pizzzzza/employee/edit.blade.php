@extends('template/admin')

@section('title', '従業員管理画面')

@section('css')
    <link rel="stylesheet" href="/css/pages/index.css" media="all" title="no title">
@endsection

@section('main')
    <h1>従業員編集画面</h1>
      <div class="container">
        <div class="table-responsive">
  <table class="table"> <!-- サンプル -->
    <thead>
      <div class="row">
      <tr>
        <th style="width:6%">ID</th>
        <th style="width:11%">氏名</th>
        <th style="width:14%">フリガナ</th>
        <th style="width:3%">生年月日</th>
        <th style="width:4%">性別</th>
        <th style="width:7%">契約開始日</th>
        <th style="width:7%">契約終了日</th>
        <th style="width:4%">登録日時</th>
        <th style="width:4%">更新日時</th>
        <th style="width:21%">住所</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          <td><input type="text" class="form-control" value="001"/></td>
          <td><input type="text" class="form-control" value="近澤"/></td>
          <td><input type="text" class="form-control" value="チカザワ"/></td>
          <td>16600101</td>
          <td>M</td>
          <td>19991212</td>
          <td>25101212</td>
          <td>00000000</td>
          <td>00000000</td>
          <td><input type="text" class="form-control" value="aaaaaaaaaaaaaa"/></td>
      </tr>
      </tbody>
  </div>
  </table>
<div class="text-right">
  <a href="#"><input type="button" class="btn btn-primary btn-lg" name="name" value="戻る"></a>
  <a href="#"><input type="button" class="btn btn-primary btn-lg" name="name" value="決定"></a>
</div>
</div>

@endsection