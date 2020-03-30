<?php
require_once("./Auth_check.php");
require("./Auth_admin.php");
require_once("./connection.php");

if(isset($_POST['zapis'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $status = $_POST['status'];
    $role = $_POST['role'];
    $class = $_POST['class'];

    //jezeli nauczyciel to dostaje dostep do wszystkich klas
    if($role == 2 || $role == 1) {
        $class = 1;
    }

    $hashPassword = password_hash($password, PASSWORD_ARGON2ID);

    $stmtUser = $con->prepare("INSERT INTO `users`(`login`, `password`, `firstName`, `lastName`, `status`, `role`, `class`) values (?, ?, ?, ?, ?, ?, ?)");
    $stmtUser->bind_param('ssssiii', $login, $hashPassword, $firstName, $lastName, $status, $role, $class);
    if($stmtUser->execute()) {
    header("location: ../users_management.php");
    $con->close();

    } else {
        echo $stmtUser->errno, "<br>";
        echo $stmtUser->error, "<br>";
    }

}
