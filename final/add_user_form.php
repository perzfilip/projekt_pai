<?php
require_once("./scripts/Auth_check.php");
require_once("./head.php");
require_once("./nav.php");
require_once("./scripts/connection.php");

$sqlRoles = $con->prepare("select * from roles");
$sqlClasses = $con->prepare("select * from classes where class_id > 1 order by 1 asc");
$sqlStatuses = $con->prepare("select * from status");

$sqlRoles->execute();
$roles = $sqlRoles->get_result();

$sqlClasses->execute();
$classes = $sqlClasses->get_result();

$sqlStatuses->execute();
$statuses = $sqlStatuses->get_result();

$id = -1;
$login = NULL;
$firstName = NULL;
$lastName = NULL;
$status = NULL;
$role = NULL;
$class = NULL;
if (isset($_GET['id'])) {
    if($_SESSION['user_id'] != $_GET['id']) {
        require_once("./scripts/Auth_admin.php");
    }
    $id = $_GET['id'];
    $sqlUser = $con->prepare("select * from users where user_id = ?");
    $sqlUser->bind_param("i", $id);
    $sqlUser->execute();
    $userResult = $sqlUser->get_result();
    while ($row = $userResult->fetch_assoc()) {
        $login = $row['login'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $status = $row['status'];
        $role = $row['role'];
        $class = $row['class'];
    }
} else {
    require_once("./scripts/Auth_admin.php");
}
?>
    <main class="mod_users">
        <h1>Wpisz dane</h1>
        <section>
            <form action="<?php echo $id != -1 ? "scripts/modifyUser.php" : "scripts/addUser.php" ?>" method="post">
                <input type="hidden" name="userId" value="<?php echo $id; ?>">
                <div class="input">
                    <div>
                        <input type="text" name="login" placeholder=" " autocomplete="off" value="<?php echo $login; ?>"
                               required>
                        <span>Login</span>
                    </div>
                </div>
                <div class="input">
                    <div>
                        <input type="password" name="password" placeholder=" " autocomplete="off"
                            <?php echo $id != -1 ? "" : "required" ?> >
                        <span>Nowe hasło</span>
                    </div>
                </div>
                <div class="input">
                    <div>
                        <input type="text" name="firstName" placeholder=" " autocomplete="off"
                               value="<?php echo $firstName; ?>" required>
                        <span>Imię</span>
                    </div>
                </div>
                <div class="input">
                    <div>
                        <input type="text" name="lastName" placeholder=" " autocomplete="off"
                               value="<?php echo $lastName; ?>" required>
                        <span>Nazwisko</span>
                    </div>
                </div>
                <div class="special">
                    <div class="multi-select">
                        <button type="button" class="list_trigger" onclick="wrap(this);">Status</button>
                        <div class="list">
                            <?php
                            while ($row = $statuses->fetch_assoc()) {
                                $statusId = $row['status_id'];
                                $statusName = $row['statusName'];
                                if ($status == $row['status_id']) {
                                    echo <<< STATUSA
<div class="checkbox">
                            <input type="radio" id="S$statusId" name="status" value="$statusId" checked required>
                            <label for="S$statusId">$statusName</label>
                            <span class="bgc"></span>
                        </div>
STATUSA;
                                } else {
                                    echo <<< STATUS
<div class="checkbox">
                            <input type="radio" id="S$statusId" name="status" value="$statusId" required>
                            <label for="S$statusId">$statusName</label>
                            <span class="bgc"></span>
                        </div>
STATUS;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="special">
                    <div class="multi-select">
                        <button type="button" class="list_trigger" onclick="wrap(this);">Rola</button>
                        <div class="list">
                            <?php
                            while ($row = $roles->fetch_assoc()) {
                                $roleId = $row['role_id'];
                                $roleName = $row['roleName'];

                                if ($roleId == $role) {
                                    echo <<< ROLESA
<div class="checkbox">
                            <input type="radio" id="R$roleId" name="role" value="$roleId" checked required>
                            <label for="R$roleId">$roleName</label>
                            <span class="bgc"></span>
                        </div>
ROLESA;
                                } else {
                                    echo <<< ROLES
<div class="checkbox">
                            <input type="radio" id="R$roleId" name="role" value="$roleId" required>
                            <label for="R$roleId">$roleName</label>
                            <span class="bgc"></span>
                        </div>
ROLES;
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

                                if ($classId == $class) {
                                    echo <<< KLASYA
<div class="checkbox">
                            <input type="radio" id="checkbox_$classId" name="class" value="$classId" checked required>
                            <label for="checkbox_$classId">$className</label>
                            <span class="bgc"></span>
                        </div>
KLASYA;
                                } else {
                                    echo <<< KLASY
<div class="checkbox">
                            <input type="radio" id="checkbox_$classId" name="class" value="$classId"  required>
                            <label for="checkbox_$classId">$className</label>
                            <span class="bgc"></span>
                        </div>
KLASY;
                                }

                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="save" name="zapis" value="zapis">Zapisz</button>
                    <button type="button" class="modify"><a href="users_management.php">Cofnij</a></button>
                </div>
            </form>
        </section>
    </main>
<?php
require_once("./footer.php");
?>