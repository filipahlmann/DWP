<?php // Opening hours
include_once '../includes/dbh.inc.php';

if (isset($_GET['ID']) && is_numeric($_GET['ID']) ) { 
$query = "SELECT name, code, image, price FROM products WHERE ID={$_GET['ID']}";
if ($r = mysqli_query($conn, $query)) {

$row = mysqli_fetch_array($r); 
echo "<b>Image:</b> $row[image] <br /> <img src=\"img/$row[image]\" width=\"100\" > <br/>";
print 

'<form action="edit-products.php" method="post">
<p> name: <input type="text" name="name" size="40" maxsize="100" value="' .htmlentities($row['name']) . '" /></p>
<p> code: <input type="text" name="code" size="40" maxsize="100" value="' .htmlentities($row['code']) . '" /></p>
<p> price: <input type="text" name="price" size="40" maxsize="100" value="' .htmlentities($row['price']) . '" /></p>
<input type="hidden" name="ID" value="' . $_GET['ID'] . '">
<input type="submit" name="submit" value="Update OpeningHours!">
</form>';

} else { 
    print '<p style="color: red;"> Could not retrieve the blog entry because: <br>' .
    mysqli_error($conn) . '.
    </p><p>The query being run
    was: ' . $query . '</p>'; }

} elseif (isset($_POST['ID']) && is_numeric($_POST['ID'])) {

$problem = FALSE;
if (!empty($_POST['name']) && !empty($_POST['code']) && !empty($_POST['price']) ) {
$name = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['name'])));
$code = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['code'])));
$price = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['price'])));

} else {
print '<p style="color: red;"> Please submit both a name, code and a price.</p>';
$problem = TRUE;
}

if (!$problem) {
    $query = "UPDATE products SET name='$name', code='$code', price='$price' WHERE ID= {$_POST['ID']}";
    $r = mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) == 1) {
        print '<p>The frontpage has been updated.</p>';
        print '<a href="../index.php">Back to homepage</a>';

        } else {
        print '<p style="color: red;"> Could not update the entry
        because:<br>' . mysqli_error ($conn) . '.</p><p>The query
        being run was: ' . $query .
        '</p>';
        }
} 
} else { 
print '<p style="color: red;"> This page has been accessed in error.</p>';
} 

?>
</body>
</html>