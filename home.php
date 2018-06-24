<?php
$title = "Home";
$content = "Hello world";

include 'template.php';
?>




<!DOCTYPE html>
<html>
<body>
	
</form>

      <ul class="products">

      	<?php
      	
		$arr = getAllProduct();
		
		foreach ($arr as $val): ?>
      	<li class="product-wrapper">

			<a href="" class="product">
      			<div class="product-photo">
					<img src="<?php echo $val[img];?>" alt="">
				</div>
				<p><br>"<?php echo $val[name];?>"<br> Price: "<?php echo $val[price];?>"</p>
      		</a>
      	</li>
      	<?php endforeach; ?>
</body>
</html>