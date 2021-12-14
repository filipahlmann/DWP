<?php require_once("../includes/dbh.inc.php"); ?>
<html>
<body>
<?php
$errors=false;
if(isset($_POST['Submit']))
{
    $title=$_POST['title'];
    $textfieldOne=$_POST['textfieldOne'];
    $textfieldTwo=$_POST['textfieldTwo'];
    $textfieldThree=$_POST['textfieldThree'];

    
    if (!empty($_POST['title']) && !empty($_POST['textfieldOne']) && !empty($_POST['textfieldTwo']) && !empty($_POST['textfieldThree'])) {
    $title = trim(strip_tags($_POST['title']));
    $textfieldOne = trim(strip_tags($_POST['textfieldOne']));
    $textfieldTwo = trim(strip_tags($_POST['textfieldTwo']));
    $textfieldThree = trim(strip_tags($_POST['textfieldThree']));

    } else {
    print '<p style="color: red;">Please submit both a title and an entry.</p>'; 
    $errors = TRUE;
    }

    if(!$errors)
    {
        $query = "INSERT INTO OpeningHours (title, textfieldOne, textfieldTwo, textfieldThree
						) VALUES ('{$title}', '{$textfieldOne}', '{$textfieldTwo}', '{$textfieldThree}'
						)";
        $result = mysqli_query($conn, $query);

        echo "<h1>Opening hours section succesfully uploaded!</h1>";
    }
}

?>

<form name="upload" method="post" enctype="multipart/form-data"  action="">
    <h1>Opening Hours </h1>
    <p>Create new Opening Hours section</p>
    <input placeholder="title" name="title" cols="40"><br>
    <input placeholder="textfieldOne" name="textfieldOne" cols="40"><br>
    <input placeholder="textfieldTwo" name="textfieldTwo" cols="40"><br>
    <input placeholder="textfieldThree" name="textfieldThree" cols="40"><br>
    <input name="Submit" type="submit" value="Submit">
</form>
</body>
</html>