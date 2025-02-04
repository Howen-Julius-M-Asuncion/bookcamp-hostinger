<?php
    include_once('../config/dbcon.php');
    include_once('../config/config.php');

    session_start();

    $username = $_POST['username']; 
    $password = $_POST['password'];

    $sqlLogin = "SELECT * FROM users WHERE (username='{$username}' OR email='{$username}')"; 
    $result = $conn->query($sqlLogin);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check if the password is plain-text or hashed
        if (password_verify($password, $user['password'])) {
            // If the password is hashed, proceed normally
            $_SESSION['authenticated'] = "TRUE";
            $_SESSION['userID'] = $user['id'];
        } else {
            // If the password is plain-text, manually check it
            if ($user['password'] === $password) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Update the database with the hashed password
                $sqlUpdatePassword = "UPDATE users SET password = ? WHERE id = ?";
                $stmt = $conn->prepare($sqlUpdatePassword);
                $stmt->bind_param("si", $hashedPassword, $user['id']);
                $stmt->execute();

                $_SESSION['authenticated'] = "TRUE";
                $_SESSION['userID'] = $user['id'];
            } else {
                $_SESSION["error_message"] = "Invalid Password!";
                header('Location: '. BASE_URL .'/pages/login.php');
                exit();
            }
        }

        // If the user is an admin
        if ($user['accountType_id'] == 1) {
            $_SESSION['admin'] = "TRUE";
            header('Location: '. BASE_URL . '/pages/admin/dash.php');
            exit();
        }else{
            // Else redirect to home page
            header('Location: '. BASE_URL . '/pages/home.php');
            exit();
        }

        
    } else {
        $_SESSION["error_message"] = "Invalid User!";
        header('Location: '. BASE_URL . '/pages/login.php');
        exit();
    }
?>
