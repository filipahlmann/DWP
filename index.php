<?php
include_once 'header.php'
?>

<main>

<?php 
require_once("includes/dbh.inc.php");   

$query = 'SELECT * FROM Company';
if ($r = mysqli_query($conn,$query)) {
while ($row = mysqli_fetch_array($r)) {
echo "<h3>{$row['title']}</h3><p>{$row['description']}</p>";

    if (isset($_SESSION["userid"])) {
    echo "<a href=\"edit/edit-company.php?companyID= {$row['companyID']}\">Edit</a></p>\n
    <a href=\"delete/delete-company.php?companyID= {$row['companyID']}\">Delete</a></p>\n
    <a href=\"create/create-company.php?companyID= {$row['companyID']}\">Create</a></p>\n";

    }
    else { 
        mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
        } // End of query IF.
} 
}
$query = 'SELECT * FROM news';
if ($r = mysqli_query($conn,$query)) {
while ($row = mysqli_fetch_array($r)) {
echo 
"<h3>{$row['title']}</h3>
<p>{$row['description']}</p>";
if (isset($_SESSION["userid"])) {
echo "
<a href=\"edit/edit-news.php?newsID= {$row['newsID']}\">Edit</a></p>\n
<a href=\"delete/delete-news.php?newsID= {$row['newsID']}\">delete</a></p>\n
<a href=\"create/create-news.php?newsID= {$row['newsID']}\">delete</a></p>\n";

}
else { 
    mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
} // End of query IF.
}
 
}
include_once 'dailyspecialoffer.php';

?> 





<?php
include_once 'footer.php'
?>
