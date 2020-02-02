<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    	  <!-- Include header -->
    <?php include "./header.php" ?>

        <p>Välkommen till 'Books for smecheri'!</p>
        <form action="db_connection.php" method="POST">
    		<p>Username</p> <input type="text" name="username">
            <p>Password</p> <input type="password" name="password">
            <button type="submit">Login</button>
        </form> 

        <!-- Include footer -->
<?php include "./footer.php" ?>
    </body>
</html>


 