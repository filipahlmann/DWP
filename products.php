<?php include('header.php'); ?>
<?php
spl_autoload_register(function ($class)
{include"class/".$class.".php";});

$cartController = new CartController();
if (isset($_SESSION["cartItem"])) {
    $cartController->existingCart($_SESSION["cartItem"]);
}
if(!empty($_GET["action"])) {
    if (isset($_GET['code'])){
        $code = $_GET['code'];}

    //start the switch/case
    switch($_GET["action"]) {
    //adding items to cart
	    case "add":
	        $cartController->cartAdd($code, $_POST["quantity"]);
            $_SESSION  = $cartController->itemArray;
	    break;
    //Remove item from cart
	    case "remove":
	        $cartController->cartRemove($code);
            $_SESSION  = $cartController->itemArray;
            break;
    //Empty the entire cart
	    case "empty":
		    unset($_SESSION["cartItem"]);
	    break;
    }
}
?>
<Html>
<head>
<Title>PHP Shopping Cart</Title>
<link href="css/products.css" type="text/css" rel="stylesheet" />
</head>
<Body>
<div id="shopping-cart">
<div class="heading">Shopping Cart <a id="emptyBtn" href="products.php?action=empty">Empty Cart</a></div>
<?php
//Reset total cost to do recalc
if(isset($_SESSION["cartItem"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Code</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cartItem"] as $item){
		?>
				<tr>
				<td><strong><?php echo $item["name"]; ?></strong></td>
				<td><?php echo $item["code"]; ?></td>
				<td><?php echo $item["quantity"]; ?></td>
				<td><?php echo $item["price"]." DKK"; ?></td>

				<td><a href="products.php?action=remove&code=<?php echo $item["code"]; ?>" class="removeBtn">Remove</a></td>
				</tr>

				<?php
				
        $item_total += ($item["price"]*$item["quantity"]);
		}
		
		?>









<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo $item_total." DKK"; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
?>
</div>



<div class="heading">Products</div><a href="create/create-product.php">Create a new product</a>

	<?php
    $db_handle = new DBController();
	$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $aNumber=> $value){
			
	?>
		<div class="product-item">
			<form method="post" action="products.php?action=add&code=<?php echo $product_array[$aNumber]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$aNumber]["image"]; ?>"></div>
			<div><strong><?php echo $product_array[$aNumber]["name"]; ?></strong></div>
			<div class="product-price"><?php echo $product_array[$aNumber]["price"]." DKK"; ?></div>
	
			<?php     if (isset($_SESSION["userid"])) {

				echo "<a href=\"edit/edit-products.php?ID= {$product_array[$aNumber]['ID']}\">Edit</a></p>\n"; 
				 ?><br>
			<?php echo "<a href=\"delete/delete-products.php?ID= {$product_array[$aNumber]['ID']}\">Delete</a></p>\n"; }?>
			<div>
			<input type="hidden" name="quantity" value="1" size="2" />
                <input type="submit" value="Add to cart" class="addBtn" /></div>
			</form>
		</div>
		<?php
		
		}
	}
	?>


</Body>
</Html>