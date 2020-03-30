<?php
require_once("./Auth_check.php");
require_once("./connection.php");


if(isset($_POST['zapis'])) {
    if($_SESSION['user_id'] != $_POST['userId']) {
        require_once("./Auth_admin.php");
    }
    $userId = $_POST['userId'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $status = $_POST['status'];
    $role = $_POST['role'];
    $class = $_POST['class'];

    if($role == 2 || $role == 1) {
        $class = 1;
    }

    if(empty($password)) {
        $stmtUser = $con->prepare("UPDATE users SET login = ?, firstname = ?, lastName = ?, status = ?, role = ?, class = ? where user_id = ?");
        $stmtUser->bind_param("sssiiii", $login, $firstName, $lastName, $status, $role, $class, $userId);
        if($stmtUser->execute()) {
            header("location: ../users_management.php");
        } else {
            echo "cos sie zepsulo";
        }
    } else {
        $hashPassword = password_hash($password, PASSWORD_ARGON2ID);
        $stmtUser = $con->prepare("UPDATE users SET login = ?, password = ?, firstname = ?, lastName = ?, status = ?, role = ?, class = ? where user_id = ?");
        $stmtUser->bind_param("ssssiiii", $login, $hashPassword, $firstName, $lastName, $status, $role, $class, $userId);
        if($stmtUser->execute()) {
            header("location: ../users_management.php");
        } else {
            echo "cos sie zepsulo";
        }
    }
}