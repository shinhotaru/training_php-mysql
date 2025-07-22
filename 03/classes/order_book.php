<?php
class OrderBook
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=mysql;dbname=training;', 'training', 'secret');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function createOrder(array $bookIds)
    {
        if (empty($bookIds)) {
            throw new Exception("No books selected.");
        }

        // Get selected books
        $placeholders = implode(',', array_fill(0, count($bookIds), '?'));
        $stmt = $this->pdo->prepare("SELECT id, price FROM books WHERE id IN ($placeholders)");
        $stmt->execute($bookIds);
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($books) === 0) {
            throw new Exception("No valid books found.");
        }

        $totalPrice = array_sum(array_column($books, 'price'));

        $now = date('Y-m-d H:i:s');

        // Start transaction
        $this->pdo->beginTransaction();

        try {
            // Insert into orders
            $stmt = $this->pdo->prepare(
                "INSERT INTO orders (user_id, total_price, ordered_at, created_at, updated_at) 
                 VALUES (?, ?, ?, ?, ?)"
            );
            $stmt->execute([1, $totalPrice, $now, $now, $now]);
            $orderId = $this->pdo->lastInsertId();

            // Insert into order_books
            $stmt = $this->pdo->prepare(
                "INSERT INTO order_books (order_id, book_id, price, created_at, updated_at) 
                 VALUES (?, ?, ?, ?, ?)"
            );

            foreach ($books as $book) {
                $stmt->execute([$orderId, $book['id'], $book['price'], $now, $now]);
            }

            $this->pdo->commit();
            return $orderId;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}

