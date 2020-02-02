<?php include "./config.php" ?>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</head>
<header>
    <div class="menu">
      <ul>
      	 <li><a class="<?php echo ($current_page[2] == 'index.php') ? 'active' : NULL ?>"  href="index.php">Home</a></li>
         <li><a class="<?php echo ($current_page[2] == 'about.php') ? 'active' : NULL ?>" href="about.php">About Us</a></li>
         <li><a class="<?php echo ($current_page[2] == 'browse.php') ? 'active' : NULL ?>" href="browse.php">Browse Books</a></li>
         <li><a class="<?php echo ($current_page[2] == 'mybooks.php') ? 'active' : NULL ?>" href="mybooks.php">My Books</a></li>
         <li><a class="<?php echo ($current_page[2] == 'contact.php') ? 'active' : NULL ?>" href="contact.php">Contact</a></li>
         <li><a class="<?php echo ($current_page[2] == 'admin.php' && isset($_COOKIE["user"])) ? 'active' : 'admin' ?>" href="admin.php">Admin</a></li>
      </ul>
      
    </div>
    <div class="header-pic"></div>
  </header>