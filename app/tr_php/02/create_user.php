<?php
$input = filter_input_array(INPUT_POST) ?? [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validation
    if (empty($input['name'])) {
        $errors[] = '名前は必須です';
    }

    if (empty($input['name_kana'])) {
        $errors[] = '名前カナは必須です';
    }

    if (!isset($input['age']) || !preg_match('/^[0-9]+$/', $input['age'])) {
        $errors[] = '年齢は半角数字で入力してください';
    }

    if (!in_array($input['gender'] ?? '', ['man', 'woman'])) {
        $errors[] = '不正な性別です';
    }

    if (!filter_var($input['mail_address'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'メールアドレス形式で入力してください';
    }

    // If no errors, insert into database and redirect
    if (empty($errors)) {
        // DB connection
        $dsn = 'mysql:host=mysql-training1;dbname=training;charset=utf8mb4';
        $username = 'training';
        $password = 'secret';

        try {
            $pdo = new PDO($dsn, $username, $password);
            $stmt = $pdo->prepare('INSERT INTO users (name, name_kana, age, gender, mail_address) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([
                $input['name'],
                $input['name_kana'],
                $input['age'],
                $input['gender'],
                $input['mail_address']
            ]);

            header('Location: search_user_list.php');
            exit;
        } catch (PDOException $e) {
            $errors[] = 'データベースエラー: ' . htmlspecialchars($e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>課題2(ユーザー一覧)</title>
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <h4 class="mt-5">ユーザー管理（登録）</h4>
      <h5>ユーザー情報を入力してください</h5> 
      <form action="create_user.php" method="POST">
        <div class="row mb-5">
          
          <div class="col-6">
            <div class="row">
              <label for="inputName" class="col-sm-2 col-form-label">名前</label>
              <div class="col-sm-10 mb-2">
                <input name="name" type="text" class="form-control" id="inputName" value="<?= $input['name'] ?? '' ?>">
              </div>
              <label for="inputNameKana" class="col-sm-2 col-form-label">名前カナ</label>
              <div class="col-sm-10 mb-2">
                <input name="name_kana" type="text" class="form-control" id="inputNameKana" value="<?= $input['name_kana'] ?? '' ?>">
              </div>

              <label for="inputAge" class="col-sm-2 col-form-label">年齢</label>
              <div class="col-sm-10 mb-2">
                <div class="input-group">
                  <input name="age" type="number" class="form-control" id="inputAge" value="<?= $input['age_from'] ?? '' ?>">
                  <span class="input-group-text">歳</span>
                </div>
              </div>
              <legend for="searchAge" class="col-sm-2 col-form-label">性別</legend>
              <div class="col-sm-10 mb-2">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="inputGender1"
                    value="man"
                    <?= isset($input['gender']) && $input['gender'] == 'man' ? 'checked=""' : '' ?>
                  >
                  <label class="form-check-label" for="inputGender1">
                    男性
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="inputGender2"
                    value="woman"
                    <?= isset($input['gender']) && $input['gender'] == 'woman' ? 'checked=""' : '' ?>
                  >
                  <label class="form-check-label" for="inputGender2">
                    女性
                  </label>
                </div>
              </div>
              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10 mb-2">
                <input name="mail_address" type="email" class="form-control" id="inputEmail" value="<?= $input['mail_address'] ?? '' ?>">
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">送信</button>
          </div>

          <div class="col-6">
           <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" role="alert">
              <ul>
               <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
              </ul>
            </div>
    <?php endif; ?>
          </div>
        </div>
      </form>
      <a  href="user_list.php" class="btn btn-danger col-2">一覧へ戻る</a>
    </div>
    <script src="/lib/jquery/jquery-3.6.3.min.js"></script>
    <script>
    </script>
  </body>
</html>
