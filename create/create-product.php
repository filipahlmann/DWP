<?php require_once("../includes/dbh.inc.php"); ?>
<html>
<body>
<?php
define ("MAX_SIZE","300");

function getExt($str){
    //hu.llo.oo!&-+.jpg
    $file_name = explode(".",$str);
    $ext = $file_name[count($file_name)-1];
    return $ext;
}

$errors=false;
if(isset($_POST['Submit']))
{
    $image=$_FILES['image']['name'];
    $name=$_POST['name'];
    $code=$_POST['code'];
    $price=$_POST['price'];
    if ($image)
    {
        $filename = stripslashes($_FILES['image']['name']);
        $extension = getExt($filename);
        $extension = strtolower($extension);
        if(!in_array($extension, array("jpg","jpeg","png","gif")))
        {
            echo '<h1>Unknown filetype!</h1>';
            $errors=true;
        }
        else
        {
            $size=filesize($_FILES['image']['tmp_name']);

            if ($size > MAX_SIZE*1024)
            {
                echo '<h1>Image is to big: Max 300 Kb!</h1>';
                $errors=true;
            }else{

            $newname = "img/".$image;
            $copied = copy($_FILES['image']['tmp_name'], $newname);
            if (!$copied)
            {
                echo '<h1>Copy unsuccessfull!</h1>';
                $errors=true;
            }
            }
        }
    }
    if(!$errors)
    {
        $query = "INSERT INTO products (name, code, image, price
						) VALUES ('{$name}', '{$code}', '{$image}', '{$price}'
						)";
        $result = mysqli_query($conn, $query);

        echo "<h1>Image succesfully uploaded!</h1>";
    }else{
        $image = "";
    }
}

?>

<form name="upload" method="post" enctype="multipart/form-data"  action="">
    <h1>Image upload</h1>
    <h2>Here you can upload an image!</h2>
    <b>Image:</b> <input type="file" name="image" value=""><br />
    <input placeholder="name" name="name" cols="40">
    <input placeholder="code" name="code" cols="40">
    <input placeholder="price" name="price" cols="40">
    <input name="Submit" type="submit" value="Submit">
</form>
</body>
</html>