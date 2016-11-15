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
    <div class="wrap">
      <div class="">
    <h1>クーポン新規発行プレゼント商品選択</h1>
  </div>
      <div class="container">
        <div class="row">
          <table class="table"> <!-- サンプル -->
            <thead>
              <tr>
                <th style="width: 10%"></th>
                <th style="width: 20%">商品ID</th>
                <th style="width: 45%">商品名</th>
                <th style="width: 25%">ジャンル</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i <10 ; $i++) { ?>
              <tr>
                <td><input type="radio" name="name" style="width:80px;height:20px" value="<?php $i ?>"></td>
                <td>001</td>
                <td>マルゲリータピザ</td>
                <td>メイン</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="text-center">
          <a href="#"><input type="button" class="btn btn-primary btn-lg" name="name" value="戻る"></a>
          <a href="#"><input type="button" class="btn btn-primary btn-lg" name="name" value="確認"></a>
        </div>
      </div>
  </div>
</body>
</html>
