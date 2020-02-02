<!DOCTYPE html>
<html>
    <head>
        <title>00 Book Club</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!-- Include header -->
    <?php include "./header.php" ?>
        <main>
    		<form action="mail.php" method="POST">
    		<p>Your Full Name</p> <input type="text" name="name">
    		<p>Your Email</p> <input type="text" name="email">
    		<p>Write your message here</p> <textarea name="message" rows="10" cols="20"> </textarea> <br/>
    		<input type="submit" value="Send it"><input type="reset" value="clear">
    		</form>
  
		</main>
       <!-- Include footer -->
<?php include "./footer.php" ?>
    </body>
</html>