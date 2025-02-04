<?php
session_start();
include_once('../config/config.php');
include_once('../config/dbcon.php');

// Debug, allow to bypass auth without loggin in.    
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

// To display on sidebars
$_SESSION['currentPage'] = "Browse";
$userID = $_SESSION['userID'];

// SQL to fetch user information
$sqlUser = "SELECT * FROM users WHERE id = {$userID}"; 
$result = $conn->query($sqlUser);
$userLoggedIn = $result->fetch_assoc();

if (isset($userLoggedIn['first_name'])){
    $_SESSION['userName'] = "{$userLoggedIn['first_name']} {$userLoggedIn['last_name']}";
}else{
    $_SESSION['userName'] = "User Does Not Exist";
}    

// Default SQL query to fetch all books
$query = "SELECT * FROM books WHERE 1"; // Always return results by default

// Check if a genre is selected
if (isset($_GET['genre']) && $_GET['genre'] != "") {
    $genreID = $_GET['genre'];
    $query .= " AND genre_id = {$genreID}"; // Filter by selected genre
}

// Check if a search term is provided
if (isset($_GET['search']) && $_GET['search'] != "") {
    $searchTerm = $_GET['search'];
    $query .= " AND (title LIKE '%{$searchTerm}%' OR author_name LIKE '%{$searchTerm}%' OR isbn LIKE '%{$searchTerm}%')"; // Filter by search term
}

// Execute the query to get books
$result = $conn->query($query);

// Check if there are no results
if ($result->num_rows == 0) {
    $noEntriesFound = true; // Flag to show the "No Entries Found" message
} else {
    $noEntriesFound = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search result for <?php echo 'Lorem' ?> - <?php echo SITE_NAME?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo FAVICON;?>">
    <link href="./css/style.css" rel="stylesheet">
    <?php include_once('../modules/styling.php');?>
    <style>
        .card {
            height:100%;
        }
        .gradient-mask {
            position: relative;
            overflow: hidden;
            height: 70px;
        }
        .gradient-mask::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30px;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1));
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <?php include_once('../components/user-sidebar.php');?>

        <div class="row controls mx-4 mt-4">
            <div class="col bg-light rounded-3 p-3 shadow-sm mb-4">
                <div class="row d-flex justify-content-end">
                    <div class="col-8 filter-actions">
                        <label>
                            <select class="form-select form-select-sm" aria-label="Default select example" id="genreSelect">
                                <option selected value="">Any Genres</option>
                                <?php
                                    $result2 = $conn->query("SELECT * FROM genres");
                                    while($list=$result2->fetch_assoc()){
                                ?>
                                <option value="<?= $list['id'] ?>"><?= $list['genre'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </label>
                        <button type="button" class="btn btn-outline-secondary btn-sm" id="filterButton"><i class="fa-solid fa-filter"></i>&nbsp;Filter</button>
                    </div>
                    <div class="col search">
                        <div class="table-search">
                            <label>
                                <input id="searchInput" type="text" placeholder="Search for Books, Authors, Genres." value="">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-light rounded p-3 shadow-sm mx-4">
            <div class="row px-3">
                <div class="col d-flex justify-content-between my-2">
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4 px-3">
                <?php 
                    if ($noEntriesFound) {
                        echo "<p>No Entries Found!</p>"; // Display message if no results are found
                    } else {
                        // Loop through and display books
                        while($list = $result->fetch_assoc()){
                ?>
                <div class="col-4">
                    <div class="card card-books">
                        <img src="<?php echo BASE_URL?>/public/images/bookmockup.avif" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $list['title'] ?></h5>
                            <div class="gradient-mask">
                                <p class="card-text">Author: <?= $list['author_name'] ?><br>ISBN No. : <?= $list['isbn'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include_once('../modules/scripts.php');?>

</body>

<!-- Footer -->
<?php include_once('../modules/scripts.php');?>
<script>
    // When the filter button is clicked
    document.getElementById('filterButton').addEventListener('click', function() {
        const genre = document.getElementById('genreSelect').value;
        const search = document.getElementById('searchInput').value.trim();

        // Construct the URL with query parameters
        let url = "?"; // Replace with the actual page name
        if (genre) {
            url += `genre=${genre}&`;
        }
        if (search) {
            url += `search=${search}&`;
        }

        // Redirect with query parameters to filter results
        window.location.href = url;
    });

    // When the "Enter" key is pressed in the search input, trigger the filter
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Prevent the default form submission (if any)
            const genre = document.getElementById('genreSelect').value;
            const search = document.getElementById('searchInput').value.trim();

            // Construct the URL with query parameters
            let url = "?"; // Replace with actual page name
            if (genre) {
                url += `genre=${genre}&`;
            }
            if (search) {
                url += `search=${search}&`;
            }

            // Redirect with query parameters to filter results
            window.location.href = url;
        }
    });
</script>


</html>