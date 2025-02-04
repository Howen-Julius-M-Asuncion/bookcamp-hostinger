<?php
    session_start();
    include_once('../../config/config.php');
    include_once('../../config/dbcon.php');

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
    $_SESSION['currentPage'] = "Users";
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - <?php echo SITE_NAME?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo FAVICON;?>">
    <link href="./css/style.css" rel="stylesheet">
    <?php include_once('../../modules/styling.php');?>
    <style>
    </style>
</head>
<body>
    <?php
        // Redirect to self after successful queries
        // Clear GET requests from RPG pattern

        // Add PHP
        if (isset($_GET['add_success']) && $_GET['add_success'] == 'true') {
            $_SESSION['add_success'] = true;
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }

        if (isset($_SESSION['add_success']) && $_SESSION['add_success'] === true) {
            echo "<script> alert('Data Inserted Successfully'); </script>";
            unset($_SESSION['add_success']);
        }

        // Edit PHP
        if (isset($_GET['edit_success']) && $_GET['edit_success'] == 'true') {
            $_SESSION['edit_success'] = true;
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }

        if (isset($_SESSION['edit_success']) && $_SESSION['edit_success'] === true) {
            echo "<script> alert('Data Edited Successfully'); </script>";
            unset($_SESSION['edit_success']);
        }

        // Delete PHP
        if (isset($_GET['delete_success']) && $_GET['delete_success'] == 'true') {
            $_SESSION['delete_success'] = true;
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }

        if (isset($_SESSION['delete_success']) && $_SESSION['delete_success'] === true) {
            echo "<script> alert('Data Deleted Successfully'); </script>";
            unset($_SESSION['delete_success']);
        }
        
        
    ?>
    <div class="container-fluid">
        <?php include_once('../../components/admin-sidebar.php');?>
            <div class="bg-light rounded p-3 shadow-sm m-4">
            <div class="row px-3">
                    <div class="col d-flex justify-content-between my-2">
                        <h4>User List</h4>
                        <div class="actions sticky-sm-top fs-6">
                            <form method="get" action="" id="actionsForm">
                                <button type="button" class="btn btn-outline-success btn-sm" id="addEntryBtn"><i class="fa-solid fa-plus"></i>&nbsp;New Entry</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm" id="editEntryBtn"><i class="fa-solid fa-pen"></i>&nbsp;Edit</button>
                                <button type="button" class="btn btn-outline-danger btn-sm" id="deleteEntryBtn"><i class="fa-solid fa-trash-can"></i>&nbsp;Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row px-3">
                    <table id="display-table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Full Name</th>
                                <!-- <th>Password</th> -->
                                <th>Type</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <!-- <th>Pending</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT users.*, accountTypes.type AS account_type 
                                FROM users 
                                JOIN accountTypes ON users.accountType_id = accountTypes.id
                                WHERE users.status != 'Archived'";

                                
                                $result = $conn->query($query);
                                    while($list=$result->fetch_assoc()){
                            ?>
                            <tr>
                                <td></td>
                                <td class="overflow-auto"><?=$list['id']?></td>
                                <td class="overflow-auto">
                                <?php
                                    if (!isset($list['username'])){
                                        echo 'No Username';
                                    }else{
                                        echo $list['username'];
                                    }
                                ?>
                                </td>
                                <td class="overflow-auto"><?=$list['email']?></td>
                                <td class="overflow-auto"><?=$list['first_name'].' '.$list['last_name']?></td>
                                <td 
                                <?php 
                                    // Styalized Span
                                    // if ($list['account_type'] == 'Admin'){
                                    //     echo 'class="d-flex justify-content-center bg-danger text-light rounded-pill p-1 px-2 w-100"';
                                    // }else if ($list['account_type'] == 'Staff'){
                                    //     echo 'class="d-flex justify-content-center bg-primary text-light rounded-pill p-1 px-2 w-100"';
                                    // }else if ($list['account_type'] == 'Professor'){
                                    //     echo 'class="d-flex justify-content-center bg-secondary text-light rounded-pill p-1 px-2 w-100"';
                                    // }else if ($list['account_type'] == 'Student'){
                                    //     echo 'class="d-flex justify-content-center bg-success text-light rounded-pill p-1 px-2 w-100"';
                                    // }
                                    
                                    // TD BACKGROUND ONLY 

                                    if ($list['account_type'] == 'Admin'){
                                        echo 'class="text-center bg-danger text-light"';
                                    }else if ($list['account_type'] == 'Staff'){
                                        echo 'class="text-center bg-primary text-light"';
                                    }else if ($list['account_type'] == 'Professor'){
                                        echo 'class="text-center bg-secondary text-light"';
                                    }else if ($list['account_type'] == 'Student'){
                                        echo 'class="text-center bg-success text-light"';
                                    }
                                ?>
                                >
                                    <?=$list['account_type']?>
                                </span></td>
                                <!-- <td class="hidden"><?//=$list['password']?></td> -->
                                <td class="overflow-auto"><?=$list['created_at']?></td>
                                <td>                                <?php
                                    if (!isset($list['updated_at'])){
                                        echo $list['created_at'];
                                    }else{
                                        echo $list['updated_at'];
                                    }
                                ?>
                                <!-- <td class="overflow-auto"></td> -->
                            </tr>
                            <?php
								}
						    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modals for action class -->
        <!-- Add Entry Modal -->
        <form method="post" action="./queries/user_add.php" id="addEntryForm">
            <div class="modal fade" id="addEntryModal" tabindex="-1" aria-labelledby="addEntryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="addEntryModalLabel">Add User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="row mb-3 location">
                                <!-- <div class="col">
                                    <label for="enter_user" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="enter_user" name="enter_user" value="">
                                </div> -->
                                <div class="col">
                                    <label for="enter_email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="enter_email" name="enter_email" value="">
                                </div>
                            </div>
                            <div class="row mb-3 name">
                                <div class="col">
                                    <label for="enter_first" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="enter_first" name="enter_first" value="">
                                </div>
                                <div class="col">
                                    <label for="enter_last" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="enter_last" name="enter_last" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="enter_type" class="form-label">Account Type</label>
                                    <select name="enter_type" class="form-select" id="enter_type">
                                        <option selected></option>
                                        <option value="1">Admin</option>
                                        <option value="2">Staff</option>
                                        <option value="1">Professor</option>
                                        <option value="2">Student</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-ban"></i>&nbsp;Cancel</button>
                            <!-- <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-circle-check"></i>&nbsp;Apply and Add New</button> -->
                            <button type="submit" class="btn btn-success btn-sm" data-bs-dismiss="modal" name="addEntry"><i class="fa-regular fa-circle-check"></i>&nbsp;Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Edit Entry Modal -->
        <form method="post" action="./queries/user_edit.php" id="editEntryForm">
            <div class="modal fade" id="editEntryModal" tabindex="-1" aria-labelledby="editEntryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editEntryModalLabel">Edit User</h5>
                            <!-- Hidden input -->
                            <input type="hidden" class="ms-5" id="edit_id" name="edit_id" value="">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="row mb-3">
                                <!-- <div class="col">
                                    <label for="edit_user" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="edit_user" name="edit_user" value="">
                                </div> -->
                                <div class="col">
                                    <label for="edit_email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="edit_email" name="edit_email" value="">
                                </div>
                            </div>
                            <div class="row mb-3 name">
                                <div class="col">
                                    <label for="edit_first" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="edit_first" name="edit_first" value="">
                                </div>
                                <div class="col">
                                    <label for="edit_last" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="edit_last" name="edit_last" value="">
                                </div>
                            </div>
                            <!-- <div class="row mb-3">
                                <div class="col">
                                    <label for="edit_pass" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="edit_pass" name="edit_pass" value="">
                                </div>
                            </div> -->
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="edit_type" class="form-label">Account Type</label>
                                    <select name="edit_type" class="form-select" id="edit_type">
                                        <option selected></option>
                                        <option value="1">Admin</option>
                                        <option value="2">Staff</option>
                                        <option value="1">Professor</option>
                                        <option value="2">Student</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-ban"></i>&nbsp;Cancel</button>
                            <button type="submit" class="btn btn-success btn-sm" id="confirmEditBtn" data-bs-dismiss="modal" name="editEntry" disabled><i class="fa-regular fa-circle-check"></i>&nbsp;Confirm</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Delete Entry Modal -->
        <form method="post" action="./queries/user_delete.php" id="deleteEntryForm">
            <div class="modal fade" id="deleteEntryModal" tabindex="-1" aria-labelledby="deleteEntryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteEntryModalLabel">Delete User?</h5>
                            <!-- Hidden input -->
                            <input type="hidden" class="ms-5" id="delete_id" name="delete_id" value="">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="edit_email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="delete_email" name="edit_email" value="" readonly>
                                </div>
                            </div>
                            <div class="row mb-3 name">
                                <div class="col">
                                    <label for="edit_first" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="delete_first" name="delete_first" value="" readonly>
                                </div>
                                <div class="col">
                                    <label for="edit_last" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="delete_last" name="delete_last" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-ban"></i>&nbsp;Cancel</button>
                            <button type="submit" class="btn btn-success btn-sm" data-bs-dismiss="modal" name="deleteEntry"><i class="fa-regular fa-circle-check"></i>&nbsp;Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<!-- Footer -->
<?php include_once('../../modules/scripts.php');?>
<script src="./js/script.js"></script>
<script src="./js/user_script.js"></script>
<script>
    function resetModal() {
        $('#enter_email').val('');
        // $('#enter_user').val('');  
        $('#enter_first').val('');
        $('#enter_last').val('');    
        $('#enter_type').val('');     

        $('#enter_type').val('').trigger('change');
    }

    $(document).ready(function() {
        // Reset modal when it's closed
        $('#addEntryModal').on('hidden.bs.modal', function () {
            resetModal();
        });

        // Reset modal fields when modal is opened
        $('#addEntryModal').on('show.bs.modal', function () {
            resetModal(); 
        });

        // Function to check if a valid selection is made in the edit_type dropdown
        function checkEditTypeSelection() {
            var selectedValue = $('#edit_type').val();
            var confirmBtn = $('#confirmEditBtn');
            
            // If no valid selection is made, disable the confirm button
            if (!selectedValue) {
                confirmBtn.prop('disabled', true);
            } else {
                confirmBtn.prop('disabled', false);
            }
        }

        // Call the function initially to disable/enable confirm button based on current selection
        checkEditTypeSelection();

        // Check selection whenever the user changes the account type
        $('#edit_type').on('change', function() {
            checkEditTypeSelection();
        });

    });



</script>
</html>
