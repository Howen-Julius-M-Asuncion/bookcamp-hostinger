<?php 
    include_once('../../../config/config.php');
    include_once('../../../config/dbcon.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["editEntry"])) {
        $email = $_POST["edit_email"];
        $first_name = $_POST["edit_first"];
        $last_name = $_POST["edit_last"];
        $account_type = (int)$_POST["edit_type"];

        $id = $_POST["edit_id"];
        
        $query = "UPDATE users SET email = '$email', first_name = '$first_name', last_name = '$last_name', accountType_id = '$account_type', updated_at = CURRENT_TIMESTAMP WHERE id = $id";

        if (mysqli_query($conn, $query)) {
            header('Location: ../user_mngmt.php?edit_success=true');
            exit(); 
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
?>