<!doctype html> <html lang="en"> <head>
<meta charset="utf-8"> <title>Delete a Blog Entry ➝ </title>
</head>
<body>
<h1>Delete an Entry</h1>

<?php
include_once '../includes/dbh.inc.php';
if (isset($_GET['companyID']) && is_numeric ($_GET['companyID']) ) { $query = "SELECT title,
description FROM Company WHERE companyID={$_GET['companyID']}";
if ($r = mysqli_query($conn, $query)) {

$row = mysqli_fetch_array($r); 
print '<form action="delete-company.php" method="post"> 
<p>Are you sure you want to delete this entry?</p> <p><h3>' . $row['title'] .
'</h3>' . $row['description'] . '<br>
<input type="hidden" name="companyID" value="' . $_GET['companyID'] . '"> 
<input type="submit" name="submit" value="Delete this News-section!"></p>
</form>';
} else { // Couldn't get the information.
    print '<p style="color: red;"> Could not retrieve the blog
    entry because:<br>' . mysqli_error($conn) . '.</p> <p>The
    query being run was: ' . $query . '</p>';
    }

} elseif (isset($_POST['companyID']) && is_numeric($_POST['companyID'])) {
    $query = "DELETE FROM Company WHERE companyID={$_POST['companyID']} LIMIT 1";
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