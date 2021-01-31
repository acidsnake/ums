<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <span class="iconify" data-icon="mdi:account-circle" data-inline="false"></span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item<?= (strpos($_SERVER['PHP_SELF'], 'index') && empty($_GET['action'])) ? ' active' : '' ?>">
                <a class="nav-link" href="index.php">
                    <span class="iconify" data-icon="mdi:account-group" data-inline="false"></span>
                    Utenti
                </a>
            </li>
            <li class="nav-item<?= (!empty($_GET['action']) && $_GET['action'] == 'insert') ? ' active' : '' ?>">
                <a class="nav-link" href="index.php?action=insert">
                    <span class="iconify" data-icon="mdi:account-plus-outline" data-inline="false"></span>
                    Nuovo utente
                </a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Cerca" aria-label="Cerca">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
        </form>
    </div>
</nav>