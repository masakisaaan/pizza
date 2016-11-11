@extends('template/admin')

@section('title', 'メニュー追加画面')

@section('css')
    <link rel="stylesheet" href="/css/pages/index.css" media="all" title="no title">
@endsection

@section('main')
    <h1>メニュー追加画面</h1>
    <div class="form-group table-responsive" id="menuadd">
    <table class="table">
<!--  <thead>
    <tr>
      <th></th>
      <th></th>
    </tr>
  </thead>
  -->
  <tbody>
   <tr>
    <th class="text-center" style="padding-top:12px;"><label for="">商品名</label></th>
    <th><input class="form-control" type="text" name="name" value="" style="width:50%;"></th>
    </tr>
     <tr>
      <th class="text-center" style="padding-top:12px;"><label for="">価格</label></th>
      <td><input class="form-control" type="number" name="name" value="" style="width:25%;"></td>
    </tr>
    <tr>
      <th class="text-center" style="padding-top:12px;"><label for="">ジャンル</label></th>
      <td><select name="example2">
          <option value="---">-----</option>
          <option value="選択肢1">メイン</option>
          <option value="選択肢2">ドリンク</option>
          <option value="選択肢3">サイド</option>
        </select></td>
    </tr>
    <tr>
    <th class="text-center" style="padding-top:12px;"><label for="example-date-input">販売開始日</label></th>
    <th><input class="form-control" id="example-date-input" type="date" name="name" value="" size="5" style="width:30%"></th>
    </tr>
    <tr>
    <th class="text-center" style="padding-top:12px;"><label for="example-date-input">販売終了日</label></th>
    <th><input class="form-control" id="example-date-input" type="date" name="name" value="" size="5" style="width:30%"></th>
    </tr>
    <tr>
    <th class="text-center" style="padding-top:12px;"><label for="">商品画像</label></th>
    <th><input class="fotm-control" type="file" name"name" value""></th>
    </tr>
    <tr>
    <th class="text-center" style="padding-top:12px;"><label for="">商品説明文</label></th>
    <th><textarea class="form-control" id="exampleTextarea" rows="6" maxlength="255" style="width:65%;" ></textarea></th>
    </tr>
  </tbody>
</table>
</div>
      <div id="menuedit_button">
      <button type="button" class="btn btn-primary btn-lg"name="button">戻る</button>
      <button type="button" class="btn btn-primary btn-lg"name="button">確認</button>
      </div>

@endsection