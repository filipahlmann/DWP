<?php include('header.php'); ?>

<?php 
    include('addcustomer.php'); 

    if(!isset($_SESSION["cartItem"]) || empty($_SESSION["cartItem"]))
    {
        header('location:index.php');
        exit();
    }

    require_once('./includes/helpers.php');  

    //pre($_SESSION);

   

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


        <?php   $item_total = 0;
          $item_total += ($item["price"]*$item["quantity"]);
          $item_total;
          include('addcustomerOrder.php'); 

         ?>
         
				<td><a href="products.php?action=remove&code=<?php echo $item["code"]; ?>" class="removeBtn">Remove</a></td>
				</tr>
        <?php			
         $product_name = $item["name"]; 
         $product_code = $item["code"]; 
         $quantity = $item["quantity"]; 
         $product_price = $item["price"]." DKK";

      


		}		
		?>
<tr>
</tr>
</tbody>
</table>	
<?php include('footer.php'); ?>