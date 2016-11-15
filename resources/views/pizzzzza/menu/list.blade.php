@extends('template/admin')

@section('title', 'メニュー追加画面')

@section('css')
    <link rel="stylesheet" href="/css/pages/index.css" media="all" title="no title">
@endsection

@section('main')
      <h1>メニュー管理画面</h1>
      <div id="menu_button">
        <button type="button" class="btn btn-primary btn-lg"name="button">編集</button>
        <button type="button" class="btn btn-primary btn-lg"name="button">削除</button>
        <button type="button" class="btn btn-primary btn-lg"name="button">追加</button>
      </div>

      <div class="form-group table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>チェック</br>ボックス</th>
              <th>ID</th>
              <th>メニュー名</th>
              <th>画像データ</th>
              <th>説明</th>
              <th>価格</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td><input type="checkbox" name="name" value=""></td>
                <td>0001</td>
                <td>マルゲリータピザ</td>
                <td><form method="post" enctype="multipart/form-data">
                    <input type="file" name="pic">
                    
                <td>マルゲリータピザの説明</td>
                <td>850</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="name" value=""></td>
                <td>0002</td>
                <td>ちかざわピザ</td>
                <td><form method="post" enctype="multipart/form-data">
                    <input type="file" name="pic">

                <td>マルゲリータピザの説明</td>
                <td>850</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="name" value=""></td>
                <td>0002</td>
                <td>ちかざわピザ</td>
                <td><form method="post" enctype="multipart/form-data">
                    <input type="file" name="pic">

                <td>マルゲリータピザの説明</td>
                <td>850</td>
              </tr>
          </tbody>
        </table>
        </div>
    </div>
@endsection
