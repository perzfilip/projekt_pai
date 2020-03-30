<?php
require_once("./scripts/Auth_check.php");
    require_once("./head.php");
    require_once("./nav.php");
    require_once("./scripts/connection.php");
    if($_SESSION['role'] == 3) {
        $sql = "select s.set_id, s.setName, l.languageName, us.firstName, us.lastName from sets s left join languages l on s.language = l.language_id 
left join users us on s.createdBy = us.user_id left join sets_to_classes stc on s.set_id = stc.set where stc.class = ?";
        $stmtSets = $con->prepare($sql);
        $stmtSets->bind_param("i", $_SESSION['class']);
        $stmtSets->execute();
    } else if($_SESSION['role'] == 2) {
        $sql = "select s.set_id, s.setName, l.languageName, us.firstName, us.lastName from sets s left join languages l on s.language = l.language_id 
left join users us on s.createdBy = us.user_id where s.createdBy = ?";
        $stmtSets = $con->prepare($sql);
        $stmtSets->bind_param("i", $_SESSION['user_id']);
        $stmtSets->execute();
        $sets = $stmtSets->get_result();
    } else {
        $sql = "select s.set_id, s.setName, l.languageName, us.firstName, us.lastName from sets s left join languages l on s.language = l.language_id 
left join users us on s.createdBy = us.user_id";
        $stmtSets = $con->prepare($sql);
        $stmtSets->execute();
        $sets = $stmtSets->get_result();
    }
?>
<main>
    <section>
        <h1>Dostępne zestawy fiszek</h1>
        <section id="fiszki">

            <?php
                while($row = $sets->fetch_row()) {
                    $setId = $row[0];
                    $setName = $row[1];
                    $lang = $row[2];
                    $firstName = $row[3];
                    $lastName = $row[4];

                    echo <<< ZESTAWY
<article>
                <a href="learn.php?id=$setId">
                    <div>
                        <h3>$setName</h3>
                        <span class="line"></span>
                        <p>Stworzone przez: $firstName $lastName</p>
                    </div>
                </a>
            </article>
ZESTAWY;

            }
            ?>
        </section>
    </section>
    <!--    DLA ADMINÓW I NAUCZYCIELI-->
    <?php
    if($_SESSION['role'] != 3) {
        ?>
    <section>
        <h1>Zarządzanie fiszkami</h1>
        <section id="flashcards_men">
            <?php
            $stmtSets->execute();
            $sets = $stmtSets->get_result();
            while($row = $sets->fetch_row()) {
                $setId = $row[0];
                $setName = $row[1];
                echo <<< SETEDIT
             <div>
                <span>$setName</span>
                <div class="icons">
                    <a href="create_sets.php?id=$setId"><i class="fas fa-edit"></i></a>
                    <a href="scripts/deleteSet.php?id=$setId" onclick="return confirm('czy na pewno chcesz usunąć ten zestaw?')"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
SETEDIT;
            }
        }
        ?>
</main>
<?php
    require_once("./footer.php");
?>
