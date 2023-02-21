<?php
$input = filter_input_array(INPUT_GET) ?? [];

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
                <input name="id" type="text" class="form-control" id="searchId" value="<?= $input['id'] ?? '' ?>">
              </div>
              <label for="searchName" class="col-sm-2 col-form-label">名前</label>
              <div class="col-sm-10 mb-2">
                <input name="name" type="text" class="form-control" id="searchName" value="<?= $input['name'] ?? '' ?>">
              </div>
              <label for="searchNameKana" class="col-sm-2 col-form-label">名前カナ</label>
              <div class="col-sm-10 mb-2">
                <input name="name_kana" type="text" class="form-control" id="searchNameKana" value="<?= $input['name_kana'] ?? '' ?>">
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">検索</button>
          </div>

          <div class="col-6">
            <div class="row">
              <label for="searchAge" class="col-sm-2 col-form-label">年齢</label>
              <div class="col-sm-10 mb-2">
                <div class="input-group">
                  <input name="age_from" type="number" class="form-control" value="<?= $input['age_from'] ?? '' ?>">
                  <span class="input-group-text">歳以上</span>
                  <input name="age_to" type="number" class="form-control" value="<?= $input['age_to'] ?? '' ?>">
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
                    <?= isset($input['gender']) && $input['gender'] == 'man' ? 'checked=""' : '' ?>
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
                    <?= isset($input['gender']) && $input['gender'] == 'woman' ? 'checked=""' : '' ?>
                  >
                  <label class="form-check-label" for="searchGender2">
                    女性
                  </label>
                </div>
              </div>
              <label for="searchEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10 mb-2">
                <input name="mail_address" type="email" class="form-control" id="searchEmail" value="<?= $input['mail_address'] ?? '' ?>">
              </div>
            </div>

          </div>

        </div>
      </form>

      <div class="row">
        <h5 class="col-10">ユーザー一覧</h5>
        <a  href="user_create.php" class="btn btn-success col-2">新規作成</a>
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
