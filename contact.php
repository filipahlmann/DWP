<?php
include_once 'header.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h2>Send Mail To Owner.</h2>
        <form class="contact-form" action="contactform.php" method="post">
            <input type="text" name="name" placeholder="Full Name">
            <input type="text" name="mail" placeholder="Your Email">
            <input type="text" name="subject" placeholder="Subjects">
            <textarea name="message" placeholder="Message"></textarea>

            <button type="submit" name="submit">Send Mail</button>
        </form>
    </main>
</body>
</html>
<?php
include_once 'footer.php'
?>