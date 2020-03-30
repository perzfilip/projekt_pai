<?php
    if(!empty($_POST["login"])&&!empty($_POST["password"])) {

        require("./connection.php");

        $login = $_POST["login"];
        $password = $_POST["password"];
        $dbpassword = "";
        $sql = $con->prepare("SELECT * FROM users where login = ?");
        $sql->bind_param("s", $login);
        $sql->execute();


        $result = $sql->get_result();

        if($result->num_rows === 1) {
            while($row = $result->fetch_assoc()) {
                $dbpassword = $row["password"];
                $id = $row["user_id"];
                $role = $row['role'];
                $status = $row['status'];
                $class = $row['class'];
                $login = $row['login'];
            }
        } else {
            header("location: ./start_page.php?err=1");
        }

        if(password_verify($password, $dbpassword)) {
            session_start();
            $_SESSION["user_id"] = $id;
            $_SESSION['role'] = $role;
            $_SESSION['status'] = $status;
            $_SESSION['class'] = $class;
            $_SESSION['login'] = $login;

            header("location: ../main.php");
        } else {
            header("location: ../start_page.php?err=1");
        }


    }

?>
