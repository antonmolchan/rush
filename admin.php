
<?php
$servername = "localhost";
$username = "root";
$password = "147258369";
$dbname = "shop";

include 'products_sql.php';
include 'users_sql.php';
include 'basket_sql.php';
include 'category_sql.php';

// echo "<a href='/'>Exit</a>";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="admin.css">

</head>
<body>
<?php 
	if (isset($_POST['btnLogin'])) {
		$login = $_POST['usrnm'];
		$pass = $_POST['psw'];
		$ifLogin = true;
	 }?>

<?php if (!$ifLogin): ?>
<form method="post" style="max-width:500px;margin:auto">
			<h2 style="text-align: center; margin: 10px">Admin Panel</h2>
		<div class="input-container">
			<div class="imgCont">	
				<img src="./img/icon_user.png">
			</div>
			<input class="input-field" type="text" placeholder="Username" name="usrnm">
		</div>
		
		<div class="input-container">
			<div class="imgCont">
				<img src="./img/icon_key.png">
			</div>
			<input class="input-field" type="password" placeholder="Password" name="psw">
		</div>
	
		<button type="submit" name="btnLogin" class="btn">Login</button>
</form>
<?php endif?>
<?php if ($ifLogin): ?>

<div id="Products" class="tabcontent">
	<h3>Products</h3>
</div>

<div id="Categories" class="tabcontent">
	<h3>Categories</h3>
</div>

<div id="Users" class="tabcontent">
	<h3>Users</h3>
</div>

<button class="tablink" onclick="openCity('Products', this, 'blue', 'prdc')" id="defaultOpen">Products</button>
<button class="tablink" onclick="openCity('Categories', this, 'purple', 'cat')" id="defaultOpen">Categories</button>
<button class="tablink" onclick="openCity('Users', this, 'green', 'usrs')">Users</button>

<?php
if (isset($_POST['btnDellCat'])) {
	$id = $_POST['catId'];
	deleteCategory($id);
} else if (isset($_POST['btnAddCat'])) {

} else if (isset($_POST['btnSaveCat'])) {
	$id = $_POST['catId'];
	$name = $_POST['name'];
	updateCategory($id, $name);
}?>

<section id="cat" class="contAdmn">
	<?php
		$arr = getAllCategory();
		foreach ($arr as $val):
	?>
	<div id="<?php echo $val['id'];?>" class="wrap">
		<form method="post">

			<input type="text" name="catId" value="<?php echo $val['id'];?>" style="display: none;">
			<input type="text" name="name" value="<?php echo $val['name'];?>">

			<button type="submit" name="btnAddCat">Add Category</button>
			<button type="submit" name="btnSaveCat">Save Category</button>
			<button type="submit" name="btnDellCat">Delete Category</button>

		</form>
		
	</div>
<?php endforeach; ?>
</section>

<?php
if (isset($_POST['btnDellUser'])) {
	$id = $_POST['catId'];
	deleteUser($id);
} else if (isset($_POST['btnAddUser'])) {

} else if (isset($_POST['btnSaveUser'])) {
	$id = $_POST['catId'];
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	updateUserData($login, $pass, $id);
}?>

<section id="usrs">

	<?php
		$arr = getAllProduct();
		foreach ($arr as $val):
	?>
	<div id="<?php echo $val['id'];?>" class="wrap">
		<form action="" method="post">

			<input type="text" name="catId" value="<?php echo $val['id'];?>" style="display: none;">
			<input type="text" name="login" value="<?php echo $val['login'];?>">
			<input type="text" name="pass" value="<?php echo $val['pass'];?>">

			<button type="submit" name="btnAddUser">Add Product</button>
			<button type="submit" name="btnSaveUser">Save Product</button>
			<button type="submit" name="btnDellUser">Delete Product</button>

		</form>
		
	</div>
<?php endforeach; ?>
</section>


<?php
if (isset($_POST['btnDellPdkt'])) {
	$id = $_POST['catId'];
	deleteProduct($id);
} else if (isset($_POST['btnAddPdkt'])) {

} else if (isset($_POST['btnSavePdkt'])) {
	$id = $_POST['catId'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$img = $_POST['img'];
	updateProduct($id, $name, $description, $price, $img);
}?>

<section id="prdc">
		<?php
		$arr = getAllProduct();
		foreach ($arr as $val):
	?>
	<div id="<?php echo $val['id'];?>" class="wrap">
		<form action="" method="post">

			<input type="text" name="catId" value="<?php echo $val['id'];?>" style="display: none;">
			<input type="text" name="name" value="<?php echo $val['name'];?>">
			<input type="text" name="description" value="<?php echo $val['description'];?>">
			<input type="text" name="price" value="<?php echo $val['price'];?>">
			<input type="text" name="img" value="<?php echo $val['img'];?>">

			<button type="submit" name="btnAddPdkt">Add User</button>
			<button type="submit" name="btnSavePdkt">Save User</button>
			<button type="submit" name="btnDellPdkt">Delete User</button>

		</form>
		
	</div>
<?php endforeach; ?>
</section>


<?php endif?>

<script>
function openCity(cityName,elmnt,color,id) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablink");
		for (i = 0; i < tablinks.length; i++) {
				tablinks[i].style.backgroundColor = "";
		}
		document.getElementById(cityName).style.display = "block";
		elmnt.style.backgroundColor = color;
		document.getElementById('prdc').style.display = 'none';
		document.getElementById('usrs').style.display = 'none';
		document.getElementById('cat').style.display = 'none';
		document.getElementById(id).style.display = 'block';
}
document.getElementById("defaultOpen").click();
</script>

</body>
</html>
