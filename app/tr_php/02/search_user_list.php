<?php
//enable full error visibility in dev mode
ini_set('display_errors', 1);
error_reporting(E_ALL);

$input = filter_input_array(INPUT_GET) ?? [];
$host = 'mysql-training1';  
$dbname = 'training';
$username = 'training';
$password = 'secret';
$port = 3306;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully to database";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$sql = "SELECT id, name, name_kana, gender, age, mail_address FROM users WHERE 1=1";
$params = [];

if (!empty($input['id'])) {
    $sql .= " AND id = :id";
    $params[':id'] = $input['id'];
}

if (!empty($input['name'])) {
    $sql .= " AND name LIKE :name";
    $params[':name'] = '%' . $input['name'] . '%';
}

if (!empty($input['name_kana'])) {
    $sql .= " AND name_kana LIKE :name_kana";
    $params[':name_kana'] = '%' . $input['name_kana'] . '%';
}

if (!empty($input['age_from'])) {
    $sql .= " AND age >= :age_from";
    $params[':age_from'] = $input['age_from'];
}

if (!empty($input['age_to'])) {
    $sql .= " AND age <= :age_to";
    $params[':age_to'] = $input['age_to'];
}

if (!empty($input['gender'])) {
    $sql .= " AND gender = :gender";
    $params[':gender'] = $input['gender'];
}

if (!empty($input['mail_address'])) {
    $sql .= " AND mail_address LIKE :mail_address";
    $params[':mail_address'] = '%' . $input['mail_address'] . '%';
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>課題2-2(検索付きユーザー一覧)</title>
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <h4 class="mt-5">ユーザー管理（一覧）</h4>
      <h5>ユーザー検索</h5> 
      <form action="search_user_list.php" method="GET">
        <div class="row mb-5">
          <div class="col-6">
            <div class="row">
              <label for="searchId" class="col-sm-2 col-form-label">ID</label>
              <div class="col-sm-10 mb-2">
                <input name="id" type="text" class="form-control" id="searchId" value="<?= htmlspecialchars($input['id'] ?? '') ?>">
              </div>
              <label for="searchName" class="col-sm-2 col-form-label">名前</label>
              <div class="col-sm-10 mb-2">
                <input name="name" type="text" class="form-control" id="searchName" value="<?= htmlspecialchars($input['name'] ?? '') ?>">
              </div>
              <label for="searchNameKana" class="col-sm-2 col-form-label">名前カナ</label>
              <div class="col-sm-10 mb-2">
                <input name="name_kana" type="text" class="form-control" id="searchNameKana" value="<?=htmlspecialchars($input['name_kana'] ?? '') ?>">
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">検索</button>
          </div>

          <div class="col-6">
            <div class="row">
              <label for="searchAge" class="col-sm-2 col-form-label">年齢</label>
              <div class="col-sm-10 mb-2">
                <div class="input-group">
                  <input name="age_from" type="number" class="form-control" value="<?= htmlspecialchars($input['age_from'] ?? '') ?>">
                  <span class="input-group-text">歳以上</span>
                  <input name="age_to" type="number" class="form-control" value="<?= htmlspecialchars($input['age_to'] ?? '') ?>">
                  <span class="input-group-text">歳以下</span>
                </div>
              </div>
              <legend for="searchAge" class="col-sm-2 col-form-label">性別</legend>
              <div class="col-sm-10 mb-2">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="searchGender1"
                    value="man"
                    <?= isset($input['gender']) && htmlspecialchars($input['gender']) == 'man' ? 'checked=""' : '' ?>
                  >
                  <label class="form-check-label" for="searchGender1">
                    男性
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="searchGender1"
                    value="woman"
                    <?= isset($input['gender']) && htmlspecialchars($input['gender']) == 'woman' ? 'checked=""' : '' ?>
                  >
                  <label class="form-check-label" for="searchGender2">
                    女性
                  </label>
                </div>
              </div>
              <label for="searchEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10 mb-2">
                <input name="mail_address" type="email" class="form-control" id="searchEmail" value="<?= htmlspecialchars($input['mail_address']  ?? '') ?>">
              </div>
            </div>

          </div>

        </div>
      </form>

      <div class="row">
        <h5 class="col-10">ユーザー一覧</h5>
        <a  href="create_user.php" class="btn btn-success col-2">新規作成</a>
      </div>
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
          <?php foreach ($users as $user): ?>
  <tr>
    <th scope="row"><?= htmlspecialchars($user['id']) ?></th>
    <td><?= htmlspecialchars($user['name']) ?> (<?= htmlspecialchars($user['name_kana']) ?>)</td>
    <td><?= htmlspecialchars($user['gender']) ?></td>
    <td><?= htmlspecialchars($user['age']) ?></td>
    <td><?= htmlspecialchars($user['mail_address']) ?></td>
  </tr>
<?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <script src="/lib/jquery/jquery-3.6.3.min.js"></script>
    <script>
    </script>
  </body>
</html>
