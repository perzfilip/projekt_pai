<?php
    if(!empty($_POST["login"])&&!empty($_POST["password"])) {

        require("./connection.php");

        $login = $_POST["login"];
        $password = $_POST["password"];
        $dbpassword = "";
        $sql = $con->prepare("SELECT password FROM users where login = ?");
        $sql->bind_param("s", $login);
        $sql->execute();

        $result = $sql->get_result();


        if($result->num_rows === 1) {
            while($row = $result->fetch_assoc()) {
                $dbpassword = $row["password"];
            }
        } else {
            echo "blad: wiecej niz jeden użytkownik o tym samym loginie";
        }

        if(password_verify($password, $dbpassword)) {
            echo "wpisano poprawne hasło dla użytkownika";
        } else {
            echo "wpisane bledne haslo dla danego uzytkownika";
        }


    }

?>
