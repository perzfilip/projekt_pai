<?php
require_once("./Auth_check.php");
require_once("./Auth_admin.php");
require_once("./connection.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $delUser = $con->prepare('delete from users where user_id = ?');
    $delUser->bind_param("i", $id);
    if($delUser->execute()) {
        header("location: ../users_management.php");
    } else {
        echo "cos poszlo nie tak";
    }
}

