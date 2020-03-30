<?php
if($_SESSION['role'] == 3) {
    header("location: ./main.php");
}