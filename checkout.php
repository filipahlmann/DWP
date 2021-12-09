<?php
session_start();
foreach ($_SESSION["cart_item"] as $item){
    ?>
            <form>
            <td><strong><?php echo $item["name"]; ?></strong></td>
            <td><?php echo $item["code"]; ?></td>
            <td><?php echo $item["quantity"]; ?></td>
            <td><?php echo $item["price"]." DKK"; ?></td>
            <td><a href="products.php?action=remove&code=<?php echo $item["code"]; ?>" class="removeBtn">Remove</a></td>
            </tr>
            </form>
            <?php
    };


	<?php
	if (!$_SESSION["cart_item"])) { 
		foreach($_SESSION["cart_item"] as $aNumber=> $value){
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
















if(!empty($_SESSION["cart_item"])) {
echo '<h3>Din ordre</h3>';

}
$errors=false;
if(isset($_POST['Submit']))
{

$code = $item["code"]; 
$quantity = $item["quantity"];
$price = $item["price"];
$name = $item["name"];
if(!$errors)
    {
        $query = "INSERT INTO orders (name, code, quantity, price) 
						) VALUES ('{$name}','{$code},'{$quantity},'{$price} '
						)";
        $result = mysqli_query($conn, $query);

        echo "<h1>Image succesfully uploaded!</h1>";
    }else{
        $image = "";
    }}

?>

<input name="Submit" type="submit" value="Submit">
