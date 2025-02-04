<?php 
    include_once('../../../config/config.php');
    include_once('../../../config/dbcon.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["deleteEntry"])) {
        $id = $_POST["delete_id"];

        // Just archive
        // $query = "UPDATE users SET status = 'Archived' WHERE id = $id";

        // Delte completely
        $query = "DELETE FROM books WHERE id = '$id'";

        if (mysqli_query($conn, $query)) {
            header('Location: ../book_mngmt.php?delete_success=true');
            exit(); 
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
?>