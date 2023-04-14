<?php
$input = filter_input_array(INPUT_POST) ?? [];

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
      <form action="create_.php" method="POST">
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
            <div class="alert alert-danger" role="alert">
              <ul>
                <li>名前は必須です</li>
                <li>年齢は半角数字で入力してください</li>
                <li>不正な性別です</li>
                <li>メールアドレス形式で入力してください</li>
              </ul>
            </div>
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
