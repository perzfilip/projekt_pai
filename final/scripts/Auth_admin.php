<?php
if($_SESSION['role'] != 1) {
    header("location: ./main.php");
}
?>