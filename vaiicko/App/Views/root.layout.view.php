<?php

/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/css/styl.css">
    <script src="public/js/script.js"></script>
</head>
<body style="background-image: linear-gradient(to bottom right, #b300ff, #060007);background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
        <a class="navbar-brand fl" href="?c=home"><img class="logonav" src="public/images/logo.png" alt="CD logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link active fl" aria-current="page" href="?c=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fl" href="?c=brand">Brands</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fl" href="?c=about">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fl" href="#" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Show profile</a></li>
                        <li><a class="dropdown-item" href="#">My posts</a></li>
                        <li><a class="dropdown-item" href="#">My listings</a></li>
                        <li><a class="dropdown-item" href="#">Log out</a></li>
                    </ul>
                </li>
            </ul>
            <?php if ($auth->isLogged()) { ?>
                <span class="navbar-text">User: <b><?= $auth->getLoggedUserName() ?></b></span>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="color: white" href="<?= $link->url("auth.logout") ?>">Log out</a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="color: white" href="<?= \App\Config\Configuration::LOGIN_URL ?>">Log in</a>
                    </li>
                </ul>
            <?php } ?>
            </form>
        </div>
    </div>
</nav>
<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>
</body>
</html>
