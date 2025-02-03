<?php 
    // include_once('../config/config.php');
    // include_once('../modules/styling.php');
?>
<style>
    <?php
        if ($_SESSION['currentPage'] == "Dashboard"){ 
            echo '
            .navigation .li-dash {
                background-color: var(--gray);
            }
            
            .navigation .li-dash a {
                color: var(--blue);
            }
            ';
        }else if ($_SESSION['currentPage'] == "Books"){ 
            echo '
            .navigation .li-first {
                background-color: var(--gray);
            }
            
            .navigation .li-first a {
                color: var(--blue);
            }
            ';
        }else if ($_SESSION['currentPage'] == "Records"){ 
            echo '
            .navigation .li-second {
                background-color: var(--gray);
            }
            
            .navigation .li-second a {
                color: var(--blue);
            }
            ';
        }else if ($_SESSION['currentPage'] == "Users"){ 
            echo '
            .navigation .li-third {
                background-color: var(--gray);
            }
            
            .navigation .li-third a {
                color: var(--blue);
            }
            ';
        }else if ($_SESSION['currentPage'] == "Genre"){ 
            echo '
            .navigation .li-fourth {
                background-color: var(--gray);
            }
            
            .navigation .li-fourth a {
                color: var(--blue);
            }
            ';
        }
        else if ($_SESSION['currentPage'] == "Authors"){ 
            echo '
            .navigation .li-fifth {
                background-color: var(--gray);
            }
            
            .navigation .li-fifth a {
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
        <li class="li-dash">
            <a href="<?php echo BASE_URL?>/pages/admin/dashboard.php">
                <span class="icon">
                    <i class="fa-solid fa-chart-line"></i>
                </span>
                <span class="title">Admin Dashboard</span>
            </a>
        </li>
        <hr>
        <li class="li-first">
            <a href="<?php echo BASE_URL?>/pages/admin/book_mngmt.php">
                <span class="icon">
                    <i class="fa-solid fa-book-open"></i>
                </span>
                <span class="title">Book Management</span>
            </a>
        </li>
        <!-- <li class="li-fifth">
            <a href="<?php // echo BASE_URL?>/pages/admin/author_mngmt.php">
                <span class="icon">
                    <i class="fa-solid fa-pen-nib"></i>
                </span>
                <span class="title">Author Management</span>
            </a>
        </li> -->
        <!-- <li class="li-second">
            <a href="<?php // echo BASE_URL?>/pages/admin/borrow.php">
                <span class="icon">
                    <i class="fa-regular fa-clipboard"></i>
                </span>
                <span class="title">Borrow Records</span>
            </a>
        </li> -->
        <li class="li-third">
            <a href="<?php echo BASE_URL?>/pages/admin/user_mngmt.php">
                <span class="icon">
                    <i class="fa-solid fa-users-gear"></i>
                </span>
                <span class="title">User Management</span>
            </a>
        </li>
        <!-- <li class="li-fourth">
            <a href="<?php // echo BASE_URL?>/pages/admin/genre_mngmt.php">
                <span class="icon">
                    <i class="fa-solid fa-masks-theater"></i>
                </span>
                <span class="title">Genre Management</span>
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

    <!-- Top Bar -->
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