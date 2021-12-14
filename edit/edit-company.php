<?php
include_once '../includes/dbh.inc.php';

if (isset($_GET['companyID']) && is_numeric($_GET['companyID']) ) { 
$query = "SELECT title, description FROM Company WHERE companyID={$_GET['companyID']}";
if ($r = mysqli_query($conn, $query)) {

$row = mysqli_fetch_array($r); print 
'<form action="edit-company.php" method="post">
<p>Entry Title: <input type=
"text" name="title" size="40" maxsize="100" value="' .
htmlentities($row['title']) . '" /></p>
<p>Entry title: <textarea name= "description" cols="40" rows="5">' . htmlentities($row['description']) . '</textarea></p>
<input type="hidden" name="companyID" value="' . $_GET['companyID'] . '">
<input type="submit" name="submit" value="Update this Entry!">
</form>';

} else { // Couldn't get the information.
    print '<p style="color: red;"> Could not retrieve the blog entry because: <br>' .
    mysqli_error($conn) . '.
    </p><p>The query being run
    was: ' . $query . '</p>'; }

} elseif (isset($_POST['companyID']) && is_numeric($_POST['companyID'])) {

$problem = FALSE;
if (!empty($_POST['title']) && !empty($_POST['description'])) {
$title = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['title'])));
$description = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['description'])));
} else {
print '<p style="color: red;"> Please submit both a title and an description.</p>';
$problem = TRUE;
}

if (!$problem) {
    $query = "UPDATE Company SET title='$title', description='$description' WHERE companyID= {$_POST['companyID']}";
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
} // No problem!
} else { // No ID set.
print '<p style="color: red;"> This page has been accessed in error.</p>';
} // End of main IF.

mysqli_close($conn); 
 ?>

</body>
</html>