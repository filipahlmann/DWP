<?php 
Echo '<h3>10% OFF</h3>';

$dayofweek = date("w");
switch ($dayofweek) {
    case 0:
    $query = "SELECT * FROM `products` WHERE id = 1";
    if ($r = mysqli_query($conn,$query)) {
        while ($row = mysqli_fetch_array($r)) {
        print 
        "<h4>{$row['name']}</h4>
        <p>{$row['price']} DKK</p>
        <p>{$row['image']}</p>";
        
        }
        
            if (isset($_SESSION["userid"])) { 
        		echo "<a href=\"edit/edit-products.php?id= {$product_array[$aNumber]['id']}\">Edit</a></p>\n 
		            <a href=\"delete/delete-products.php?id= {$product_array[$aNumber]['id']}\">Delete</a></p>\n"; 
            }
        } else { 
            mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
            } // End of query IF.
        
    break;
    case 1:
    $query = "SELECT * FROM `products` WHERE id = 1";
    if ($r = mysqli_query($conn,$query)) {
        while ($row = mysqli_fetch_array($r)) {
        print 
        "<h4>{$row['name']}</h4>
        <p>{$row['price']} DKK</p>
        <p>{$row['image']}</p>";

        $discount = $row['price']*0.9;
        echo $discount;
        if (isset($_SESSION["userid"])) { 
            echo "<br><a href=\"edit/edit-products.php?id= {$row['id']}\">Edit</a></p>\n 
            <br><a href=\"delete/delete-products.php?id= {$row['id']}\">Delete</a></p>\n 
            <br><a href=\"create/create-products.php?id= {$row['id']}\">Create</a></p>\n"; 
        }
        }
            
        } else { 
            mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
            } // End of query IF.
        
    break;
    case 2:
        $query = "SELECT * FROM `products` WHERE id = 3";
        if ($r = mysqli_query($conn,$query)) {
            while ($row = mysqli_fetch_array($r)) {
            print 
            "<h4>{$row['name']}</h4>
            <p>{$row['price']} DKK</p>
            <p>{$row['image']}</p>";
            }
                if (isset($_SESSION["userid"])) { 
            
                }
            } else { 
                mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
                } // End of query IF.
            
    break;
    case 3:
        $query = "SELECT * FROM `products` WHERE id = 4";
        if ($r = mysqli_query($conn,$query)) {
            while ($row = mysqli_fetch_array($r)) {
            print 
            "<h4>{$row['name']}</h4>
            <p>{$row['price']} DKK</p>
            <p>{$row['image']}</p>";
            }
                if (isset($_SESSION["userid"])) { 
            
                }
            } else { 
                mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
                } // End of query IF.
            
        break;
    case 4:
        $query = "SELECT * FROM `products` WHERE id = 5";
        if ($r = mysqli_query($conn,$query)) {
            while ($row = mysqli_fetch_array($r)) {
            print 
            "<h4>{$row['name']}</h4>
            <p>{$row['price']} DKK</p>
            <p>{$row['image']}</p>";
            }
                if (isset($_SESSION["userid"])) { 
            
                }
            } else { 
                mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
                } // End of query IF.
            
        break;
    case 5:
        $query = "SELECT * FROM `products` WHERE id = 6";
        if ($r = mysqli_query($conn,$query)) {
            while ($row = mysqli_fetch_array($r)) {
            print 
            "<h4>{$row['name']}</h4>
            <p>{$row['price']} DKK</p>
            <p>{$row['image']}</p>";
            }
                if (isset($_SESSION["userid"])) { 
            
                }
            } else { 
                mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
                } // End of query IF.
            
        break;
    case 6:
        $query = "SELECT * FROM `products` WHERE id = 7";
        if ($r = mysqli_query($conn,$query)) {
            while ($row = mysqli_fetch_array($r)) {
            print 
            "<h4>{$row['name']}</h4>
            <p>{$row['price']} DKK</p>
            <p>{$row['image']}</p>";

            $discount = $row['price']-20;
            }
                if (isset($_SESSION["userid"])) { 
            
                }
            } else { 
                mysqli_error($conn) . '.</p> <p>The query being run was: ' . $query . '</p>';
                } // End of query IF.
            
        break;
    }


?> 
