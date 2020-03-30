<?php
require_once("./scripts/Auth_check.php");
require_once("./head.php");
require_once("./nav.php");
require_once("./scripts/connection.php");

if(isset($_GET['id'])) {
    $setId = $_GET['id'];

    $sqlFlashcards = "SELECT * from flashcards where `Set` = ?";
    $stmtFlashcards = $con->prepare($sqlFlashcards);
    $stmtFlashcards->bind_param("i", $setId);
    $stmtFlashcards->execute();
    $flashcards = $stmtFlashcards->get_result();

}
?>
<main>
    <section id="learn">
        <h1>Nauka fiszek</h1>
        <section class="nauka">
            <div class="slider">
                <button onclick="prevSlide()">
                    <i class="fas fa-arrow-left"></i>
                    <i class="fas fa-arrow-up"></i>
                </button>
                <div class="slides">
                    <?php
                    while($row = $flashcards->fetch_assoc()) {
                        $word = $row['word'];
                        $definition = $row['definition'];

                        echo <<< FLASHCARDS
                    <div class="slide">
                        <div class="flip-card" onclick="clicked(this)">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <span>$word</span>
                                </div>
                                <div class="flip-card-back">
                                    <span>$definition</span>
                                </div>
                            </div>
                        </div>
                    </div>
FLASHCARDS;
                    }
                    ?>
                </div>
                <button onclick="nextSlide();">
                    <i class="fas fa-arrow-right"></i>
                    <i class="fas fa-arrow-down"></i>
                </button>
            </div>

        </section>
    </section>
</main>
    <script src="js/slider.js"></script>
<?php
require_once("./footer.php");
?>