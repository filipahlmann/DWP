<?php include('header.php'); ?>
<link rel="stylesheet" href="css/products.css">

<?php 
spl_autoload_register(function ($class)
{include"class/".$class.".php";});
$cartController = new CartController();

?>	
<div class="heading">Shopping Cart <a id="emptyBtn" href="products.php?action=empty">Empty Cart</a></div>

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
    $item_total = 0;
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
<div class="heading">You may also like</div>
<?php 

if ((isset($_SESSION["cartItem"])) AND ((1999.00 > $item["price"]))) {
			$db_handle = new DBController();
			$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY price ASC LIMIT 0, 4");
			if (!empty($product_array)) { 
				foreach($product_array as $aNumber=> $value){
					
			?>
				<div class="product-item">
					<form method="post" action="products.php?action=add&code=<?php echo $product_array[$aNumber]["code"]; ?>">
					<div class="product-image"><img src="<?php echo $product_array[$aNumber]["image"]; ?>"></div>
					<div><strong><?php echo $product_array[$aNumber]["name"]; ?></strong></div>
					<div class="product-price"><?php echo $product_array[$aNumber]["price"]." DKK"; ?></div>
					<div>
					<input type="hidden" name="quantity" value="1" size="2" />
						<input type="submit" value="Add to cart" class="addBtn" /></div>
					</form>
				</div>
				<?php
				
				
			}
        }
    }