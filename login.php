<?php
include_once 'header.php'
?>

<section class="signup-form">
<h2>Log In</h2>
<form class="login-form" action="includes/login.inc.php" method="post">
    <input type="text" name="uid" placeholder="Username/Email...">
    <input type="password" name="pwd" placeholder="Password...">
    <button type="submit" name="submit" id="sendBtn">Log In</button>
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