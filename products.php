<?php
include_once 'header.php'
?>
<?php
$product_array = array(
    array("id"=>1,"name"=>"iPhone 8 Gold","code"=>"D2885","image"=>"iPhone8-gold.jpg", "condition"=>"Like New", "price"=>"1999"),
    array("id"=>2,"name"=>"iPhone 11 Red","code"=>"D2886","image"=>"iPhone11-red.jpg", "condition"=>"Good", "price"=>"3999"),
    array("id"=>3,"name"=>"iPhone X Silver","code"=>"D2887","image"=>"iPhoneX-silver.png", "condition"=>"Very Good", "price"=>"2999"),
    array("id"=>4,"name"=>"iPhone Xs Silver","code"=>"D2888","image"=>"iPhoneXs-silver.jpg", "condition"=>"Acceptable", "price"=>"3499"),
);

if(!empty($_GET["action"])) {
//start the switch/case
    switch($_GET["action"]) {

//adding items to cart
	case "add":
		if(!empty($_POST["quantity"])) {
            $findCodeInArray = array_search($_GET["code"],  array_column($product_array, 'code'));
            $productByCode = $product_array[$findCodeInArray];
            $itemArray = array(
                    $productByCode["code"]=>array(
                        'name'=>$productByCode["name"],
                        'code'=>$productByCode["code"],
                        'quantity'=>$_POST["quantity"],
                        'price'=>$productByCode["price"],
                        'condition'=>$productByCode["condition"]
                    )
            );
            //add quantity to existing item
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								else {
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                }
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
			foreach($_SESSION["cart_item"] as $cartItemCode => $v) {
					if($_GET["code"] == $cartItemCode)
						unset($_SESSION["cart_item"][$cartItemCode]);
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
<html>
<head>
<title>PHP Shopping Cart</title>
<link href="css/products.css" type="text/css" rel="stylesheet" />
</head>
<body>
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
<th><strong>Condition</strong></th>
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
                <td><?php echo $item["condition"]." "; ?></td>
                <td><?php echo $item["price"]." DKK"; ?></td>
				<td><a href="products.php?action=remove&code=<?php echo $item["code"]; ?>" class="removeBtn">Remove</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo $item_total. " DKK"; ?></td>
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
    if (!empty($product_array)) {
		foreach($product_array as $aNumber=> $value){
	?>
		<div class="product-item">
			<form method="post" action="products.php?action=add&code=<?php echo $product_array[$aNumber]["code"]; ?>">
			<div class="product-image"><img width="250" height="100" src="img/ <?php echo $product_array[$aNumber]["image"]; ?>"></div>
            <div><strong><?php echo $product_array[$aNumber]["name"]; ?></strong></div>
            <div class="product-condition"><?php echo $product_array[$aNumber]["condition"]; ?></div>
			<div class="product-price"><?php echo $product_array[$aNumber]["price"]. " DKK"; ?></div>
			<div>
                <input type="text" name="quantity" value="1" size="2" />
                <input type="submit" value="Add to cart" class="addBtn" />
            </div>
			</form>
		</div>
	<?php
			}
	}
	?>
</div>


</body>
</html>


