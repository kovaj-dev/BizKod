<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raspored</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="<?= URLROOT."public/img/logo.png" ?>"/>
    <link rel="stylesheet" href="<?= URLROOT."public/css/main.css" ?>">
</head>
<body>

<header id="header">
    <?php require_once ROOT . "/Views/includes/navbar.php"; ?>
</header>

<?php
session_start();
if (isset($_SESSION["user"])) : ?>
<div class="container d-flex flex-column" style="background-color: #F0F0F0; min-height: 100vh">

    <?php if (isset($schedule)): ?>
        <h1 class="page-title">Trenutni raspored</h1>
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-light" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            PONEDELJAK
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($schedule as $item): ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <div class="picture">
                                    <img src="<?php echo URLROOT . '/public/img/workers/' . $item->slika; ?>"
                                         alt="<?php echo 'ponedeljak' . $item->ime . $item->prezime . $item->slika; ?>"
                                         style="width: 5rem;">
                                </div>
                                <h3>
                                    <?php echo $item->ime . ' ' . $item->prezime; ?>
                                </h3>
                                <div class="icons">
                                    <?php if (empty($item->ponedeljak)): ?>
                                        <img src="<?php echo URLROOT . '/public/img/icons/question_mark.svg'; ?>"
                                             alt="<?php echo 'question' . $item->ime . $item->prezime . $item->ponedeljak; ?>"
                                            style="width: 3rem; fill: #00AEEF;">
                                    <?php elseif ($item->ponedeljak === "1") : ?>
                                        <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>"
                                             alt="<?php echo 'home' . $item->ime . $item->prezime . $item->ponedeljak; ?>"
                                             style="width: 3rem; fill: #00AEEF;">
                                    <?php elseif ($item->ponedeljak === "2") : ?>
                                        <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>"
                                             alt="<?php echo 'office' . $item->ime . $item->prezime . $item->ponedeljak; ?>"
                                             style="width: 3rem; fill: #00AEEF;">
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-light" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            UTORAK
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($schedule as $item): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="picture">
                                        <img src="<?php echo URLROOT . '/public/img/workers/' . $item->slika; ?>"
                                             alt="<?php echo 'utorak' . $item->ime . $item->prezime . $item->slika; ?>"
                                             style="width: 5rem;">
                                    </div>
                                    <h3>
                                        <?php echo $item->ime . ' ' . $item->prezime; ?>
                                    </h3>
                                    <div class="icons">
                                        <?php if (empty($item->utorak)): ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/question_mark.svg'; ?>"
                                                 alt="<?php echo 'question' . $item->ime . $item->prezime . $item->utorak; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php elseif ($item->utorak === "1") : ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>"
                                                 alt="<?php echo 'home' . $item->ime . $item->prezime . $item->utorak; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php elseif ($item->utorak === "2") : ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>"
                                                 alt="<?php echo 'office' . $item->ime . $item->prezime . $item->utorak; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-light" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            SREDA
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($schedule as $item): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="picture">
                                        <img src="<?php echo URLROOT . '/public/img/workers/' . $item->slika; ?>"
                                             alt="<?php echo 'sreda' . $item->ime . $item->prezime . $item->slika; ?>"
                                             style="width: 5rem;">
                                    </div>
                                    <h3>
                                        <?php echo $item->ime . ' ' . $item->prezime; ?>
                                    </h3>
                                    <div class="icons">
                                        <?php if (empty($item->sreda)): ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/question_mark.svg'; ?>"
                                                 alt="<?php echo 'question' . $item->ime . $item->prezime . $item->sreda; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php elseif ($item->sreda === "1") : ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>"
                                                 alt="<?php echo 'home' . $item->ime . $item->prezime . $item->sreda; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php elseif ($item->sreda === "2") : ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>"
                                                 alt="<?php echo 'office' . $item->ime . $item->prezime . $item->sreda; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-light" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            ČETVRTAK
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($schedule as $item): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="picture">
                                        <img src="<?php echo URLROOT . '/public/img/workers/' . $item->slika; ?>"
                                             alt="<?php echo 'cetvrtak' . $item->ime . $item->prezime . $item->slika; ?>"
                                             style="width: 5rem;">
                                    </div>
                                    <h3>
                                        <?php echo $item->ime . ' ' . $item->prezime; ?>
                                    </h3>
                                    <div class="icons">
                                        <?php if (empty($item->cetvrtak)): ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/question_mark.svg'; ?>"
                                                 alt="<?php echo 'question' . $item->ime . $item->prezime . $item->cetvrtak; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php elseif ($item->cetvrtak === "1") : ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>"
                                                 alt="<?php echo 'home' . $item->ime . $item->prezime . $item->cetvrtak; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php elseif ($item->cetvrtak === "2") : ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>"
                                                 alt="<?php echo 'office' . $item->ime . $item->prezime . $item->cetvrtak; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFive">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-light" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            PETAK
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($schedule as $item): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="picture">
                                        <img src="<?php echo URLROOT . '/public/img/workers/' . $item->slika; ?>"
                                             alt="<?php echo 'petak' . $item->ime . $item->prezime . $item->slika; ?>"
                                             style="width: 5rem;">
                                    </div>
                                    <h3>
                                        <?php echo $item->ime . ' ' . $item->prezime; ?>
                                    </h3>
                                    <div class="icons">
                                        <?php if (empty($item->petak)): ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/question_mark.svg'; ?>"
                                                 alt="<?php echo 'question' . $item->ime . $item->prezime . $item->petak; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php elseif ($item->petak === "1") : ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>"
                                                 alt="<?php echo 'home' . $item->ime . $item->prezime . $item->petak; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php elseif ($item->petak === "2") : ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>"
                                                 alt="<?php echo 'office' . $item->ime . $item->prezime . $item->petak; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>
</div>
    <div class="container d-flex flex-column" style="background-color: #CDCDCD; min-height: 100vh">

        <?php if (isset($schedule)): ?>
            <h1 class="page-title">Raspored za sledeću nedelju</h1>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left text-light" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                PONEDELJAK
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <?php foreach ($schedule as $item): ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div class="picture">
                                            <img src="<?php echo URLROOT . '/public/img/workers/' . $item->slika; ?>"
                                                 alt="<?php echo 'ponedeljak' . $item->ime . $item->prezime . $item->slika; ?>"
                                                 style="width: 5rem;">
                                        </div>
                                        <h3>
                                            <?php echo $item->ime . ' ' . $item->prezime; ?>
                                        </h3>
                                        <div class="icons">
                                            <?php if (empty($item->ponedeljak)): ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/question_mark.svg'; ?>"
                                                     alt="<?php echo 'question' . $item->ime . $item->prezime . $item->ponedeljak; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php elseif ($item->ponedeljak === "1") : ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>"
                                                     alt="<?php echo 'home' . $item->ime . $item->prezime . $item->ponedeljak; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php elseif ($item->ponedeljak === "2") : ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>"
                                                     alt="<?php echo 'office' . $item->ime . $item->prezime . $item->ponedeljak; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left text-light" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                UTORAK
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <?php foreach ($schedule as $item): ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div class="picture">
                                            <img src="<?php echo URLROOT . '/public/img/workers/' . $item->slika; ?>"
                                                 alt="<?php echo 'utorak' . $item->ime . $item->prezime . $item->slika; ?>"
                                                 style="width: 5rem;">
                                        </div>
                                        <h3>
                                            <?php echo $item->ime . ' ' . $item->prezime; ?>
                                        </h3>
                                        <div class="icons">
                                            <?php if (empty($item->utorak)): ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/question_mark.svg'; ?>"
                                                     alt="<?php echo 'question' . $item->ime . $item->prezime . $item->utorak; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php elseif ($item->utorak === "1") : ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>"
                                                     alt="<?php echo 'home' . $item->ime . $item->prezime . $item->utorak; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php elseif ($item->utorak === "2") : ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>"
                                                     alt="<?php echo 'office' . $item->ime . $item->prezime . $item->utorak; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left text-light" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                SREDA
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <?php foreach ($schedule as $item): ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div class="picture">
                                            <img src="<?php echo URLROOT . '/public/img/workers/' . $item->slika; ?>"
                                                 alt="<?php echo 'sreda' . $item->ime . $item->prezime . $item->slika; ?>"
                                                 style="width: 5rem;">
                                        </div>
                                        <h3>
                                            <?php echo $item->ime . ' ' . $item->prezime; ?>
                                        </h3>
                                        <div class="icons">
                                            <?php if (empty($item->sreda)): ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/question_mark.svg'; ?>"
                                                     alt="<?php echo 'question' . $item->ime . $item->prezime . $item->sreda; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php elseif ($item->sreda === "1") : ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>"
                                                     alt="<?php echo 'home' . $item->ime . $item->prezime . $item->sreda; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php elseif ($item->sreda === "2") : ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>"
                                                     alt="<?php echo 'office' . $item->ime . $item->prezime . $item->sreda; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left text-light" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                ČETVRTAK
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <?php foreach ($schedule as $item): ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div class="picture">
                                            <img src="<?php echo URLROOT . '/public/img/workers/' . $item->slika; ?>"
                                                 alt="<?php echo 'cetvrtak' . $item->ime . $item->prezime . $item->slika; ?>"
                                                 style="width: 5rem;">
                                        </div>
                                        <h3>
                                            <?php echo $item->ime . ' ' . $item->prezime; ?>
                                        </h3>
                                        <div class="icons">
                                            <?php if (empty($item->cetvrtak)): ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/question_mark.svg'; ?>"
                                                     alt="<?php echo 'question' . $item->ime . $item->prezime . $item->cetvrtak; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php elseif ($item->cetvrtak === "1") : ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>"
                                                     alt="<?php echo 'home' . $item->ime . $item->prezime . $item->cetvrtak; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php elseif ($item->cetvrtak === "2") : ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>"
                                                     alt="<?php echo 'office' . $item->ime . $item->prezime . $item->cetvrtak; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left text-light" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                PETAK
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <?php foreach ($schedule as $item): ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div class="picture">
                                            <img src="<?php echo URLROOT . '/public/img/workers/' . $item->slika; ?>"
                                                 alt="<?php echo 'petak' . $item->ime . $item->prezime . $item->slika; ?>"
                                                 style="width: 5rem;">
                                        </div>
                                        <h3>
                                            <?php echo $item->ime . ' ' . $item->prezime; ?>
                                        </h3>
                                        <div class="icons">
                                            <?php if (empty($item->petak)): ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/question_mark.svg'; ?>"
                                                     alt="<?php echo 'question' . $item->ime . $item->prezime . $item->petak; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php elseif ($item->petak === "1") : ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>"
                                                     alt="<?php echo 'home' . $item->ime . $item->prezime . $item->petak; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php elseif ($item->petak === "2") : ?>
                                                <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>"
                                                     alt="<?php echo 'office' . $item->ime . $item->prezime . $item->petak; ?>"
                                                     style="width: 3rem; fill: #00AEEF;">
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>


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