<!DOCTYPE html>
<html>
    <head>
        <title>My Books</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <!-- Include header -->
    <?php include "./header.php" ?>
        <table>
    <tr>
            <th>Author</th>
            <th>Title</th>
            <th>Actions</th>
            
        </tr>

        <?php if ($reservedBooks->num_rows > 0) {
            // Fetch data from result
            while($row = $reservedBooks->fetch_assoc()) { ?>

        <tr>
            <td><?php echo $row['first_name'] . ' ' . $row['last_name']?></td>
            <td><?php echo $row['title']?></td>
            <td> <?php if($row['available']==0){?> <input type="submit" class="returnButton" name=<?php echo $row['Book_idBooks']; ?> value="Return" />  <?php }?> </td>

        </tr>

        <?php } }?>
</table>

<script>
        
        $(document).ready(function () {
            $('.returnButton').click(function() {
                $.ajax({
                    type: "POST",
                    url: "db_connection.php",
                    data: { returnedBookId: this.name }
                }).done(function( msg ) {
                    alert( "Book returned!" );
                    location.reload();
                });
            });
         });

    </script>

<footer>Copyright: Alexandra Rebecca Ses</footer>
    </body>
</html>