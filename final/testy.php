<?php
require_once("./scripts/connection.php");
$setId = 1;
$sqlSet = "select * from `sets` where `set_id` = ?";
$stmtSet = $con->prepare($sqlSet);
$stmtSet->bind_param("i", $setId);
$resultSet = $stmtSet->get_result();
while($row = $resultSet->fetch_assoc()) {
    echo $row['setName'];
}

