
<?php
$servername = "localhost";
$username = "root";
$password = "147258369";
$dbname = "shop";

include 'products_sql.php';
include 'users_sql.php';
include 'basket_sql.php';
include 'category_sql.php';

// $test = getAllCategory();
// foreach ($test as $value) {
// 	echo "id: " . $value["id"]. " -  name:   " . $value["name"]. "<br>";
// }
echo "<a href='admin.php'>Admin</a>";

// getAllProduct();
// deleteUser("rty");

?>


