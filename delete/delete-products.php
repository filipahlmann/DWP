<!doctype html> <html lang="en"> <head>
<meta charset="utf-8"> <title>Delete a Blog Entry ➝ </title>
</head>
<body>
<h1>Delete an Entry</h1>

<?php
include_once '../includes/dbh.inc.php';
if (isset($_GET['ID']) && is_numeric ($_GET['ID']) ) { $query = "SELECT name,
code, image, price FROM products WHERE ID={$_GET['ID']}";
if ($r = mysqli_query($conn, $query)) {

$row = mysqli_fetch_array($r); 
print '<form action="delete-products.php" method="post"> 
<p>Are you sure you want to delete this entry?</p> <p><h3>' . $row['name'] .
'</h3>' . $row['code'] . '<br>'. $row['image'] . '<br>' . $row['price'] . '<br>
<input type="hidden" name="ID" value="' . $_GET['ID'] . '"> 
<input type="submit" name="submit" value="Delete this News-section!"></p>
</form>';
} else { // Couldn't get the information.
    print '<p style="color: red;"> Could not retrieve the blog
    entry because:<br>' . mysqli_error($conn) . '.</p> <p>The
    query being run was: ' . $query . '</p>';
    }

} elseif (isset($_POST['ID']) && is_numeric($_POST['ID'])) {
    $query = "DELETE FROM products WHERE ID={$_POST['ID']} LIMIT 1";
$r = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) == 1) {
    print '<p>The blog entry has been deleted.</p>'; } else {
    print '<p style="color: red;">Could not delete the blog
    entry because:<br>' . mysqli_error($conn) . '.</p> <p>The
    query being run was: ' .
    $query . '</p>'; }

} else { // No ID received. 
    print '<p style="color: red;"> This page has been accessed in error.</p>';
} // End of main IF.

mysqli_close($conn); ?>
</body>
</html>