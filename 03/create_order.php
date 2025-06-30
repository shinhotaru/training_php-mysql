<?php
require_once __DIR__ . '/classes/order_book.php';

try {
    $bookIds = filter_input(INPUT_POST, 'book_ids', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    if (!$bookIds) {
        throw new Exception('No books selected.');
    }

    $orderBook = new OrderBook();
    $orderBook->createOrder($bookIds);

    header('Location: order_book.php?order_success');
    exit;
} catch (Exception $e) {
    // Handle errors gracefully (log or show error message as needed)
    echo "注文処理中にエラーが発生しました: " . htmlspecialchars($e->getMessage());
}

