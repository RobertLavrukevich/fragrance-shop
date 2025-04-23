<?php
require_once 'database.php';
session_start();

if (!isset($_SESSION['user'])) {
    echo json_encode(['success' => false, 'message' => 'Пользователь не авторизован']);
    exit();
}

$user_id = $_SESSION['user']['userID'];
$data = json_decode(file_get_contents('php://input'), true);
$product_id = $data['productId'];

$query = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("ii", $user_id, $product_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Не удалось удалить товар']);
}
exit();
?>
