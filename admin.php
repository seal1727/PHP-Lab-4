<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    	  <!-- Include header -->
    <?php include "./header.php" ?>
        

        <p>Here is the admin page!</p>
        <form action="browsefile.php" method="POST">
    		<p>Username</p> <input type="text" name="username">
            <p>Pasasword</p> <input type="text" name="password">
            <button type="button">Login</button>
        </form> 

        <!-- Include footer -->
<?php include "./footer.php" ?>
    </body>
</html>


 