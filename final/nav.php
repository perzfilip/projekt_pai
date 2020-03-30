<nav>
    <ul>
        <?php
        switch ($_SESSION['role']) {
            case 1: echo '<li><a href="users_management.php">UŻYTKOWNICY</a></li>';
            case 2: echo '<li><a href="create_sets.php">DODAJ ZESTAW</a></li>';
            case 3: echo '<li><a href="main.php">STRONA GŁÓWNA</a></li>';
            break;
        }
        ?>
        <li class="logged">
            <a class="dropbtn" href="javascript:void(0)"><?php echo $_SESSION['login']; ?></a>
            <div class="logged-content">
                <a href="add_user_form.php?id=<?php echo $_SESSION['user_id']?>">zarządzaj kontem</a>
                <a href="scripts/logout.php">wyloguj</a>
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
            <?php
            switch ($_SESSION['role']) {
                case 1: echo '<li><a href="users_management.php">UŻYTKOWNICY</a></li>';
                case 2: echo '<li><a href="create_sets.php">DODAJ ZESTAW</a></li>';
                case 3: echo '<li><a href="main.php">STRONA GŁÓWNA</a></li>';
                    break;
            }
            ?>
        </div>
        <div class="logged_user">
            <a href="javascript:void(0)"><?php echo $_SESSION['login']; ?></a>
        </div>
        <div class="logged_user_content">
            <a href="add_user_form.php?id=<?php echo $_SESSION['user_id']?>">zarządzaj kontem</a>
            <a href="scripts/logout.php">wyloguj</a>
        </div>
    </div>
</nav>