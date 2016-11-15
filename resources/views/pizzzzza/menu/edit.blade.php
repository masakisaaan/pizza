@extends('template/admin')

@section('title', 'メニュー追加画面')

@section('css')
    <link rel="stylesheet" href="/css/pages/index.css" media="all" title="no title">
@endsection

@section('main')
    <h1>メニュー編集画面</h1>

    <table class="table">
      <thead>
        <tr>
          <td>メニュー名</td>
          <td>価格</td>
          <td>説明</td>
          <td>画像アップロード</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th style="width:20%;"><input class="form-control" type="textbox" name="name" value=""></th>
          <th style="width:15%;"><input class="form-control" type="number" name="name" value="" style=></th>
          <th><textarea class="form-control" rows="1" value=""></textarea></th>
          <td><form method="post" enctype="multipart/form-data">
              <input type="file" name="pic">

        </tr>

      </tbody>
    </table>
      <button type="button" class="btn btn-primary btn-lg"name="button">戻る</button>
      <div id="menuedit_button">
      <button type="button" class="btn btn-primary btn-lg"name="button">確認画面へ</button>
      </div>
    </div>
    
    @endsection