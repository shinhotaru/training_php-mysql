<?php
require_once __DIR__ . '/classes/book.php';

$input = filter_input_array(INPUT_POST) ?? [];
$book = new Book($input);
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($book->isValid()) {
        $dsn = 'mysql:host=mysql-training1;dbname=training;charset=utf8mb4';
        $username = 'training';
        $password = 'secret';

        try {
            $pdo = new PDO($dsn, $username, $password);
            $stmt = $pdo->prepare('INSERT INTO books (title, author, page, price) VALUES (?, ?, ?, ?)');
            $stmt->execute([
                $book->title,
                $book->author,
                $book->page,
                $book->price,
            ]);

            $success = true;
        } catch (PDOException $e) {
            $book->errors[] = 'データベースエラー: ' . htmlspecialchars($e->getMessage());
        }
    }
}
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
       <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <?php if ($success): ?>
      <div class="alert alert-success" role="alert">
        登録が成功しました
      </div>
    <?php else: ?>
      <div class="alert alert-danger" role="alert">
        入力した内容に誤りがあり、登録が失敗しました
        <ul>
          <?php foreach ($book->errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  <?php endif; ?>
          </div>
        </div>
      </form>
    </div>
    <script src="/lib/jquery/jquery-3.6.3.min.js"></script>
    <script>
    </script>
  </body>
</html>
