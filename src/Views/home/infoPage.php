<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vesti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="<?= URLROOT."public/img/logo.png" ?>"/>
    <link rel="stylesheet" href="<?= URLROOT."public/css/main.css" ?>">
</head>
<body style="background-color: #F0F0F0">

<header id="header">
    <?php require_once ROOT . "/Views/includes/navbar.php"; ?>
</header>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["user"])) : ?>

    <div class="container d-flex flex-column align-items-center news mb-5">

        <h1 class="page-title">Vazne informacije</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Generalno</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Moj Tim</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <?php
            if(isset($news)): ?>
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <?php foreach ($news as $item): ?>
                <div class="card">
                    <div class="card-header text-light">
                        <?= $item->naslov ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text collapse collapse-paragraph" id="id<?= $item->id ?>" aria-expanded="false">
                            <?= $item->opis ?>
                        </p>
                        <span class="card-text">
                            <?= $item->vreme ?>
                        </span>
                        <a role="button" class="collapsed" data-toggle="collapse" href="#id<?= $item->id ?>" aria-expanded="false" aria-controls="id<?= $item->id ?>">
                            <img src="<?php echo URLROOT . '/public/img/icons/arrow.svg'; ?>">
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php
            if(isset($teamnews)): ?>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php foreach ($teamnews as $item): ?>
                <div class="card">
                    <div class="card-header text-light">
                        <?= $item->naslov ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text collapse collapse-paragraph" id="id2<?= $item->idvesti ?>" aria-expanded="false">
                            <?= $item->opis ?>
                        </p>
                        <span class="card-text"><?= $item->vreme ?></span>
                        <a role="button" class="collapsed" data-toggle="collapse" href="#id2<?= $item->idvesti ?>" aria-expanded="false" aria-controls="id2<?= $item->idvesti ?>">
                            <img src="<?php echo URLROOT . '/public/img/icons/arrow.svg'; ?>">
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="drop-form accordion mt-4" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-light w-100" type="submit" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            DODAJ NOVU VEST
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="card-body">
                        <form id="newsForm" action="">
                            <input type="text" class="form-control mb-3" name="title" id="title" placeholder="Naslov vesti">
                            <textarea class="form-control mb-3" id="description" rows="5" placeholder="Opis vesti..."></textarea>
                            <div class="form-check" style="display: inline-block">
                                <input class="form-check-input" type="radio" name="newsfor" id="forall" value="0" checked>
                                <label class="form-check-label" for="forall">
                                    Za sve
                                </label>
                            </div>
                            <div class="form-check" style="display: inline-block">
                                <input class="form-check-input" type="radio" name="newsfor" id="forteam" value="<?= $teamnews[0]->idtima ?>">
                                <label class="form-check-label" for="forteam">
                                    Za tim
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary save mt-3" style="background-color: #ED0C6E">Sačuvaj</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>
    <?php
    header('Location: /bizkod/');
    ?>
<?php endif;  ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</html>