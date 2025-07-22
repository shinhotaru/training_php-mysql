<?php
$name = 'Felix';
$greet = 'Good morning!';
$message = 'Message: ' . $name . ', ' . $greet;

/*
 * 1．文字列を扱って挨拶文を作りましょう
 * 名前を代入する変数「$name」と、挨拶を代入する変数「$greet」を定義しましょう。
 * 定義したらそれぞれの変数に任意の文字列を代入してください。
 * その後、$nameと$greetを使用してメッセージを作成します。作成したメッセージは「$message」に代入してください。
*/

$item = 'Bookcase';
$price = 12000;
$quantity = 2;
$total_price = $price * $quantity;
/*
 * 2．数値を扱って購入金額を求めましょう
 * 商品の名前を代入する変数「$item」を定義して任意の商品名を入れましょう（例：本棚）。
 * その商品の値段を代入する変数「$price」と、購入個数を代入する変数「$quantity」を定義しましょう。
 * 定義したらそれぞれの変数に任意の値段と購入個数を代入してください。
 * $priceと$quantityを掛け算して算出される購入金額を求めてください。求めた結果は「$total_price」に代入してください。
*/

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>課題1-1</title>
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="row mt-5">
        <div class="col-6">
          <h4>挨拶</h4>
          <div class="card">
            <div class="card-header">
              結果
            </div>
            <div class="card-body">
              <p class="card-text">
                <!-- ここに結果を出力しましょう -->
                <p>メッセージ：<?= $message ?? '' ?></p>
              </p>
            </div>
          </div>
        </div>
        <div class="col-6">
          <h4>商品の金額</h4>
          <div class="card">
            <div class="card-header">
              結果
            </div>
            <div class="card-body">
              <p class="card-text">
                <!-- ここに結果を出力しましょう -->
                <p><?= sprintf('%sを%s個購入すると、%s円になります', $item ?? '--', $quantity ?? '--', $total_price ?? '--') ?></p>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
