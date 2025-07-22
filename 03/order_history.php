<?php
require_once __DIR__ . '/classes/user_order_history.php';

$history = new UserOrderHistory();
$orders = $history->getOrders(1); // user_id = 1
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>注文履歴</title>
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <h4 class="mt-5">注文履歴</h4>
      <div class="row">
        <div class="col-7">
              <?php if (empty($orders)) : ?>
            <div class="alert alert-info">注文履歴がありません。</div>
          <?php else : ?>
            <?php foreach ($orders as $order) : ?>
          <div class="card mb-5">
            <div class="card-header">
              注文日時：<?= htmlspecialchars($order['ordered_at']) ?>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">タイトル</th>
                    <th scope="col">価格（税抜）</th>
                  </tr>
                </thead>
                <tbody>
  <?php foreach ($order['books'] as $index => $book) : ?>
                  <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($book['title']) ?></td>
                <td><?= number_format($book['price']) ?>円</td>
                  </tr>
           <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              合計金額：<?= number_format($order['total_price']) ?>円
            </div>
          </div>
     <?php endforeach; ?>
          <?php endif; ?> 
        </div>
      </div>
    </div>
    <script src="/lib/jquery/jquery-3.6.3.min.js"></script>
    <script>
    </script>
  </body>
</html>
