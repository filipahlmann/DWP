<?php // Opening hours
include_once '../includes/dbh.inc.php';

if (isset($_GET['openingHoursID']) && is_numeric($_GET['openingHoursID']) ) { 
$query = "SELECT title, textfieldOne, textfieldTwo, textfieldThree FROM OpeningHours WHERE openingHoursID={$_GET['openingHoursID']}";
if ($r = mysqli_query($conn, $query)) {

$row = mysqli_fetch_array($r); print 
'<form action="edit-opening.php" method="post"> <p> Title: <input type="text" name="title" size="40" maxsize="100" value="' .htmlentities($row['title']) . '" /></p>
<p>Textarea1: <textarea name= "textfieldOne" cols="40" rows="5">' . htmlentities($row['textfieldOne']) . '</textarea></p>
<p>Textarea2: <textarea name= "textfieldTwo" cols="40" rows="5">' . htmlentities($row['textfieldTwo']) . '</textarea></p>
<p>Textarea3: <textarea name= "textfieldThree" cols="40" rows="5">' . htmlentities($row['textfieldThree']) . '</textarea></p>
<input type="hidden" name="openingHoursID" value="' . $_GET['openingHoursID'] . '">
<input type="submit" name="submit" value="Update OpeningHours!">
</form>';

} else { 
    print '<p style="color: red;"> Could not retrieve the blog entry because: <br>' .
    mysqli_error($conn) . '.
    </p><p>The query being run
    was: ' . $query . '</p>'; }

} elseif (isset($_POST['openingHoursID']) && is_numeric($_POST['openingHoursID'])) {

$problem = FALSE;
if (!empty($_POST['title']) && !empty($_POST['textfieldOne']) && !empty($_POST['textfieldTwo']) && !empty($_POST['textfieldThree']) ) {
$title = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['title'])));
$textfieldOne = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['textfieldOne'])));
$textfieldTwo = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['textfieldTwo'])));
$textfieldThree = mysqli_real_escape_string($conn, trim(strip_tags ($_POST ['textfieldThree'])));

} else {
print '<p style="color: red;"> Please submit both a title and an description.</p>';
$problem = TRUE;
}

if (!$problem) {
    $query = "UPDATE OpeningHours SET title='$title', textfieldOne='$textfieldOne', textfieldTwo='$textfieldTwo', textfieldThree='$textfieldThree'  WHERE openingHoursID= {$_POST['openingHoursID']}";
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