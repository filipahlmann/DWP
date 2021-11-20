<footer>
    <div id="footer_container">
        <div class="footer_box">
        <?php 
            include_once 'includes/dbh.inc.php';

            $query = 'SELECT * FROM OpeningHours';
            if ($r = mysqli_query($conn,$query)) {
            while ($row = mysqli_fetch_array($r)) {
            print 
            "<h3>{$row['title']}</h3>
            <p>{$row['textfieldOne']}</p>
            <p>{$row['textfieldTwo']}</p>
            <p>{$row['textfieldThree']}</p>

            <a href=\"edit/edit-opening.php?id= {$row['openingHoursID']}\">Edit</a></p>\n";
            }

            } else { 
                mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
                }
            ?> 
        </div>
        <div class="footer_box">

        <?php 
            include_once 'includes/dbh.inc.php';

            $query = 'SELECT * FROM ContactInformation';
            if ($r = mysqli_query($conn,$query)) {
            while ($row = mysqli_fetch_array($r)) {
            print 
            "<h3>{$row['title']}</h3>
            <p>{$row['phone']}</p>
            <p>{$row['mail']}</p>

            <a href=\"edit/edit-contact.php?id= {$row['contactID']}\">Edit</a></p>\n";
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

