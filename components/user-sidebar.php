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
        }else if ($_SESSION['currentPage'] == "NOT USED"){ 
            echo '
            .navigation .li-dash {
                background-color: var(--gray);
            }
            
            .navigation .li-dash a {
                color: var(--blue);
            }
            ';
        }else if ($_SESSION['currentPage'] == "Browse"){ 
            echo '
            .navigation .li-first {
                background-color: var(--gray);
            }
            
            .navigation .li-first a {
                color: var(--blue);
            }
            ';
        }else if ($_SESSION['currentPage'] == "Reserve"){ 
            echo '
            .navigation .li-second {
                background-color: var(--gray);
            }
            
            .navigation .li-second a {
                color: var(--blue);
            }
            ';
        }else if ($_SESSION['currentPage'] == "NOT USED"){ 
            echo '
            .navigation .li-third {
                background-color: var(--gray);
            }
            
            .navigation .li-third a {
                color: var(--blue);
            }
            ';
        }else if ($_SESSION['currentPage'] == "NOT USED"){ 
            echo '
            .navigation .li-fourth {
                background-color: var(--gray);
            }
            
            .navigation .li-fourth a {
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
        <!-- <li class="li-home">
            <a href="<?php // echo BASE_URL?>/pages/profile.php">
                <span class="icon">
                    <i class="fa-solid fa-house-user"></i>
                </span>
                <span class="title">Profile</span>
            </a>
        </li>
        <hr> -->
        <li class="li-first">
            <a href="<?php echo BASE_URL?>/pages/search.php">
                <span class="icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <span class="title">Browse Books</span>
            </a>
        </li>
        <!-- <li class="li-second">
            <a href="<?php // echo BASE_URL?>/pages/profile.php">
                <span class="icon">
                    <i class="fa-regular fa-address-card"></i>
                </span>
                <span class="title">Reserve Books</span>
            </a>
        </li> -->
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