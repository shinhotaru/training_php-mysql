<?php

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>注文履歴</title>
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <h4 class="mt-5">注文履歴</h4>
      <div class="row">
        <div class="col-7">
          <div class="card mb-5">
            <div class="card-header">
              注文日時：2023-01-01 00:00:00
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">タイトル</th>
                    <th scope="col">価格（税抜）</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>やさしいPHP</td>
                    <td>1,234円</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>やさしいJava</td>
                    <td>1,234円</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              合計金額：2,468円
            </div>
          </div>
          <div class="card mb-5">
            <div class="card-header">
              注文日時：2023-01-01 23:59:59
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">タイトル</th>
                    <th scope="col">価格（税抜）</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>やさしいRuby</td>
                    <td>1,234円</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>やさしいPython</td>
                    <td>1,234円</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              合計金額：2,468円
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
