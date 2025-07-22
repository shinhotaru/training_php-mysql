<?php
class UserOrderHistory
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=mysql;dbname=training;', 'training', 'secret');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getOrders($userId = 1)
    {
        // Fetch all orders for user_id = 1
        $stmt = $this->pdo->prepare("
            SELECT * FROM orders 
            WHERE user_id = ? AND deleted_at IS NULL
            ORDER BY ordered_at DESC
        ");
        $stmt->execute([$userId]);
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($orders as &$order) {
            $order['books'] = $this->getOrderBooks($order['id']);
        }

        return $orders;
    }

    private function getOrderBooks($orderId)
    {
        $stmt = $this->pdo->prepare("
            SELECT b.title, ob.price
            FROM order_books ob
            JOIN books b ON ob.book_id = b.id
            WHERE ob.order_id = ? AND ob.deleted_at IS NULL
        ");
        $stmt->execute([$orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

