<nav>
    <ul>
        <li><a href="main.php">STRONA GŁÓWNA</a></li>
        <li><a href="create_sets.php">DODAJ ZESTAW</a></li>
        <li><a href="users_management.php">UŻYTKOWNICY</a></li>
        <li class="logged">
            <a class="dropbtn" href="javascript:void(0)">ADMIN</a>
            <div class="logged-content">
                <a href="modify_user.php">zarządzaj kontem</a>
                <a href="start_page.php">wyloguj</a>
            </div>
        </li>
    </ul>
</nav>
<nav id="mobile">
    <div class="burger" onclick="burger(this);">
        <div>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="nav_content">
        <div class="links">
            <a href="main.php">STRONA GŁÓWNA</a>
            <a href="create_sets.php">DODAJ ZESTAW</a>
            <a href="users_management.php">UŻYTKOWNICY</a>
        </div>
        <div class="logged_user">
            <a href="javascript:void(0)">ADMIN</a>
        </div>
        <div class="logged_user_content">
            <a href="modify_user.php">zarządzaj kontem</a>
            <a href="start_page.php">wyloguj</a>
        </div>
    </div>
</nav>