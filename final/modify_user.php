<?php
require_once("./Auth_check.php");
require_once("./head.php");
require_once("./nav.php");
?>
<main class="mod_users">
    <h1>Wpisz dane</h1>
    <section>
        <form action="">
            <div class="input">
                <div>
                    <input type="text" name="login" placeholder=" " autocomplete="off">
                    <span>Login</span>
                </div>
            </div>
            <div class="input">
                <div>
                    <input type="password" name="password" placeholder=" " autocomplete="off">
                    <span>Nowe hasło</span>
                </div>
            </div>
            <div class="input">
                <div>
                    <input type="text" name="firstName" placeholder=" " autocomplete="off">
                    <span>Imię</span>
                </div>
            </div>
            <div class="input">
                <div>
                    <input type="text" name="lastName" placeholder=" " autocomplete="off">
                    <span>Nazwisko</span>
                </div>
            </div>
            <div class="input">
                <div>
                    <input type="text" name="status" placeholder=" " autocomplete="off">
                    <span>Status</span>
                </div>
            </div>
            <div class="special">
                <div class="multi-select">
                    <button type="button" class="list_trigger" onclick="wrap(this);">Rola</button>
                    <div class="list">
                        <div class="checkbox">
                            <input type="checkbox" id="R1" name="filterRole">
                            <label for="R1">uczeń</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="R2" name="filterRole">
                            <label for="R2">nauczyciel</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="R3" name="filterRole">
                            <label for="R3">admin</label>
                            <span class="bgc"></span>
                        </div>
                    </div>
                </div>
                <div class="multi-select">
                    <button type="button" class="list_trigger" onclick="wrap(this);">Wybierz klasy</button>
                    <div class="list">
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_1" name="class">
                            <label for="checkbox_1">1D</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_2" name="class">
                            <label for="checkbox_2">2D</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_3" name="class">
                            <label for="checkbox_3">3D</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_4" name="class">
                            <label for="checkbox_4">4D</label>
                            <span class="bgc"></span>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_5" name="class">
                            <label for="checkbox_5">1D</label>
                            <span class="bgc"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="save">Zapisz</button>
                <button type="button" class="modify"><a href="users_management.php">Cofnij</a></button>
            </div>
        </form>
    </section>
</main>
<?php
require_once("./footer.php");
?>