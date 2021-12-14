<?php require_once("../includes/dbh.inc.php"); ?>
<html>
<body>
<?php
$errors=false;
if(isset($_POST['Submit']))
{
    $title=$_POST['title'];
    $description=$_POST['description'];
    
    if (!empty($_POST['title']) && !empty($_POST['description'])) {
    $title = trim(strip_tags($_POST['title'])); $description = trim(strip_tags($_POST['description']));
    } else {
    print '<p style="color: red;">Please submit both a title and an entry.</p>'; 
    $errors = TRUE;
    }

    if(!$errors)
    {
        $query = "INSERT INTO news (title, description
						) VALUES ('{$title}', '{$description}'
						)";
        $result = mysqli_query($conn, $query);

        echo "<h1>news name and description succesfully uploaded!</h1>";
    }
}

?>

<form name="upload" method="post" enctype="multipart/form-data"  action="">
    <h1>News name </h1>
    <p>Create new news section</p>
    <input placeholder="title" name="title" cols="40"><br>
    <input placeholder="description" name="description" cols="40"><br>
    <input name="Submit" type="submit" value="Submit">
</form>
</body>
</html>