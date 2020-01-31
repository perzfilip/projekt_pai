<?php
    require_once("./head.php");
    require_once("./nav.php");
?>
<main class="sets">
    <form action="">
        <section>
            <h1>Stwórz nowy zestaw</h1>
            <section id="set_modify">
                <div class="input set_title">
                    <div>
                        <input type="text" name="setTitle" placeholder=" " autocomplete="off" required>
                        <span>Nazwa zestawu</span>
                    </div>
                </div>
                <div class="multi-select">
                    <button type="button" class="list_trigger" onclick="wrap(this);">Wybierz język</button>
                    <div class="list">
                        <div class="checkbox">
                            <input type="radio" id="l1" name="lang">
                            <label for="l1">angielski</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="radio" id="l2" name="lang">
                            <label for="l2">niemiecki</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="radio" id="l3" name="lang">
                            <label for="l3">rosyjski</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="radio" id="l4" name="lang">
                            <label for="l4">hiszpański</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="radio" id="l5" name="lang">
                            <label for="l5">włoski</label>
                            <span class="bgc"></span>
                        </div>
                    </div>
                </div>
                <div class="multi-select">
                    <button type="button" class="list_trigger" onclick="wrap(this);">Wybierz klasy</button>
                    <div class="list">
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_1" name="class[]" checked>
                            <label for="checkbox_1">1D</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_2" name="class[]">
                            <label for="checkbox_2">2D</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_3" name="class[]">
                            <label for="checkbox_3">3D</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_4" name="class[]">
                            <label for="checkbox_4">4D</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_5" name="class[]">
                            <label for="checkbox_5">1D</label>
                            <span class="bgc"></span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="save">Zapisz</button>
            </section>
            <section id="flashcards_mod">
                <div>
                    <div class="one_flashcard">
                        <div class="input">
                            <div>
                                <input type="text" name="slowko[]" placeholder=" " autocomplete="off" required>
                                <span>Słówko</span>
                            </div>
                        </div>
                        <div class="input">
                            <div>
                                <input type="text" name="definicja[]" placeholder=" " autocomplete="off" required>
                                <span>Definicja</span>
                            </div>
                        </div>
                        <div class="delete">
                            <button type="button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="one_flashcard">
                        <div class="input">
                            <div>
                                <input type="text" name="slowko[]" placeholder=" " autocomplete="off" required>
                                <span>Słówko</span>
                            </div>
                        </div>
                        <div class="input">
                            <div>
                                <input type="text" name="definicja[]" placeholder=" " autocomplete="off" required>
                                <span>Definicja</span>
                            </div>
                        </div>
                        <div class="delete">
                            <button type="button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="one_flashcard">
                        <div class="input">
                            <div>
                                <input type="text" name="slowko[]" placeholder=" " autocomplete="off" required>
                                <span>Słówko</span>
                            </div>
                        </div>
                        <div class="input">
                            <div>
                                <input type="text" name="definicja[]" placeholder=" " autocomplete="off" required>
                                <span>Definicja</span>
                            </div>
                        </div>
                        <div class="delete">
                            <button type="button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="one_flashcard">
                        <div class="input">
                            <div>
                                <input type="text" name="slowko[]" placeholder=" " autocomplete="off" required>
                                <span>Słówko</span>
                            </div>
                        </div>
                        <div class="input">
                            <div>
                                <input type="text" name="definicja[]" placeholder=" " autocomplete="off" required>
                                <span>Definicja</span>
                            </div>
                        </div>
                        <div class="delete">
                            <button type="button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="one_flashcard">
                        <div class="input">
                            <div>
                                <input type="text" name="slowko[]" placeholder=" " autocomplete="off" required>
                                <span>Słówko</span>
                            </div>
                        </div>
                        <div class="input">
                            <div>
                                <input type="text" name="definicja[]" placeholder=" " autocomplete="off" required>
                                <span>Definicja</span>
                            </div>
                        </div>
                        <div class="delete">
                            <button type="button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="one_flashcard">
                        <div class="input">
                            <div>
                                <input type="text" name="slowko[]" placeholder=" " autocomplete="off" required>
                                <span>Słówko</span>
                            </div>
                        </div>
                        <div class="input">
                            <div>
                                <input type="text" name="definicja[]" placeholder=" " autocomplete="off" required>
                                <span>Definicja</span>
                            </div>
                        </div>
                        <div class="delete">
                            <button type="button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
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