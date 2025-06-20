<?php

/*
 * 1．挨拶文を作成する関数を作りましょう
 * 引数で名前と挨拶を受け取れるようにしてください。
 * 関数名は「getGreetingMessage」としてください。
*/

/*
 * 1'．getGreetingMessageをつかいましょう。
 * getGreetingMessageをつかって、2名に挨拶をします。
 * ・コネクト太郎さんに、「おはようございます！！」と挨拶をするメッセージを、$message_oneに代入してください。
 * ・コネクト次郎さんに、「おやすみなさい！！」と挨拶をするメッセージを、$message_twoに代入してください。
*/
function getGreetingMessage($name, $greeting) {
    return "$greeting, $name!";
}

$message_one = getGreetingMessage("Connect Taro", "Good morning!!");
$message_two = getGreetingMessage("Connect Jiro", "Good night!!");


/*
 * 2．購入情報を取得する関数を作りましょう
 * 引数で商品名と値段、購入個数を受け取れるようにしてください。
 * 返却する内容は、「{商品名}を{購入個数}個購入すると、{購入金額}円になります」のような文字列。
 * 関数名は「getPurchaseInformation」としてください。
*/

/*
 * 2'．getPurchaseInformationをつかいましょう。
 * getGreetingMessageをつかって、2つの購入情報を取得します。
 * ・本棚（10,000円）を2個購入する場合の購入情報をpurchase_info_oneに代入してください。
 * ・ケーキ（700円）を8個購入する場合の購入情報をpurchase_info_oneに代入してください。
*/ 
function getPurchaseInformation($product_name, $price, $quantity) {
    $total = $price * $quantity;
    return "If you purchase {$product_name} {$quantity}, the purchase price will be {$total} 
yen.";
}

$purchase_info_one = getPurchaseInformation("bookshelf", 10000, 2);
$purchase_info_two = getPurchaseInformation("cake", 700, 8);

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>課題1-2</title>
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
                <p>メッセージ1：<?= $message_one ?? '' ?></p>
                <p>メッセージ2：<?= $message_two ?? '' ?></p>
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
                <p><?= $purchase_info_one ?? '' ?></p>
                <p><?= $purchase_info_two ?? '' ?></p>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
