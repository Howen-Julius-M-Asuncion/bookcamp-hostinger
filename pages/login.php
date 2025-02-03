<?php
    session_start();
    include_once('../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - <?php echo SITE_NAME?></title>
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
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col title mt-5">
                    <img src="../public/images/hcc_logo.png" class="logo-landing">
                    <h1><strong>Holy Cross College<br><?php echo SITE_NAME?></strong></h1>
                </div>
            </div>
            <!-- Login form -->
            <div class="row d-flex justify-content-center align-items-center mt-4">
                <div class="col-lg-4 col-md-5 col-sm-6 px-5">
                    <center><h3>Log In Your Account</h3></center>
                    <form method="post" action="../includes/auth.php" id="login-form">
                        <div class="input-field mt-3">
                            <div class="input-container">
                                <i class="in fa-solid fa-at"></i>
                                <input type="text" class="form-control" id="account-username" required="true" name="username" placeholder="ID or Username">
                            </div>
                        </div>
                        <div class="input-field mt-3">
                            <div class="input-container">
                                <i class="in fa-solid fa-key"></i>
                                <input type="password" class="form-control" id="account-password" required="true" name="password" placeholder="Password">
                                <span class="input-group-text" onclick="password_show_hide();">
                                    <i class="fas fa-eye" id="show_eye"></i>
                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>
                        </div>
                        <!-- Login Error Message -->
                        <center><p class='error-field bg-danger bg-gradient bg-opacity-75 text-light text-center rounded-1 mt-2'>
                            <?php
                                if(isset($_SESSION['error_message'])){
                                    echo $_SESSION['error_message'];
                                }
                            ?>
                        </p></center>
                        <div class="input-field">
                            <button type="submit" class="btn btn-secondary w-100 rounded-4">Log In &nbsp;<i class="fa-solid fa-right-to-bracket"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col extra mt-5">Continue without account? <a href="#" onclick="guestAccount()">Click Here!</a></div>
            </div>
        </div>
    </div>
</body>
<script>
    function password_show_hide() {
        var x = document.getElementById("account-password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    // function guestAccount() {
    //     var form = document.createElement('form');
    //     form.method = 'post';
    //     form.action = './index.php';

    //     var input = document.createElement('input');
    //     input.type = 'hidden';
    //     input.name = 'guestAccount';
    //     input.value = 'TRUE';

    //     form.appendChild(input);
    //     document.body.appendChild(form);

    //     form.submit();
    // }
</script>
</html>
<?php
    session_destroy();
?>