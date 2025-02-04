<?php
    include_once('../../../config/config.php');
    include_once('../../../config/dbcon.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["addEntry"])) {
        $email = $_POST["enter_email"];
        // $username = $_POST["enter_user"];
        $first_name = $_POST["enter_first"];
        $last_name = $_POST["enter_last"];
        $account_type = (int)$_POST["enter_type"];

        // Hash the password before inserting it into the database
        $password = '123';
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (email, password, first_name, last_name, status, accountType_id, created_at, updated_at) VALUES ('$email', '$hashed_password', '$first_name', '$last_name', 'Inactive', '$account_type', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

        if (mysqli_query($conn, $query)) {
            header('Location: ../user_mngmt.php?add_success=true');
            exit(); 
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
?>