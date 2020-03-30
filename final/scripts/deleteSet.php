<?php
require_once("./Auth_check.php");
require_once("./Auth_admin_teacher.php");
require_once("./connection.php");

if (isset($_GET['id'])) {

    $sqlSetCreator = "select createdBy from sets where set_id = ?";
    $stmtSetCreator = $con->prepare($sqlSetCreator);
    $stmtSetCreator->bind_param("i", $_GET['id']);
    $stmtSetCreator->execute();
    $resultSetCreator = $stmtSetCreator->get_result();
    $createdBy = $resultSetCreator->fetch_row();
    if ($_SESSION['role'] != 3 && $createdBy != $_SESSION['user_id']) {
        header("location: ../main.php");
    } else {
        $sqlDelSet = "delete from sets where set_id = ?";
        $stmtDelSet = $con->prepare($sqlDelSet);
        $stmtDelSet->bind_param("i", $_GET['id']);
        if ($stmtDelSet->execute()) {
            header("location: ../main.php");
        } else {
            echo "coś nie poszlo";
        }
    }
}
