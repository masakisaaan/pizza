<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>login</title>
  <link rel="stylesheet" href="css/common/main.css" charset="utf-8">
  <link rel="stylesheet" href="css/common/reset.css" charset="utf-8">
  <link rel="stylesheet" href="css/common/bootstrap.min.css" charset="utf-8">
  <link rel="stylesheet" href="css/pages/index.css" charset="utf-8">
  <script src="js/common/bootstrap.min.js" charset="utf-8"></script>
  </script>
  </head>
  <body>
    <div class="wrap">
      <h1 id="menumanagement_title">メニュー管理画面</h1>
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

  </body>
</html>
