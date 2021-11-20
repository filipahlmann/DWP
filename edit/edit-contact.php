<?php // CONTACT INFORMATION!
include_once '../includes/dbh.inc.php';

if (isset($_GET['id']) && is_numeric($_GET['id']) ) { 
$query = "SELECT title, phone, mail FROM ContactInformation WHERE contactID={$_GET['id']}";
if ($r = mysqli_query($conn, $query)) {

$row = mysqli_fetch_array($r); print 
'<form action="edit-footer.php" method="post"> 
<p>Title: <input type="text" name="title" size="40" maxsize="100" value="' .htmlentities($row['title']) . '" /></p>
<p>Textarea1: <textarea name= "phone" cols="40" rows="5">' . htmlentities($row['phone']) . '</textarea></p>
<p>Textarea2: <textarea name= "mail" cols="40" rows="5">' . htmlentities($row['mail']) . '</textarea></p>
<input type="hidden" name="id" value="' . $_GET['id'] . '">
<input type="submit" name="submit" value="Update OpeningHours!">
</form>';

} else { 
    print '<p style="color: red;"> Could not retrieve the blog entry because: <br>' .
    mysqli_error($conn) . '.
    </p><p>The query being run
    was: ' . $query . '</p>'; }

} elseif (isset($_POST['contactID']) && is_numeric($_POST['contactID'])) {

$problem = FALSE;
if (!empty($_POST['title']) && !empty($_POST['phone']) && !empty($_POST['mail']) ) {
$title = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['title'])));
$phone = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['phone'])));
$mail = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['mail'])));

} else {
print '<p style="color: red;"> Please submit both a title and an description.</p>';
$problem = TRUE;
}

if (!$problem) {
    $query = "UPDATE ContactInformation SET title='$title', phone='$phone', mail='$mail' WHERE contactID= {$_POST['id']}";
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