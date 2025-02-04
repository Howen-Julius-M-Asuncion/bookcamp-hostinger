<?php
    session_start();
    include_once('../config/config.php');
    include_once('../config/dbcon.php');

    if($debugModeAuth == true) {
        $_SESSION['userID'] = $debugModeUser;
        $_SESSION['authenticated'] = "TRUE";
        if($debugModeAdmin == true) {
            $_SESSION['admin'] = "TRUE";
        }
    }else{
        if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated'] == "TRUE"){
            $_SESSION["error_message"] = "Please Login First!";
            header('Location: '. BASE_URL .'/pages/login.php');
            exit();
        }
    }


    $_SESSION['currentPage'] = "Home";
    $userID = $_SESSION['userID'];

    // SQL to fetch user information to display in pages
    $sqlUser = "SELECT * FROM users WHERE id = {$userID}"; 
    $result = $conn->query($sqlUser);
    $userLoggedIn = $result->fetch_assoc();

    if (isset($userLoggedIn['first_name'])){
        $_SESSION['userName'] = "{$userLoggedIn['first_name']} {$userLoggedIn['last_name']}";
    }else{
        $_SESSION['userName'] = "User Does Not Exist";
    }    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - <?php echo SITE_NAME?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo FAVICON;?>">
    <link href="./css/style.css" rel="stylesheet">
    <?php include_once('../modules/styling.php');?>
    <style>
        .logo-landing {
            width: 15rem;
        }

        .title, .extra {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container-fluid">
        <?php 
            if (isset($_SESSION['admin']) == "TRUE" && isset($_SESSION['authenticated']) == "TRUE"){
                include_once('../components/admin-sidebar.php');
            }else if (!isset($_SESSION['admin']) && isset($_SESSION['authenticated']) == "TRUE"){
                include_once('../components/user-sidebar.php');
            }
        ?>
            <div class="row controls mx-4 mt-4">
                <div class="col bg-light rounded-3 p-3 shadow-sm">
                    <div class="row d-flex justify-content-end">
                        
                    </div>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>