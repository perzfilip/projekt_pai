<?php
    $password = "admin";

    $hashPassword = password_hash($password, PASSWORD_ARGON2ID);

    echo "hasło: ", $password, "<br>";
    echo "zahashowane hasło: ", $hashPassword, "<br>";