<?php 
    // include_once('../config/config.php');
    // include_once('../modules/styling.php');
?>
<style>
    <?php
        if ($_SESSION['currentPage'] == "Home"){ 
            echo '
            .navigation .li-home {
                background-color: var(--gray);
            }
            
            .navigation .li-home a {
                color: var(--blue);
            }
            ';
        }else if ($_SESSION['currentPage'] == "Dashboard"){ 
            echo '
            .navigation .li-dash {
                background-color: var(--gray);
            }
            
            .navigation .li-dash a {
                color: var(--blue);
            }
            ';
        }else if ($_SESSION['currentPage'] == "Users"){ 
            echo '
            .navigation .li-users {
                background-color: var(--gray);
            }
            
            .navigation .li-users a {
                color: var(--blue);
            }
            ';
        }else if ($_SESSION['currentPage'] == "Sections"){ 
            echo '
            .navigation .li-sections {
                background-color: var(--gray);
            }
            
            .navigation .li-sections a {
                color: var(--blue);
            }
            ';
        }else if ($_SESSION['currentPage'] == "Courses"){ 
            echo '
            .navigation .li-courses {
                background-color: var(--gray);
            }
            
            .navigation .li-courses a {
                color: var(--blue);
            }
            ';
        }else if ($_SESSION['currentPage'] == "Departments"){ 
            echo '
            .navigation .li-departments {
                background-color: var(--gray);
            }
            
            .navigation .li-departments a {
                color: var(--blue);
            }
            ';
        }
    ?>
</style>
<link rel="stylesheet" href="<?php echo BASE_URL?>/components/css/sidebar.css">
<!-- Sidebar -->
<div class="navigation">
    <ul>
        <li>
        <a href="#">
                <span class="icon"><img src="<?php echo FAVICON;?>"></span>
                <span class="title">
                <?php 
                    if (isset($_SESSION['authenticated']) == "TRUE" && (isset($_SESSION['userID']))){
                        echo "{$_SESSION['userName']}";
                    }else{
                        echo "Auth not setup properly";
                    }
                ?>
                </span>
            </a>
        </li>
        <hr>
        <li class="li-home">
            <a href="<?php echo BASE_URL?>/pages/home.php">
                <span class="icon">
                    <i class="fa-solid fa-house-user"></i>
                </span>
                <span class="title">Profile</span>
            </a>
        </li>
        <hr>
        <li class="li-dash">
            <a href="<?php echo BASE_URL?>/pages/search.php">
                <span class="icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <span class="title">Browse Books</span>
            </a>
        </li>
        <li class="li-dash">
            <a href="<?php echo BASE_URL?>/pages/profile.php">
                <span class="icon">
                    <i class="fa-regular fa-address-card"></i>
                </span>
                <span class="title">Reserve Books</span>
            </a>
        </li>
        <hr>
        <li>
            <a href="<?php echo BASE_URL?>/includes/logout.php">
                <span class="icon">
                    <i class="fa-solid fa-person-walking-arrow-right"></i>
                </span>
                <span class="title">Log Out</span>
            </a>
        </li>
    </ul>
</div>
<!-- Main Section -->
<div class="main">

    <!-- Sidebar -->
    <div class="topbar">
        <div class="toggle">
            <i class="icon-bars fa-solid fa-bars"></i>
        </div>
    </div>

    <!-- Sidebar Script -->
    <script>
        // add hovered class to selected list item
        let list = document.querySelectorAll(".navigation li");

        function activeLink() {
        list.forEach((item) => {
            item.classList.remove("hovered");
        });
        this.classList.add("hovered");
        }

        list.forEach((item) => item.addEventListener("mouseover", activeLink));

        // Menu Toggle
        let toggle = document.querySelector(".toggle");
        let navigation = document.querySelector(".navigation");
        let main = document.querySelector(".main");

        toggle.onclick = function () {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
        };
    </script>