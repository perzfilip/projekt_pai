<?php
require_once("./scripts/Auth_check.php");
require_once("./scripts/Auth_admin.php");
require_once("./scripts/connection.php");
    require_once("./head.php");
    require_once("./nav.php");

    $sqlUsers = $con->prepare("SELECT * FROM users where user_id != ?");
    $sqlClasses = $con->prepare("SELECT * FROM classes");
    $sqlStatuses = $con->prepare("SELECT * FROM status");
    $sqlRoles = $con->prepare("SELECT * FROM roles");
    $currentUserId = $_SESSION['user_id'];
    $sqlUsers->bind_param("i", $currentUserId);

    $sqlUsers->execute();
    $users = $sqlUsers->get_result();
    $sqlClasses->execute();
    $resultClasses = $sqlClasses->get_result();
    $sqlStatuses->execute();
    $resultStatuses = $sqlStatuses->get_result();
    $sqlRoles->execute();
    $resultRoles = $sqlRoles->get_result();

    $classes = array();
    $statuses = array();
    $roles = array();

    while($row = $resultClasses->fetch_assoc())
        $classes[$row['class_id']] = $row['className'];
    while($row = $resultStatuses->fetch_assoc())
        $statuses[$row['status_id']] = $row['statusName'];
    while($row = $resultRoles->fetch_assoc())
        $roles[$row['role_id']] = $row['roleName'];



?>
<main class="users">
    <h1>Zarządzaj użytkownikami</h1>
    <section>
        <table>
            <tr>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Rola</th>
            </tr>
            <?php
                while($row = $users->fetch_assoc()) {
                    $userId = $row['user_id'];
                    $login = $row['login'];
                    $firstName = $row['firstName'];
                    $lastName = $row['lastName'];
                    $status = $statuses[ $row['status'] ];
                    $role = $roles[ $row['role'] ];
                    $class = $classes[ $row['class'] ];

                    echo <<< USERROW
            <tr class="user">
                <td>$firstName</td>
                <td>$lastName</td>
                <td>$role</td>
            </tr>
            <tr class="user_content">
                <td colspan="3">
                    <div class="data">
                        <p>status: $status</p>
                        <p>klasa: $class</p>
                    </div>
                    <div class="change_buttons">
                        <button type="button" class="deleteButton"><a href="scripts/delUser.php?id=$userId" onclick="return confirm('na pewno chcesz usunąć tego użytkwnika?')">usuń</a></button>
                        <button type="button" class="modify"><a href="add_user_form.php?id=$userId">modyfikuj</a></button>
                    </div>
                </td>
            </tr>
USERROW;
                }
            ?>
        </table>
    </section>
    <button type="button" class="save" id="add_user"><a href="add_user_form.php">Dodaj użytkownika</a></button>
</main>
<?php
    require_once("./footer.php");
?>