<?php
$servername = "localhost";
$username = "root";
$password = "147258369";
$dbname = "shop";

include 'products_sql.php';
include 'users_sql.php';
include 'basket_sql.php';
include 'category_sql.php';



if (isset($_POST['btnDellCat'])) {
	$id = $_POST['id'];
	deleteCategory($id);
} else if (isset($_POST['btnAddCat'])) {
	$name = $_POST['name'];
	putCategory ($name);
} else if (isset($_POST['btnSaveCat'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	updateCategory($id, $name);
}


if (isset($_POST['btnDellUser'])) {
	$id = $_POST['id'];
	deleteUser($id);
} else if (isset($_POST['btnAddUser'])) {
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	putUser($login, $pass);
} else if (isset($_POST['btnSaveUser'])) {
	$id = $_POST['id'];
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	updateUserData($id, $login, $pass);
}


if (isset($_POST['btnDellPdkt'])) {
	$id = $_POST['id'];
	deleteProduct($id);
} else if (isset($_POST['btnAddPdkt'])) {
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$img = $_POST['img'];
	$category = $_POST['category'];
	putProduct($name, $description, $price, $img, $category);
} else if (isset($_POST['btnSavePdkt'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$img = $_POST['img'];
	updateProduct($id, $name, $description, $price, $img);
}

header('Location: http://localhost:8100/admin.php');
exit();
?>