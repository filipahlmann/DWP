<?php require_once("../includes/dbh.inc.php"); ?>
<html>
<body>
<?php
$errors=false;
if(isset($_POST['Submit']))
{
    $title=$_POST['title'];
    $description=$_POST['mail'];
    $description=$_POST['phone'];

    
    if (!empty($_POST['title']) && !empty($_POST['mail']) && !empty($_POST['phone'])) {
    $title = trim(strip_tags($_POST['title'])); 
    $mail = trim(strip_tags($_POST['mail']));
    $phone = trim(strip_tags($_POST['phone']));
    } else {
    print '<p style="color: red;">Please submit both a title and an entry.</p>'; 
    $errors = TRUE;
    }

    if(!$errors)
    {
        $query = "INSERT INTO ContactInformation (title, mail, phone
						) VALUES ('{$title}', '{$mail}', '{$phone}'
						)";
        $result = mysqli_query($conn, $query);

        echo "<h1>Contact section succesfully uploaded!</h1>";
    }
}

?>

<form name="upload" method="post" enctype="multipart/form-data"  action="">
    <h1>Update contactsection</h1>
    <p>Create new contact section</p>
    <input placeholder="title" name="title" cols="40"><br>
    <input placeholder="mail" name="mail" cols="40"><br>
    <input placeholder="phone" name="phone" cols="40"><br>

    <input name="Submit" type="submit" value="Submit">
</form>
</body>
</html>