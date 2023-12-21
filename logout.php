
<?php
session_start();


if (isset($_POST['logout']) ) {

    unset($_SESSION['user_id']);
    session_destroy();

    header("Location: index.php"); 
    exit();
}
?>


