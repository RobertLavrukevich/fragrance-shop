<?php
require_once 'database.php';
session_start();

if (!isset($_SESSION['user'])) {
    echo json_encode([]);
    exit();
}

$user_id = $_SESSION['user']['userID'];

$query = "SELECT products.productID, products.productBrandName, products.productPrice, products.product_image, cart.quantity 
          FROM cart 
          INNER JOIN products ON cart.product_id = products.productID 
          WHERE cart.user_id = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($cart_items);
exit();
?>
