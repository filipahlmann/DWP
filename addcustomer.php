<?php require_once("includes/dbh.inc.php"); ?>
<html>
<body>
<?php
$errors=false;
if(isset($_POST['Submit']))
{
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $street_name_and_number=$_POST['street_name_and_number'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $email=$_POST['email'];

    
    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['street_name_and_number']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['city'])) {
    $first_name = trim(strip_tags($_POST['first_name']));
    $last_name = trim(strip_tags($_POST['last_name']));
    $street_name_and_number = trim(strip_tags($_POST['street_name_and_number']));
    $phone = trim(strip_tags($_POST['phone']));
    $city = trim(strip_tags($_POST['city']));
    $email = trim(strip_tags($_POST['email']));


    } else {
    print '<p style="color: red;">Please submit both a title and an entry.</p>'; 
    $errors = TRUE;
    }
    if(!$errors)
    {
        
        $query = "INSERT INTO Postalcode (city)
        VALUES ('{$city}')";
        $result = mysqli_query($conn, $query);
    }
    
    if(!$errors)
    {
        $last_id = mysqli_insert_id($conn);
        $query = "INSERT INTO Customer (first_name, last_name, street_name_and_number, email, postalcodeID, phone)
        VALUES ('{$first_name}', '{$last_name}', '{$street_name_and_number}', '{$email}', '{$last_id}', '{$phone}')";
        $result = mysqli_query($conn, $query);

        echo "<h1>Opening hours section succesfully uploaded!</h1>";
    }
}

?>

<form name="upload" method="post" enctype="multipart/form-data"  action="">
    <h1>BILLING ADDRESS </h1>
    <input placeholder="Firstname" name="first_name" cols="40"><br>
    <input placeholder="Lastname" name="last_name" cols="40"><br>
    <input placeholder="Street name and number" name="street_name_and_number" cols="40"><br>
    <input placeholder="phone" name="phone" cols="40"><br>
    <input placeholder="city" name="city" cols="40"><br>
    <input placeholder="email" name="email" cols="40"><br>
    <input name="Submit" type="submit" value="Submit">
</form>	
</body>
</html>