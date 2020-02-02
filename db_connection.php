<?php
// Connect to db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

var_dump(isset($_COOKIE["user"]));

if(isset($_POST['username']) && isset($_POST['password'])) {
    
    $username = $_POST['username'];
    $mypassword = md5($_POST['password']);

    $stmt = $conn->prepare("
                            SELECT 
                                username, password 
                            FROM 
                                `user` 
                            WHERE 
                                username = ?");
    
    $stmt->bind_param('s', $username);


    $stmt->execute();

 
    $stmt->bind_result($dbusername, $dbpassword);

    while($stmt->fetch()){
        if($mypassword == $dbpassword) {
            
            $cookie_name = "user";
            $cookie_value = $username;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

        } else {
            echo "Wrong password or username";
        } 
    }
    
    $stmt->close();
    

    
    // $conn->close();
}

$sql = "SELECT 
            * 
        FROM 
            book_has_library bl 
        JOIN 
            book b 
        ON 
            (bl.Book_idBooks=b.idBook) 
        JOIN 
            author_has_book 
        ON 
            (author_has_book.Book_idBooks=b.idBook) 
        JOIN 
            author 
        ON 
            (author.idAuthor=author_has_book.Author_idAuthor) 
        WHERE 
            (bl.Library_idLibrary=1);";

// Run query using the above sql
$books = $conn->query($sql);

$reservedBooksSQL = "SELECT 
            * 
        FROM 
            book_has_library bl 
        JOIN 
            book b 
        ON 
            (bl.Book_idBooks=b.idBook) 
        JOIN 
            author_has_book 
        ON 
            (author_has_book.Book_idBooks=b.idBook) 
        JOIN 
            author 
        ON 
            (author.idAuthor=author_has_book.Author_idAuthor) 
        WHERE 
            (bl.Library_idLibrary=1 AND bl.available = 0);";

$reservedBooks = $conn->query($reservedBooksSQL);


if(isset($_POST['bookId'])) {
    $sql = "
        UPDATE 
            `book_has_library` 
        SET 
            `available`= 0
        WHERE
            Book_idBooks=" . $_POST['bookId'] . ";";

    $conn->query($sql);
}

if(isset($_POST['returnedBookId'])) {
    $sql = "
        UPDATE 
            `book_has_library` 
        SET 
            `available`= 1
        WHERE
            Book_idBooks=" . $_POST['returnedBookId'] . ";";

    $conn->query($sql);
}

?>