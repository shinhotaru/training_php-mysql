<?php
$input = filter_input_array(INPUT_POST) ?? [];

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>課題3(本の登録)</title>
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <h4 class="mt-5">書籍登録</h4>
      <h5>書籍情報を入力してください</h5> 
      <form action="create_book.php" method="POST">
        <div class="row mb-5">
          <div class="col-6">
            <div class="alert alert-success" role="alert">
              登録が成功しました</a>
            </div>
            <div class="row">
              <label for="inputTitle" class="col-sm-2 col-form-label">タイトル</label>
              <div class="col-sm-10 mb-2">
                <input name="title" type="text" class="form-control" id="inputTitle" value="<?= $input['title'] ?? '' ?>">
              </div>
              <label for="inputAuthor" class="col-sm-2 col-form-label">著者</label>
              <div class="col-sm-10 mb-2">
                <input name="author" type="text" class="form-control" id="inputAuthor" value="<?= $input['author'] ?? '' ?>">
              </div>

              <label for="inputPage" class="col-sm-2 col-form-label">ページ数</label>
              <div class="col-sm-10 mb-2">
                <div class="input-group">
                  <input name="page" type="number" class="form-control" id="inputPage" value="<?= $input['page'] ?? '' ?>">
                  <span class="input-group-text">ページ</span>
                </div>
              </div>
              <label for="inputPrice" class="col-sm-2 col-form-label">価格（税込）</label>
              <div class="col-sm-10 mb-2">
                <div class="input-group">
                  <input name="price" type="number" class="form-control" id="inputPrice" value="<?= $input['price'] ?? '' ?>">
                  <span class="input-group-text">円</span>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">送信</button>
          </div>

          <div class="col-6">
            <div class="alert alert-danger" role="alert">
              <ul>
                <li>タイトルは必須です</li>
                <li>著者は必須です</li>
                <li>ページ数は必須です</li>
                <li>ページ数は半角数字で入力してください</li>
                <li>価格は必須です</li>
                <li>価格は半角数字で入力してください</li>
                <li>価格は1円以上100,000円未満で入力してください</li>
              </ul>
            </div>
          </div>

        </div>
      </form>
    </div>
    <script src="/lib/jquery/jquery-3.6.3.min.js"></script>
    <script>
    </script>
  </body>
</html>
