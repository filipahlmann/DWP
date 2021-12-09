<?php
include_once 'header.php';
require_once("DBController.php");
$db_handle = new DBController();
var_dump($_SESSION);
if(!empty($_GET["action"])) {
    //start the switch/case
switch($_GET["action"]) {
//adding items to cart
	case "add":

		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM products WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array(
			    'name'=>$productByCode[0]["name"],
                'code'=>$productByCode[0]["code"],
                'quantity'=>$_POST["quantity"],
                'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
//Remove item from cart
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
//Empty the entire cart
	case "empty":
		unset($_SESSION["cart_item"]);
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
if(isset($_SESSION["cart_item"])){
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
    foreach ($_SESSION["cart_item"] as $item){
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
		<?php
				echo $item["code"];
				echo $item["quantity"];
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

<div>
	<div class="heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $aNumber=> $value){
	?>

		<div class="product-item">
			<form method="post" action="products.php?action=add&code=<?php echo $product_array[$aNumber]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$aNumber]["image"]; ?>"></div>
			<div><strong><?php echo $product_array[$aNumber]["name"]; ?></strong></div>
			<div class="product-price"><?php echo $product_array[$aNumber]["price"]." DKK"; ?></div>
			<div>
                <input type="text" name="quantity" value="1" size="2" />
                <input type="submit" value="Add to cart" class="addBtn" /></div>
			</form>
		</div>
	<?php
			}
	}
	?>

<a href="createProduct.php">Create a new product</a>

</div>
</Body>
</Html>