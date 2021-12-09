<?php
include_once 'header.php'
?>

<section class="signup-form">
<h3>LOG IN</h3>
    <p>login in here</p>
    <form class="login-form" action="includes/login.inc.php" method="post">
    <input type="text" name="uid" placeholder="Username">
    <input type="text" name="pwd" placeholder="Password">
    <br>
    <button type="submit" name="submit">LOGIN</button>
    </form>
<?php   
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields</p>";
    }
    else if ($_GET["error"] == "wronglogin") {
        echo "<p>incorrect login information</p>";
    }
}

?>
</section>




<?php
include_once 'footer.php'
?>