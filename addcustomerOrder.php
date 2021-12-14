<?php require_once("includes/dbh.inc.php"); ?>
<html>
<body>
<?php
$errors=false;
if(isset($_POST['Submit']))
{
    $created_at = date('Y-m-d H:i:s');
    $item_total;

    if(!$errors)
    $last_id = mysqli_insert_id($conn);
    {
        $query = "INSERT INTO CustomerOrder (item_total, created_at, customerID)
        VALUES ('{$item_total}', '{$created_at}', '{$last_id}')";
        $result = mysqli_query($conn, $query);

    }
    $quantity = $item["quantity"]; 
    {
        $query = "INSERT INTO Order (quantity)
        VALUES ('{$quantity}')";
    }
   
    
}

?>	
</body>
</html>