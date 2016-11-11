<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>menuedit</title>
    <link rel="stylesheet" href="css/common/main.css" charset="utf-8">
    <link rel="stylesheet" href="css/common/reset.css" charset="utf-8">
    <link rel="stylesheet" href="css/common/bootstrap.min.css" charset="utf-8">
    <link rel="stylesheet" href="css/pages/index.css" charset="utf-8">
    <script src="js/common/bootstrap.min.js" charset="utf-8"></script>
    </script>
    </head>
  <body>
    <div class="wrap">


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
  </body>
</html>
