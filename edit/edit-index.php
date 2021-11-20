<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php
include_once '../includes/dbh.inc.php';

if (isset($_GET['id']) && is_numeric($_GET['id']) ) { 
$query = "SELECT title, description FROM Webshop WHERE webshopID={$_GET['id']}";
if ($r = mysqli_query($conn, $query)) {

$row = mysqli_fetch_array($r); print 
'<form action="edit-index.php" method="post">
<p>Entry Title: <input type=
"text" name="title" size="40" maxsize="100" value="' .
htmlentities($row['title']) . '" /></p>
<p>Entry title: <textarea name= "description" cols="40" rows="5">' . htmlentities($row['description']) . '</textarea></p>
<input type="hidden" name="webshopID" value="' . $_GET['id'] . '">
<input type="submit" name="submit" value="Update this Entry!">
</form>';

} else { // Couldn't get the information.
    print '<p style="color: red;"> Could not retrieve the blog entry because: <br>' .
    mysqli_error($conn) . '.
    </p><p>The query being run
    was: ' . $query . '</p>'; }

} elseif (isset($_POST['webshopID']) && is_numeric($_POST['webshopID'])) {

$problem = FALSE;
if (!empty($_POST['title']) && !empty($_POST['description'])) {
$title = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['title'])));
$description = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['description'])));
} else {
print '<p style="color: red;"> Please submit both a title and an description.</p>';
$problem = TRUE;
}

if (!$problem) {
    $query = "UPDATE Webshop SET title='$title', description='$description' WHERE webshopID= {$_POST['id']}";
    $r = mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) == 1) {
        print '<p>The frontpage has been updated.</p>';
        } else {
        print '<p style="color: red;"> Could not update the entry
        because:<br>' . mysqli_error ($conn) . '.</p><p>The query
        being run was: ' . $query .
        '</p>';
        }
} // No problem!
} else { // No ID set.
print '<p style="color: red;"> This page has been accessed in error.</p>';
} // End of main IF.

mysqli_close($conn); 
 ?>

</body>
</html>