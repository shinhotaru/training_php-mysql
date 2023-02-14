<?php
$input;
$input_text = 'Symbol【】/ Height【】/ Width【】';

$draw = '';

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>課題1-4</title>
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="row mt-5">
        <div class="col-5">
          <h4>指定の記号を繰り返し描画します</h4>
          <form action="/tr_php/01/task04.php" method="POST">
            <div class="input-group mb-3">
              <span class="input-group-text">Symbol</span>
              <select name="symbol" class="form-select" aria-label="Default select" id="symbolInput">
                <option value="■">■</option>
                <option value="●">●</option>
                <option value="▲">▲</option>
                <option value="★">★</option>
              </select>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">Height</span>
              <input name="height" type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
              <span class="input-group-text">個</span>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">Width</span>
              <input name="width" type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
              <span class="input-group-text">個</span>
            </div>
            <button type="submit" class="btn btn-primary mt-3">送信</button>
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
                <?= $draw ?? '' ?>
              </p>
            </div>
            <div class="card-footer text-muted">
              入力値：<?= $input_text ?? '' ?>
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
