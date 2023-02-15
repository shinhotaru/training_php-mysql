<?php
$input =filter_input_array(INPUT_GET) ?? [];

/*
 * 課題2、課題3ではPHPの拡張モジュールである「PDO」を使用していきます。
 * PDOはクラスとして使用します。クラスの使い方は課題3で深掘りしていきますが、以下のマニュアルを読んでください。
 * https://www.php.net/manual/ja/class.pdo.php 
 * 
 * クラスは以下の手順で使用することができます。
 * 1. インスタンス化したものを変数に代入する（例：$pdo = new PDO(XXXXX);）
 * 2. 1で宣言した変数に対してアロー演算子（->）でクラスのメソッドを使用する（例：PDOクラスにfoo()というメソッドがあった場合、$pdo->foo();）
*/
$pdo = new PDO('mysql:host=mysql;dbname=training;', 'training', 'secret');

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>課題2-1(ユーザー一覧)</title>
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <h4 class="mt-5">ユーザー管理（一覧）</h4>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">名前(カナ)</th>
            <th scope="col">性別</th>
            <th scope="col">年齢</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>コネクト太郎(コネクトタロウ)</td>
            <td>man</td>
            <td>10</td>
            <td>dummy01@connec10.co.jp</td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>コネクト花子(コネクトハナコ)</td>
            <td>woman</td>
            <td>10</td>
            <td>dummy02@connec10.co.jp</td>
          </tr>
        </tbody>
      </table>
    </div>
    <script src="/lib/jquery/jquery-3.6.3.min.js"></script>
    <script>
    </script>
  </body>
</html>
