<!DOCTYPE html>
<html lang="it">

<?php require_once 'theme/partials/head.php' ?>

<body>

    <?php require_once 'config/functions.php' ?>

    <header>
        <?php require_once 'theme/partials/navbar.php' ?>
    </header>

    <main>
        <div class="container-fluid py-4">
            <h1 class="text-center my-5">User managment system</h1>
            <?php
            $action = getParam('action');
            switch ($action) {
                case 'insert':
                    break;
                default:
                    $users = getUsers();
                    require_once 'theme/partials/users-list.php';
            }
            ?>
        </div>
    </main>

    <footer>
        <?php require_once 'theme/partials/footer.php' ?>
    </footer>

    <?php require_once 'theme/partials/bottom.php' ?>

</body>

</html>