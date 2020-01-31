<?php
    if(!empty($_POST["login"])&&!empty($_POST["password"])) {

        require("./connection.php");

        $login = $_POST["login"];

        $sql = mysqli_prepare($con, "SELECT password FROM users where login = $login");

        $result = mysqli_query($con, $sql);

    }

?>
