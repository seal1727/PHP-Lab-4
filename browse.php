<!DOCTYPE html>
<html>
    <head>
        <title>Browse the books</title>
        <link rel="stylesheet" href="style.css">
        
    </head>
    <body>
        <!-- Include header -->
    <?php include "./header.php" ?>
    <!-- Declare 'Browse' form -->
    <form action="browsefile.php" method="POST">
    		<p>Author of the book</p> <input type="text" name="author">
            <p>Title of the book</p> <input type="text" name="title">
            <button type="button">Search</button>
    </form> 

    <br><br>
    <table>
        <tr>
            <th>Author</th>
            <th>Title</th>
            <th>Book ID</th>
            <th>Pages</th>
            <th>Edition</th>
            <th>Year of publishing</th>
            <th>Publisher</th>
            <th>Availability</th>
            <th>Reserve Book</th>

        </tr>
    
        <?php if ($books->num_rows > 0) {
            // Fetch data from result
            while($row = $books->fetch_assoc()) { ?>
        
            <tr>
                <td> <?php echo $row['first_name'] . ' ' . $row['last_name']?></td>
                <td> <?php echo $row['title']?></td>
                <td> <?php echo $row['Book_idBooks']?></td>
                <td> <?php echo $row['pages']?></td>
                <td> <?php echo $row['edition']?></td>
                <td> <?php echo $row['published_year']?></td>
                <td> <?php echo $row['publisher']?></td>
            <td> <?php if($row['available']==1){?>Available<?php }else {?>Not available <?php } ?> </td>
            <td> <?php if($row['available']==1){?> <input type="submit" class="button" name=<?php echo $row['Book_idBooks']; ?> value="Reserve it" />  <?php }else {?> <p>On loan</p><?php } ?></td>

            <?php } }?>
            
        </tr>

    </table>

    <script>
        
        $(document).ready(function () {
            $('.button').click(function() {
                $.ajax({
                    type: "POST",
                    url: "db_connection.php",
                    data: { bookId: this.name }
                }).done(function( msg ) {
                    alert( "Book reserved!" );
                    location.reload();
                });
            });
         });

    </script>


<!-- Include footer -->
<?php include "./footer.php" ?>
    </body>
</html>