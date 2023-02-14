<?php
$category_books = [
    'php' => [
        ['title' => 'やさしいPHP', 'price' => 1200],
        ['title' => '独習PHP', 'price' => 1800],
        ['title' => 'PHPフレームワークLaravel入門', 'price' => 2000],
    ],
    'java' => [
        ['title' => 'やさしいJava', 'price' => 2345],
        ['title' => 'Java言語で学ぶデザインパターン入門', 'price' => 3600],
    ],
    'ruby' => [
        ['title' => 'たのしいRuby', 'price' => 1400],
    ],
];

/* Pythonが含まれていないので、$category_booksに以下の要素を追加する処理を書いてください。
 * キー：python
 * 要素：
 *  1冊目 -> タイトル:たのしいPython, 値段:1,280円
 *  2冊目 -> タイトル:スラスラわかるPython, 値段:1,500円,
 *  3冊目 -> タイトル:いちばんやさしいPythonの絵本, 値段:800円
 *  4冊目 -> タイトル:退屈なことはPythonにやらせよう, 値段:2,200円
*/

$input;
$input_str;
$result;

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>課題1-6</title>
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="row mt-5">
        <div class="col-5">
          <h4>条件を指定して本を取得します</h4>
          <form action="/tr_php/01/task06.php" method="POST">
            <h5 class="text-muted mt-3">クイック検索</h3>
            <div class="form-check">
              <input name="mode" class="form-check-input" type="radio" id="formRadioAll" value="all">
              <label class="form-check-label" for="formRadioAll">全て</label>
            </div>
            <div class="form-check">
              <input name="mode" class="form-check-input" type="radio" id="formRadioMost" value="most">
              <label class="form-check-label" for="formRadioMost">冊数が多いカテゴリー</label>
            </div>

            <h5 class="text-muted mt-3">カテゴリー指定</h3>
            <div class="input-group mb-2">
              <div class="input-group-text">
                <input name="mode" class="form-check-input" type="radio" value="category" >
              </div>
              <select name="category" class="form-select" aria-label="Default select">
                <option value="php">PHP</option>
                <option value="java">Java</option>
                <option value="ruby">Ruby</option>
                <option value="python">Python</option>
              </select>
            </div>

            <h5 class="text-muted mt-3">値段指定</h3>
            <div class="input-group mb-2">
              <div class="input-group-text">
                <input name="mode" class="form-check-input" type="radio" value="price" >
              </div>
              <input name="min_price" type="number" class="form-control">
              <span class="input-group-text">円以上</span>
              <input name="max_price" type="number" class="form-control">
              <span class="input-group-text">円以下</span>
            </div>

            <button type="submit" class="btn btn-primary mt-3">検索</button>
          </form>          
        </div>

        <div class="col-1 mt-5 p-4">
          <img src="/public/img/arrow.png" class="img-fluid">
        </div>

        <div class="col-6">
          <div class="card mt-5">
            <div class="card-header">
              結果
            </div>
            <div class="card-body">
              <p class="card-text">
                <!-- ここに結果を出力しましょう -->
                <?= $resul ?? '' ?>
              </p>
            </div>
            <div class="card-footer text-muted">
              入力値：<?= $input_str ?? '' ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="/lib/jquery/jquery-3.6.3.min.js"></script>
    <script>
    </script>
  </body>
</html>
