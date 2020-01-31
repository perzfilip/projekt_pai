<?php
    require_once("./head.php");
    require_once("./nav.php");
?>
<main class="users">
    <h1>Zarządzaj użytkownikami</h1>
    <section>
        <form action="" id="user_filter">
            <div class="input">
                <div>
                    <input type="text" name="filterLogin" placeholder=" " autocomplete="off">
                    <span>Login</span>
                </div>
            </div>
            <div class="input">
                <div>
                    <input type="text" name="filterFirstName" placeholder=" " autocomplete="off">
                    <span>Imię</span>
                </div>
            </div>
            <div class="input">
                <div>
                    <input type="text" name="filterLastName" placeholder=" " autocomplete="off">
                    <span>Nazwisko</span>
                </div>
            </div>
            <div class="filter_buttons">
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
                <button type="submit" class="save">Filtruj</button>
            </div>
        </form>
        <table>
            <tr>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Rola</th>
            </tr>
            <tr class="user">
                <td>Filip</td>
                <td>Perz</td>
                <td>Uczeń</td>
            </tr>
            <tr class="user_content">
                <td colspan="3">
                    <div class="data">
                        <p>hasło: 7733ba5bcf5ed778e7cc13607e2f2363</p>
                        <p>status: aktywny</p>
                        <p>klasa: 4D</p>
                    </div>
                    <div class="change_buttons">
                        <button type="button" class="deleteButton">usuń</button>
                        <button type="button" class="modify">modyfikuj</button>
                    </div>
                </td>
            </tr>
            <tr class="user">
                <td>Filip</td>
                <td>Perz</td>
                <td>Uczeń</td>
            </tr>
            <tr class="user_content">
                <td colspan="3">
                    <div class="data">
                        <p>hasło: 7733ba5bcf5ed778e7cc13607e2f2363</p>
                        <p>status: aktywny</p>
                        <p>klasa: 4D</p>
                    </div>
                    <div class="change_buttons">

                        <button type="button" class="deleteButton">usuń</button>
                        <button type="button" class="modify">modyfikuj</button>

                    </div>
                </td>
            </tr>
            <tr class="user">
                <td>Filip</td>
                <td>Perz</td>
                <td>Uczeń</td>
            </tr>
            <tr class="user_content">
                <td colspan="3">
                    <div class="data">
                        <p>hasło: 7733ba5bcf5ed778e7cc13607e2f2363</p>
                        <p>status: aktywny</p>
                        <p>klasa: 4D</p>
                    </div>
                    <div class="change_buttons">
                        <button type="button" class="deleteButton">usuń</button>
                        <button type="button" class="modify">modyfikuj</button>
                    </div>
                </td>
            </tr>
            <tr class="user">
                <td>Filip</td>
                <td>Perz</td>
                <td>Uczeń</td>
            </tr>
            <tr class="user_content">
                <td colspan="3">
                    <div class="data">
                        <p>hasło: 7733ba5bcf5ed778e7cc13607e2f2363</p>
                        <p>status: aktywny</p>
                        <p>klasa: 4D</p>
                    </div>
                    <div class="change_buttons">

                        <button type="button" class="deleteButton">usuń</button>
                        <button type="button" class="modify">modyfikuj</button>

                    </div>
                </td>
            </tr>
            <tr class="user">
                <td>Filip</td>
                <td>Perz</td>
                <td>Uczeń</td>
            </tr>
            <tr class="user_content">
                <td colspan="3">
                    <div class="data">
                        <p>hasło: 7733ba5bcf5ed778e7cc13607e2f2363</p>
                        <p>status: aktywny</p>
                        <p>klasa: 4D</p>
                    </div>
                    <div class="change_buttons">

                        <button type="button" class="deleteButton">usuń</button>
                        <button type="button" class="modify">modyfikuj</button>

                    </div>
                </td>
            </tr>
        </table>
    </section>
    <button type="button" class="save" id="add_user"><a href="modify_user.php">Dodaj użytkownika</a></button>
</main>
<?php
    require_once("./footer.php");
?>