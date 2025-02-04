<?php 
    include_once('../../../config/config.php');
    include_once('../../../config/dbcon.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["editEntry"])) {
        // Capture POST data
        $title = $_POST["edit_title"];
        $ISBN = $_POST["edit_ISBN"];
        $genre = $_POST["edit_genre"];
        $author = $_POST["edit_name"];
        
        $id = $_POST["edit_id"];

        // SQL query for update
        $query = "UPDATE books SET title = '$title', isbn = '$ISBN', genre = '$genre', author_name = '$author', updated_at = CURRENT_TIMESTAMP WHERE id = $id";

        if (mysqli_query($conn, $query)) {
            header('Location: ../book_mngmt.php?edit_success=true');
            exit(); 
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
?>
