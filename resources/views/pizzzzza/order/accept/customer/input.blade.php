<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>お客様情報登録画面</title>
    <link rel="stylesheet" href="css/common/main.css" charset="utf-8">
    <link rel="stylesheet" href="css/common/reset.css" charset="utf-8">
    <link rel="stylesheet" href="css/common/bootstrap.min.css" charset="utf-8">
    <link rel="stylesheet" href="css/pages/index.css" charset="utf-8">
    <script src="js/common/bootstrap.min.js" charset="utf-8"></script>
    <script src="http://ajaxzip3.googlecode.com/svn/trunk/ajaxzip3/ajaxzip3.js" charset="UTF-8"></script>
  </head>
  <body>
    <div class="wrap">
      <h1>お客様情報登録</h1>
      <div class="form-group table-responsive">
        <table class="table">
          <tbody>
            <tr>
              <th class="text-center" style="padding-top:12px;"><label for="">名前(漢字)</label></th>
              <td><input class="form-control" type="text" name="name" value="" placeholder="姓"></td>
              <td><input class="form-control" type="text" name="name" value="" placeholder="名"></td>
            </tr>
            <tr>
              <th class="text-center" style="padding-top:12px;"><label for="">名前(カナ)</label></th>
              <td><input class="form-control" type="text" name="name" value="" placeholder="セイ"></td>
              <td><input class="form-control" type="text" name="name" value="" placeholder="メイ"></td>
            </tr>
            <tr>
              <th class="text-center" style="padding-top:12px;"><label for="">郵便番号</label></th>
              <td><input class="form-control" style="width:30%;" maxlength="8" type="text" name="name" value="" placeholder="123-4567"></td>
            </tr>
            <tr>
              <th class="text-center" style="padding-top:12px;"><label for="">都道府県</label></th>
              <td><input class="form-control" style="width:30%;" type="text" name="name" value="" placeholder=""></td>
            </tr>
            <tr>
              <th class="text-center" style="padding-top:12px;"><label for="">市区町村</label></th>
              <td><input class="form-control" type="text" name="name" value="" placeholder="市区町村"></td>
            </tr>
            <tr>
              <th class="text-center" style="padding-top:12px;"><label for="">番地</label></th>
              <td><input class="form-control" type="text" name="name" value="" placeholder="番地"></td>
            </tr>
            <tr>
              <th class="text-center" style="padding-top:12px;"><label for="">建物名</label></th>
              <td><input class="form-control" type="text" name="name" value="" placeholder="建物名"></td>
            </tr>
            <tr>
              <th class="text-center" style="padding-top:12px;"><label for="">電話番号</label></th>
              <td><input class="form-control"  type="number" name="name" value="" placeholder=""></td>
              <td><input class="form-control"  type="number" name="name" value="" placeholder=""></td>
              <td><input class="form-control"  type="number" name="name" value="" placeholder=""></td>
            </tr>
          </tbody>

        </table>
        <div class="text-center">
          <button type ="button" style="margin-top:20px;" class="btn btn-primary btn-lg"name="button">確認</button>
        </div>

      </div>
    </div>
  </body>
</html>
