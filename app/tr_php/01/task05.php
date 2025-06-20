 <?php
$books = [
    '誰もがあきらめずにすむPHP超入門',
    'スラスラわかるPHP',
    '独習PHP',
    '詳細！PHP7 + MySQL入門ノート',
    'よくわかるPHPの教科書',
];

$input=[];
$input_text='';
$result='';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = filter_input_array(INPUT_POST, [
        'mode' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'order_number' => FILTER_VALIDATE_INT,
    ]);

    $mode = $input['mode'] ?? '';
    $order_number = $input['order_number'] ?? 0;

    switch ($mode) {
        case 'all':
            $result = implode('<br>', $books);
            $input_text = '全て';
            break;

        case 'odd':
            $filtered = array_filter($books, function ($_, $index) {
                return $index % 2 === 0; // 0-based index: 0 = 1st, 2 = 3rd...
            }, ARRAY_FILTER_USE_BOTH);
            $result = implode('<br>', $filtered);
            $input_text = '奇数番';
            break;

        case 'even':
            $filtered = array_filter($books, function ($_, $index) {
                return $index % 2 === 1; // 1-based: index 1 = 2nd
            }, ARRAY_FILTER_USE_BOTH);
            $result = implode('<br>', $filtered);
            $input_text = '偶数番';
            break;

        case 'order_number':
            if ($order_number >= 1 && $order_number <= count($books)) {
                $result = $books[$order_number - 1];
                $input_text = "{$order_number}冊目";
            } else {
                $result = '指定された冊目の本は存在しません。';
                $input_text = "無効な入力";
            }
            break;

        default:
            $result = '検索条件を選んでください。';
            $input_text = '未選択';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>課題1-5</title>
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="row mt-5">
        <div class="col-5">
          <h4>条件を指定して本を取得します</h4>
          <form action="/tr_php/01/task05.php" method="POST">
            <h5 class="text-muted mt-3">クイック検索</h3>
            <div class="form-check">
              <input name="mode" class="form-check-input" type="radio" id="formRadioAll" value="all">
              <label class="form-check-label" for="formRadioAll">全て</label>
            </div>

            <div class="form-check">
              <input name="mode" class="form-check-input" type="radio" id="formRadioOdd" value="odd">
              <label class="form-check-label" for="formRadioOdd">奇数番</label>
            </div>
            <div class="form-check">
              <input name="mode" class="form-check-input" type="radio" id="formRadioEven" value="even">
              <label class="form-check-label" for="formRadioEven">偶数番</label>
            </div>

            <h5 class="text-muted mt-3">順番指定</h3>
            <div class="input-group mb-2">
              <div class="input-group-text">
                <input name="mode" class="form-check-input" type="radio" value="order_number" >
              </div>
              <input name="order_number" type="number" class="form-control" min="1">
              <span class="input-group-text">冊目</span>
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
                <?= $result ?? '' ?>
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
