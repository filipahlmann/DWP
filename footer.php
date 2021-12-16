<?php require_once("includes/dbh.inc.php"); ?>

<footer>
    <div id="footer_container">
        <div class="footer_box">
        <?php 

            $query = 'SELECT * FROM OpeningHours';
            if ($r = mysqli_query($conn,$query)) {
            while ($row = mysqli_fetch_array($r)) {
            print 
            "<h3>{$row['title']}</h3>
            <p>{$row['textfieldOne']}</p>
            <p>{$row['textfieldTwo']}</p>
            <p>{$row['textfieldThree']}</p>";

            if (isset($_SESSION["userid"])) {

            echo "<a href=\"edit/edit-opening.php?openingHoursID= {$row['openingHoursID']}\">Edit</a></p>\n
            <a href=\"delete/delete-opening.php?openingHoursID= {$row['openingHoursID']}\">delete</a></p>\n
            <a href=\"create/create-opening.php?openingHoursID= {$row['openingHoursID']}\">create</a></p>\n";
            }

            }

            } else { 
                mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
                }
            ?> 
        </div>
        <div class="footer_box">

        <?php 

            $query = 'SELECT * FROM ContactInformation';
            if ($r = mysqli_query($conn,$query)) {
            while ($row = mysqli_fetch_array($r)) {
            print 
            "<h3>{$row['title']}</h3>
            <p>{$row['phone']}</p>
            <p>{$row['mail']}</p>
            ";
            if (isset($_SESSION["userid"])) {

            echo "<a href=\"edit/edit-contact.php?contactID= {$row['contactID']}\">Edit</a></p>\n
            <a href=\"delete/delete-contact.php?contactID= {$row['contactID']}\">delete</a></p>\n
            <a href=\"create/create-contact.php?contactID= {$row['contactID']}\">create</a></p>\n";
            }

            }

            } else { 
                mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
                }
                mysqli_close($conn);
            ?> 
          
        </div>
    </div>
</footer>
</body>
</html>

