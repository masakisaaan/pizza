<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="css/common/main.css" charset="utf-8">
    <link rel="stylesheet" href="css/common/reset.css" charset="utf-8">
    <link rel="stylesheet" href="css/common/bootstrap.min.css" charset="utf-8">
    <link rel="stylesheet" href="css/pages/index.css" charset="utf-8">
    <!-- <script src="js/common/jQuery.js" charset="utf-8"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="js/common/bootstrap.min.js" charset="utf-8"></script>
  </head>
  <body id="">
    <div class="wrap" style="width: 100%">
    <h2>注文確認画面</h2>
      <div class="container">
        <h3>商品情報</h3>
        <div class="row1">
  <table class="table"> <!-- サンプル -->
    <thead>
      <tr>
        <th style="width: 10%">NO</th>
        <th style="width: 30%">商品名</th>
        <th style="width: 20%">ジャンル</th>
        <th style="width: 20%">価格</th>
        <th style="width: 20%">個数</th>
      </tr>
    </thead>
    <tbody>
  <tr>
  <td>1</td>
  <td>マルゲリータピザ</td>
  <td>メイン</td>
  <td>￥2525</td>
  <td><select name="number">
  <?php for ($i=1; $i <=99 ; $i++) { ?>
  <option value="<?php echo $i ?>"><?php echo $i ?></option>
  <?php }?>
  </select></td></tr>
    </tbody>
    </table>
  </div>
  <h3  style="margin-top:40px">顧客情報</h3>
  <div class="row2 center-block" style="width: 70%">
    <table class="table">
    <tr><th>氏名</th><td>兵頭祐一</td></tr>
    <tr><th>お届け先</th><td>〒532-0003 大阪府大阪市淀川区宮原２丁目８−１ＳＥＳＴ新大阪</td></tr>
</table>
  </div>
<div class="text-right">
  <a href="#"><input type="button" class="btn btn-primary btn-lg" name="name" value="戻る"></a>
  <a href="#"><input type="button" class="btn btn-primary btn-lg" name="name" value="決定"></a>
</div>
  </div>
    </div>
  </body>
</html>
