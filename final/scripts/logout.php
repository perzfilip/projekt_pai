<?php
session_start();
session_unset();
session_destroy();
header("location: ../start_page.php?err=2");
