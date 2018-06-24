
<?php
$servername = "localhost";
$username = "root";
$password = "147258369";
$dbname = "shop";

include 'products_sql.php';
include 'users_sql.php';
include 'basket_sql.php';
include 'category_sql.php';

session_start();
if (!isset($_SESSION[login]))
	$_SESSION[id] = 1;
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
		if ($login == "admin" && $pass == "admin") {
			$ifLogin = true;
			$_SESSION[login] = "admin";
			
		}
	 }?>

<?php if (!$ifLogin && $_SESSION[login] != "admin"): ?>
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
<?php if ($ifLogin || $_SESSION[login] == "admin"): ?>

<div id="Products" class="tabcontent">
	<h3>Products</h3>
</div>

<div id="Categories" class="tabcontent">
	<h3>Categories</h3>
</div>

<div id="Users" class="tabcontent">
	<h3>Users</h3>
</div>

<button class="tablink" onclick="category('Products', this, 'prdc')" id="defaultOpen">Products</button>
<button class="tablink" onclick="category('Categories', this, 'cat')" id="defaultOpen">Categories</button>
<button class="tablink" onclick="category('Users', this,  'usrs')">Users</button>


<section id="cat" class="contAdmn">
	<form method="post" action="function.php" >
		<input type="text" name="name" placeholder="name">
			<button type="submit" name="btnAddCat">Add Category</button>
	</form>
			

	<?php
		$arr = getAllCategory();
		foreach ($arr as $val):
	?>
		<form method="post" action="function.php">

			<input type="text" name="id" value="<?php echo $val['id'];?>" style="display: none;">
			<input type="text" name="name" value="<?php echo $val['name'];?>">

			<button type="submit" name="btnSaveCat">Save Category</button>
			<button type="submit" name="btnDellCat">Delete Category</button>

		</form>
		
<?php endforeach; ?>
</section>

<section id="usrs">
		<form method="post" action="function.php">
			<input type="text" name="login" placeholder="login">
			<input type="text" name="pass" placeholder="pass">

			<button type="submit" name="btnAddUser">Add User</button>
		</form>

	<?php
		$arr = getAllUser();
		foreach ($arr as $val):
	?>
		<form method="post" action="function.php">

			<input type="text" name="id" value="<?php echo $val['id'];?>" style="display: none;">
			<input type="text" name="login" value="<?php echo $val['login'];?>">
			<input type="text" name="pass" value="<?php echo $val['pass'];?>">

			<button type="submit" name="btnSaveUser">Save User</button>
			<button type="submit" name="btnDellUser">Delete User</button>
		</form>
		
<?php endforeach; ?>
</section>

<section id="prdc">

	<form method="post" action="function.php" >

		<input type="text" name="name" placeholder="name">
		<input type="text" name="description" placeholder="description">
		<input type="number" name="price" placeholder="price">
		<input type="text" name="img" placeholder="img link">
		<input type="number" name="category" placeholder="category id">

		<button type="submit" name="btnAddPdkt">Add Product</button>

	</form>

		<?php
		$arr = getAllProduct();
		foreach ($arr as $val):
	?>
		<form  method="post" action="function.php">

			<input type="text" name="id" value="<?php echo $val['id'];?>" style="display: none;">
			<input type="text" name="name" value="<?php echo $val['name'];?>">
			<input type="text" name="description" value="<?php echo $val['description'];?>">
			<input type="text" name="price" value="<?php echo $val['price'];?>">
			<input type="text" name="img" value="<?php echo $val['img'];?>">

			
			<button type="submit" name="btnSavePdkt">Save Product</button>
			<button type="submit" name="btnDellPdkt">Delete Product</button>

		</form>
		
<?php endforeach; ?>
</section>

<?php 

if (isset($_POST['logout'])) {
	session_destroy();
	$_SESSION[login] = "";
	header('Location: http://localhost:8100/admin.php');
}


?>

<form method="post">
	<button type="submit" name="logout">LOGOUT</button>
</form>

<?php endif?>

<script>
function category(cityName,elmnt,id) {
		elmnt.style.backgroundColor = "grey";
		document.getElementById('prdc').style.display = 'none';
		document.getElementById('usrs').style.display = 'none';
		document.getElementById('cat').style.display = 'none';
		document.getElementById(id).style.display = 'block';
}
document.getElementById("defaultOpen").click();
</script>

</body>
</html>
