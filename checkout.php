<?php
session_start();
if(!empty($_SESSION["cart_item"])) {

foreach ($_SESSION["cart_item"] as $item){
    ?>
            <form method="post" action>
            <td><strong><?php echo $item["name"]; ?></strong></td>
            <td><?php echo $item["code"]; ?></td>
            <td><?php echo $item["quantity"]; ?></td>
            <td><?php echo $item["price"]." DKK"; ?></td>
            <input type="submit" value="Add to cart" class="addBtn" /></div>
            </tr>
            </form>
            <?php
    };
}


















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
