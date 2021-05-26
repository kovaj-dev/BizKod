<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
</head>
<body>
<?php
session_start();
if (isset($_SESSION["user"])) : ?>
<div class="container">

    <?php if (isset($schedule)): ?>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        PONEDELJAK
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <?php foreach ($schedule as $item): ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
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
                                        <img src="<?php echo URLROOT . '/public/img/icons/Home.svg'; ?>"
                                             alt="<?php echo 'home' . $item->ime . $item->prezime . $item->ponedeljak; ?>"
                                             style="width: 3rem; fill: #00AEEF;">
                                    <?php elseif ($item->ponedeljak === "2") : ?>
                                        <img src="<?php echo URLROOT . '/public/img/icons/Workplace.svg'; ?>"
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
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        UTORAK
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <?php foreach ($schedule as $item): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
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
                                            <img src="<?php echo URLROOT . '/public/img/icons/Home.svg'; ?>"
                                                 alt="<?php echo 'home' . $item->ime . $item->prezime . $item->utorak; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php elseif ($item->utorak === "2") : ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/Workplace.svg'; ?>"
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
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        SREDA
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <?php foreach ($schedule as $item): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
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
                                            <img src="<?php echo URLROOT . '/public/img/icons/Home.svg'; ?>"
                                                 alt="<?php echo 'home' . $item->ime . $item->prezime . $item->sreda; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php elseif ($item->sreda === "2") : ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/Workplace.svg'; ?>"
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
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        ČETVRTAK
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <?php foreach ($schedule as $item): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
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
                                            <img src="<?php echo URLROOT . '/public/img/icons/Home.svg'; ?>"
                                                 alt="<?php echo 'home' . $item->ime . $item->prezime . $item->cetvrtak; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php elseif ($item->cetvrtak === "2") : ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/Workplace.svg'; ?>"
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
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        PETAK
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <?php foreach ($schedule as $item): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
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
                                            <img src="<?php echo URLROOT . '/public/img/icons/Home.svg'; ?>"
                                                 alt="<?php echo 'home' . $item->ime . $item->prezime . $item->petak; ?>"
                                                 style="width: 3rem; fill: #00AEEF;">
                                        <?php elseif ($item->petak === "2") : ?>
                                            <img src="<?php echo URLROOT . '/public/img/icons/Workplace.svg'; ?>"
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
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
        crossorigin="anonymous"></script>
</html>