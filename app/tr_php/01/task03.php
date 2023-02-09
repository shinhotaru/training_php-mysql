<?php
/* $inputに画面で入力して送信した内容を代入します。この課題以降、画面から入力した値を使う場合が出てきます。
 * この課題で、入力した値の取得方法と取り扱い方を覚えましょう。
 * filter_input, またはfilter_input_array関数を使用して取得します。
 * これらの関数は連想配列を結果として返却します。後ほどの課題で出てきますが、連想配列の中身の取り出し方を覚えましょう。
*/
$input = filter_input_array(INPUT_POST);

// $priceに条件によって変わる価格を代入することで画面に表示されるようになっています。
$price = 0;

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>課題3</title>
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="row mt-5">
        <div class="col-5">
          <form action="/tr_php/01/task03.php" method="POST">
            <label for="titleInput" class="form-label text-muted">タイトル</label>
            <select name="title" class="form-select mb-3" aria-label="Default select" id="titleInput">
              <option value="" selected="">映画のタイトルを選択してください</option>
              <option value="タイタニック">タイタニック</option>
              <option value="ボヘミアン・ラプソディ">ボヘミアン・ラプソディ</option>
              <option value="ミッション・インポッシブル">ミッション・インポッシブル</option>
              <option value="スターウォーズ">スターウォーズ</option>
            </select>
            <label for="ageInput" class="form-label text-muted">年齢</label>
            <div class="input-group mb-3">
              <input name="age" type="number" class="form-control" id="ageInput">
              <span class="input-group-text">歳</span>
            </div>
            <label for="yearInput" class="form-label text-muted">予約日時</label>
            <div class="input-group mb-3">
              <select name="year" class="form-select" aria-label="Default select" id="yearInput">
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
              <span class="input-group-text">年</span>

              <select name="month" class="form-select" aria-label="Default select" id="monthInput">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
              <span class="input-group-text">月</span>

              <select name="day" class="form-select" aria-label="Default select" id="dayInput">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
              <span class="input-group-text">日</span>

              <select name="time" class="form-select" aria-label="Default select" id="timeInput">
                <option value="8:30">8:30</option>
                <option value="12:00">12:00</option>
                <option value="15:30">15:30</option>
                <option value="21:00">21:00</option>
              </select>
              <span class="input-group-text">〜</span>
            </div>
            <button type="submit" class="btn btn-primary mt-3">送信</button>
          </form>          
        </div>

        <div class="col-1 mt-5 p-4">
          <img src="/public/img/arrow.png" class="img-fluid">
        </div>

        <div class="col-6">
          <div>
            <table class="table caption-top">
              <caption>入力内容確認</caption>
              <thead>
                <tr>
                  <th scope="col">項目</th>
                  <th scope="col">内容</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">タイトル</th>
                  <td><?= $input['title'] ?? "" ?></td>
                </tr>
                <tr>
                  <th scope="row">年齢</th>
                  <td><?= $input['age'] ?? "" ?>歳</td>
                </tr>
                <tr>
                  <th scope="row">予約日時</th>
                  <td><?= sprintf('%s年%s月%s日%s', $input['year'] ?? "--", $input['month'] ?? "--", $input['day'] ?? "--", $input['time'] ?? "", ) ?></td>
                </tr>
                <tr>
                  <th scope="row">価格</th>
                  <td><?= number_format($price) ?>円</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <script src="/lib/jquery/jquery-3.6.3.min.js"></script>
    <script>
      
    </script>
  </body>
</html>
