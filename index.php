

<?php
include_once 'header.php'
?>

<main>
<?php 
include_once 'includes/dbh.inc.php';

$query = 'SELECT * FROM Webshop';
if ($r = mysqli_query($conn,$query)) {
while ($row = mysqli_fetch_array($r)) {
print 
"<h3>{$row['title']}</h3>
<p>{$row['description']}</p>
<a href=\"edit/edit-index.php?id= {$row['webshopID']}\">Edit</a></p>\n";
}

} else { 
mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
} // End of query IF.


$query = 'SELECT * FROM news';
if ($r = mysqli_query($conn,$query)) {
while ($row = mysqli_fetch_array($r)) {
print 
"<h3>{$row['title']}</h3>
<p>{$row['description']}</p>
<a href=\"edit/edit-index.php?id= {$row['newsID']}\">Edit</a></p>\n";
}

} else { 
    mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
    } // End of query IF.
?> 



<?php
include_once 'footer.php'
?>
