<?php
require_once("./Auth_check.php");
require_once("./Auth_admin_teacher.php");
require_once("./connection.php");

if(isset($_POST['set_confirm'])) {

    $setName = $_POST['setTitle'];
    $langId = $_POST['lang'];
    $classes = $_POST['class'];
    $words = $_POST['word'];
    $definitions = $_POST['definition'];
    $createdBy = $_SESSION['user_id'];

    $flashcards = array_combine($words, $definitions);

    //inserting set
    $sqlSet = $con->prepare("INSERT INTO `sets` (`setName`, `language`, `createdBy`) VALUES (?, ?, ?)");
    $sqlSet->bind_param('sii', $setName, $langId, $createdBy);

    $setId = -1;
    if($sqlSet->execute()) {
        $setId = $sqlSet->insert_id;
    }

    //adding set to classes
        $n = sizeof($classes);
        $sqlSetsToClasses = "INSERT INTO `sets_to_classes`(`class`, `set`) VALUES ";
        for($i = 0; $i < $n; $i++) {
            $sqlSetsToClasses .= "(" . $classes[$i] . ",$setId)";
            if($i<$n-1) $sqlSetsToClasses .= ", ";
        }

    $con->query($sqlSetsToClasses);


    //inserting flashcards
    $sqlInsertFlashcards = "INSERT INTO `flashcards`(`word`, `definition`, `set`) values ";
    foreach($flashcards as $key => $value) {
        $stmt = $con->prepare($sqlInsertFlashcards . "(?, ?, ?)");
        $stmt->bind_param("ssi", $key, $value, $setId);
        $stmt->execute();
    }

    //cleanup
    $con->close();
    header("location: ../main.php");


} else {
    echo "not roger";
}