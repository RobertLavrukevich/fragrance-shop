<?php 
$products = mysqli_query($connect, "SELECT * FROM `products`");
$products = mysqli_fetch_all($products);
$sql = "SELECT * FROM `products` WHERE 1=1";

if (isset($_GET['vendor']) && is_array($_GET['vendor'])) {
  $vendors = array_map(fn($v) => "'" . mysqli_real_escape_string($connect, $v) . "'", $_GET['vendor']);
  $sql .= " AND productBrandname IN (" . implode(',', $vendors) . ")";
  $_SESSION['selected_vendors'] = $_GET['vendor'];
}

if (isset($_GET['male']) && is_array($_GET['male'])) {
  $genders = array_map(fn($g) => "'" . mysqli_real_escape_string($connect, $g) . "'", $_GET['male']);
  $sql .= " AND productMale IN (" . implode(',', $genders) . ")";
  $_SESSION['selected_male'] = $_GET['male'];
}

$priceMin = isset($_GET['price_min']) ? (int)$_GET['price_min'] : 0;
$priceMax = isset($_GET['price_max']) ? (int)$_GET['price_max'] : PHP_INT_MAX;
$sql .= " AND productPrice BETWEEN $priceMin AND $priceMax";
$_SESSION['price_min'] = $priceMin;
$_SESSION['price_max'] = $priceMax;

if (isset($_GET['season']) && is_array($_GET['season'])) {
  $seasons = array_map(fn($s) => "'" . mysqli_real_escape_string($connect, $s) . "'", $_GET['season']);
  $sql .= " AND productSeason IN (" . implode(',', $seasons) . ")";
  $_SESSION['selected_season'] = $_GET['season'];
}


$result = mysqli_query($connect, $sql);
if (!$result) {
  die("Ошибка при выполнении запроса: " . mysqli_error($connect));
}
$products = mysqli_fetch_all($result);

?>