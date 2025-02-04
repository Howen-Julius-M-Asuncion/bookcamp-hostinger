<?php
    include_once('../../../config/config.php');
    include_once('../../../config/dbcon.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["addEntry"])) {
        $title = $_POST["enter_title"];
        $ISBN = $_POST["enter_ISBN"];
        $genre = $_POST["enter_genre"];
        $author = $_POST["enter_name"];

        $query = "INSERT INTO books (title, ISBN, genre, author_name, created_at, updated_at) VALUES ('$title', '$ISBN', '$genre', '$author', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

        if (mysqli_query($conn, $query)) {
            header('Location: ../book_mngmt.php?add_success=true');
            exit(); 
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
?>