<?php
    require_once("./head.php");
?>
<body class="start_page">
<nav class="start_page">
    <ul>
        <li><a onclick="login_animate()">ZALOGUJ SIĘ</a></li>
    </ul>
</nav>
<main class="start_page">
    <section id="welcome" class="">
        <div class="shadow">
            <h1>Langix 3000</h1>
            <p>Serwis, który pozwoli ci nauczyć się potrzebnego słownictwa w mgnieniu oka!</p>
        </div>
    </section>
    <section class="login_form shadow">
        <h2>Logowanie</h2>
        <div>
            <form action="./login.php" method="post">
                <div class="input">
                    <div>
                        <input type="text" name="login" placeholder=" " autocomplete="off" required>
                        <span>Login</span>
                    </div>
                </div>
                <div class="input">
                    <div>
                        <input type="password" name="password" placeholder=" " required>
                        <span>Hasło</span>
                    </div>
                </div>
                <div class="submit przycisk">
                    <div>
                        <input type="submit" value="Zaloguj">
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="back przycisk">
                    <div>
                        <button type="button" onclick="login_deanimate()">Powrót</button>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
<footer class="start_page">
    <section>
        <p>Strona stworzona przez Filipa Perza, &copy; 2019</p>
        <p>kontakt: perzfilip@gmail.com</p>
    </section>
</footer>
<script src="js/script.js"></script>
</body>
</html>
