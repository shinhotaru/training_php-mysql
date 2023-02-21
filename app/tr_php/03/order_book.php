<?php
$pdo = new PDO('mysql:host=mysql;dbname=training;', 'training', 'secret');
$stmt = $pdo->prepare('SELECT * FROM books');
$result = $stmt->execute();

$books = $result ? $stmt->fetchAll() : [];
$success = filter_input(INPUT_GET, 'order_success');
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>書籍一覧</title>
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <h4 class="mt-5">書籍一覧</h4>
      <? if (isset($success)) : ?>
      <div class="alert alert-success" role="alert">
        注文が完了しました！注文履歴は<a href="order_history.php">コチラ</a>
      </div>
      <? endif ?>
      <div class="row">
        <div class="col-8">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">タイトル</th>
                <th scope="col">著者</th>
                <th scope="col">ページ数</th>
                <th scope="col">価格（税抜）</th>
                <th scope="col">操作</th>
              </tr>
            </thead>
            <tbody>
              <? foreach ($books as $index => $book) : ?>
              <tr>
                <th scope="row"><?= $index + 1 ?></th>
                <td><?= $book['title'] ?></td>
                <td><?= $book['author'] ?></td>
                <td><?= $book['page'] ?></td>
                <td><?= number_format($book['price']) . '円' ?></td>
                <td>
                  <button
                    type="button"
                    class="btn btn-success add-basket"
                    id="addButtonId<?= $book['id'] ?>"
                    data-id="<?= $book['id'] ?>"
                    data-title="<?= $book['title'] ?>"
                    data-price="<?= $book['price'] ?>"
                  >買い物かごに追加</button>
                </td>
              </tr>
              <? endforeach ?>
            </tbody>
          </table>          
        </div>
        <div class="col-4">
          <div class="card border-primary text-primary">
            <div class="card-header border-primary">買い物かご</div>
            <div class="card-body" id="bookBasket">
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-8">
                  合計金額（税抜）：<span class="total-price">0</span>円
                </div>
                <div class="col-4">
                  <button type="button" class="btn btn-dark" id="buyButton" disabled>購入する</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/lib/jquery/jquery-3.6.3.min.js"></script>
    <script>
      var baskets = new Map()

      $('#buyButton').click(function () {
        form = $('<form/>', {action: 'create_order.php', method: 'post'})
        for (let [id] of baskets) {
          form.append($('<input/>', {type: 'hidden', name: 'book_ids[]', value: id}))
        }
        form.appendTo(document.body).submit()
      })

      $('.add-basket').click(function () {
        var id = $(this).data('id')
        var title = $(this).data('title')
        var price = $(this).data('price')
        var book = $(`<div class="card mt-3 text-dark" id="cardId${id}">`)
        var head = $('<div class="row p-1">').append(
          $('<h5 class="card-title col-11">').append(title),
          $(`<button type="button" class="btn-close col-1 delete-basket" data-delete-id="${id}">`)
        )
        book.append(
          head,
          $('<p class="card-text px-3">').append('価格（税抜）：' + price.toLocaleString() + '円')
        )
        book.appendTo($('#bookBasket'))
        $(this).prop('disabled', true)
          .removeClass('btn-success')
          .addClass('btn-dark')
          .html('追加済')
        baskets.set(
          id,
          {
            title: title,
            price: price
          }
        )
        setBuyArea()
      })

      $('body').on('click', '.delete-basket', function () {
        var id = $(this).data('delete-id')
        console.log(`#cardId${id}`)
        $(`#cardId${id}`).remove()
        $(`#addButtonId${id}`).prop('disabled', false)
          .removeClass('btn-dark')
          .addClass('btn-success')
          .html('買い物かごに追加')
        baskets.delete(id)
        setBuyArea()
      })

      function setBuyArea() {
        var totalPrice = 0
        for (let [id, book] of baskets) {
          totalPrice += book.price
        }
        $('.total-price').text(totalPrice.toLocaleString())
        if (totalPrice > 0) {
          $('#buyButton').prop('disabled', false)
            .removeClass('btn-dark')
            .addClass('btn-success')
        } else {
          $('#buyButton').prop('disabled', true)
            .removeClass('btn-success')
            .addClass('btn-dark')
        }
      }
    </script>
  </body>
</html>
