<?php
require_once("./scripts/Auth_check.php");
require_once("./scripts/Auth_admin_teacher.php");
require_once("./head.php");
require_once("./nav.php");
require_once("./scripts/connection.php");

$sqlLangs = $con->prepare("select * from languages");
$sqlClasses = $con->prepare("select * from classes where class_id > 1 order by 1 asc");

$sqlLangs->execute();
$langs = $sqlLangs->get_result();

$sqlClasses->execute();
$classes = $sqlClasses->get_result();

$setId = -1;
$set = array();
if (isset($_GET['id'])) {
    $setId = $_GET['id'];
    echo $setId;
    $sqlSet = "select * from `sets` where `set_id` = ?";
    $stmtSet = $con->prepare($sqlSet);
    $stmtSet->bind_param("i", $setId);
    $stmtSet->execute();
    $resultSet = $stmtSet->get_result();
    $set = $resultSet->fetch_assoc();

    $sqlFlashcards = "select word, definition from flashcards where `set` = ?";
    $stmtFlashcard = $con->prepare($sqlFlashcards);
    $stmtFlashcard->bind_param("i", $setId);
    $stmtFlashcard->execute();
    $flashcards = $stmtFlashcard->get_result();
}
?>
    <main class="sets">
        <form method="post" action="<?php echo $setId != -1 ? 'scripts/modifySet.php' : 'scripts/addSet.php'; ?>">
            <input type="hidden" name="setId" value="<?php echo $setId; ?>">
            <section>
                <h1>Stwórz nowy zestaw</h1>
                <section id="set_modify">
                    <div class="input set_title">
                        <div>
                            <input type="text" name="setTitle" placeholder=" " autocomplete="off"
                                   value="<?php echo $setId != -1 ? $set['setName'] : ''; ?>" required>
                            <span>Nazwa zestawu</span>
                        </div>
                    </div>
                    <div class="multi-select">
                        <button type="button" class="list_trigger" onclick="wrap(this);">Wybierz język</button>
                        <div class="list">
                            <?php
                            while ($row = $langs->fetch_assoc()) {
                                $langid = $row['language_id'];
                                $langName = $row['languageName'];
                                if ($langid == $set['language']) {
                                    echo <<< LANG
                        <div class="checkbox">
                            <input type="radio" id="l$langid" name="lang" value="$langid" checked required>
                            <label for="l$langid">$langName</label>
                            <span class="bgc"></span>
                        </div>  
LANG;
                                } else {
                                    echo <<< LANG
                        <div class="checkbox">
                            <input type="radio" id="l$langid" name="lang" value="$langid" required>
                            <label for="l$langid">$langName</label>
                            <span class="bgc"></span>
                        </div>  
LANG;
                                }

                            }
                            ?>
                        </div>
                    </div>
                    <div class="multi-select">
                        <button type="button" class="list_trigger" onclick="wrap(this);">Wybierz klasy</button>
                        <div class="list">
                            <?php
                            while ($row = $classes->fetch_assoc()) {
                                $classId = $row['class_id'];
                                $className = $row['className'];
                                if ($classId == $set['id']) {
                                    echo <<< KLASY
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_$classId" name="class[]" value="$classId" checked>
                            <label for="checkbox_$classId">$className</label>
                            <span class="bgc"></span>
                        </div>
KLASY;
                                } else {
                                    echo <<< KLASY
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_$classId" name="class[]" value="$classId" >
                            <label for="checkbox_$classId">$className</label>
                            <span class="bgc"></span>
                        </div>
KLASY;
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <button type="submit" class="save" name="set_confirm">Zapisz</button>
                </section>
                <section id="flashcards_mod">
                    <div>
                        <?php if ($setId == -1) {
                            echo <<< NORMAL
                            <div class="one_flashcard">
                                <div class="input">
                                    <div>
                                        <input type="text" name="word[]" placeholder=" " autocomplete="off" required>
                                        <span>Słówko</span>
                                    </div>
                                </div>
                                <div class="input">
                                    <div>
                                        <input type="text" name="definition[]" placeholder=" " autocomplete="off"
                                               required>
                                        <span>Definicja</span>
                                    </div>
                                </div>
                                <div class="delete">
                                    <button type="button">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
NORMAL;
                        } else {
                            while($row = $flashcards->fetch_assoc()) {
                                $word = $row['word'];
                                $definition = $row['definition'];
                                echo <<< NORMAL
                            <div class="one_flashcard">
                                <div class="input">
                                    <div>
                                        <input type="text" name="word[]" placeholder=" " autocomplete="off" value="$word" required>
                                        <span>Słówko</span>
                                    </div>
                                </div>
                                <div class="input">
                                    <div>
                                        <input type="text" name="definition[]" placeholder=" " autocomplete="off" value="$definition" required>
                                        <span>Definicja</span>
                                    </div>
                                </div>
                                <div class="delete">
                                    <button type="button">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
NORMAL;
                            }
                        }
                        ?>
                    </div>
                    <div class="add_buttons">
                        <button type="button" class="add_flashcard">Dodaj fiszkę</button>
                        <div>
                            <input type="number" id="flashcardNumber">
                            <button type="button" class="add_flashcard">dodaj fiszki</button>
                        </div>
                    </div>
                </section>
            </section>
        </form>
    </main>
<?php
require_once("./footer.php");
?>