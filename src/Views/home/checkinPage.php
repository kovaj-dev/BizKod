<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prijava</title>
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

<div class="container d-flex flex-column align-items-center checkin mb-5">
    <h1 class="page-title">Prijava za sledeću nedelju</h1>
    <ul class="list-group mb-3">
        <li class="list-group-item text-light d-flex justify-content-between">
            <div class="day">PONEDELJAK</div>
            <div class="buttons">
                    <?php if (isset($userSchedule) && !empty($userSchedule->ponedeljak)): ?>
                        <?php if ($userSchedule->ponedeljak === "1"): ?>
                            <button type="button">
                                <label for="mondayOffice">
                                    <img src="<?php echo URLROOT . '/public/img/icons/defaultoffice.svg'; ?>" id="monOffice">
                                </label>
                                <input type="radio" name="monday" id="mondayOffice" value="2" hidden>
                            </button>
                            <button type="button">
                                <label for="mondayHome">
                                    <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>" id="monHome">
                                </label>
                                <input type="radio" name="monday" id="mondayHome" value="1" checked hidden>
                            </button>
                        <?php elseif ($userSchedule->ponedeljak === "2"): ?>
                            <button type="button">
                                <label for="mondayOffice">
                                    <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>" id="monOffice">
                                </label>
                                <input type="radio" name="monday" id="mondayOffice" value="2" checked hidden>
                            </button>
                            <button type="button">
                                <label for="mondayHome">
                                    <img src="<?php echo URLROOT . '/public/img/icons/defaulthome.svg'; ?>" id="monHome">
                                </label>
                                <input type="radio" name="monday" id="mondayHome" value="1" hidden>
                            </button>
                        <?php endif; ?>
                        <?php else: ?>
                            <button type="button">
                            <label for="mondayOffice">
                                <img src="<?php echo URLROOT . '/public/img/icons/defaultoffice.svg'; ?>" id="monOffice">
                            </label>
                            <input type="radio" name="monday" id="mondayOffice" value="2" hidden>
                            </button>
                            <button type="button">
                                <label for="mondayHome">
                                    <img src="<?php echo URLROOT . '/public/img/icons/defaulthome.svg'; ?>" id="monHome">
                                </label>
                                <input type="radio" name="monday" id="mondayHome" value="1" hidden>
                            </button>
                    <?php endif; ?>
            </div>
        </li>
        <li class="list-group-item text-light d-flex justify-content-between">
            <div class="day">UTORAK</div>
            <div class="buttons">
                <?php if (isset($userSchedule) && !empty($userSchedule->utorak)): ?>
                    <?php if ($userSchedule->utorak === "1"): ?>
                        <button type="button">
                            <label for="tuesdayOffice">
                                <img src="<?php echo URLROOT . '/public/img/icons/defaultoffice.svg'; ?>" id="tueOffice">
                            </label>
                            <input type="radio" name="tuesday" id="tuesdayOffice" value="2" hidden>
                        </button>
                        <button type="button">
                            <label for="tuesdayHome">
                                <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>" id="tueHome">
                            </label>
                            <input type="radio" name="tuesday" id="tuesdayHome" value="1" checked hidden>
                        </button>
                    <?php elseif ($userSchedule->utorak === "2"): ?>
                        <button type="button">
                            <label for="tuesdayOffice">
                                <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>" id="tueOffice">
                            </label>
                            <input type="radio" name="tuesday" id="tuesdayOffice" value="2" checked hidden>
                        </button>
                        <button type="button">
                            <label for="tuesdayHome">
                                <img src="<?php echo URLROOT . '/public/img/icons/defaulthome.svg'; ?>" id="tueHome">
                            </label>
                            <input type="radio" name="tuesday" id="tuesdayHome" value="1" hidden>
                        </button>
                    <?php endif; ?>
                <?php else: ?>
                    <button type="button">
                        <label for="tuesdayOffice">
                            <img src="<?php echo URLROOT . '/public/img/icons/defaultoffice.svg'; ?>" id="tueOffice">
                        </label>
                        <input type="radio" name="tuesday" id="tuesdayOffice" value="2" hidden>
                    </button>
                    <button type="button">
                        <label for="tuesdayHome">
                            <img src="<?php echo URLROOT . '/public/img/icons/defaulthome.svg'; ?>" id="tueHome">
                        </label>
                        <input type="radio" name="tuesday" id="tuesdayHome" value="1" hidden>
                    </button>
                <?php endif; ?>
            </div>
        </li>
        <li class="list-group-item text-light d-flex justify-content-between">
            <div class="day">SREDA</div>
            <div class="buttons">
                <?php if (isset($userSchedule) && !empty($userSchedule->sreda)): ?>
                    <?php if ($userSchedule->sreda === "1"): ?>
                        <button type="button">
                            <label for="wednesdayOffice">
                                <img src="<?php echo URLROOT . '/public/img/icons/defaultoffice.svg'; ?>" id="wedOffice">
                            </label>
                            <input type="radio" name="wednesday" id="wednesdayOffice" value="2" hidden>
                        </button>
                        <button type="button">
                            <label for="wednesdayHome">
                                <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>" id="wedHome">
                            </label>
                            <input type="radio" name="wednesday" id="wednesdayHome" value="1" checked hidden>
                        </button>
                    <?php elseif ($userSchedule->sreda === "2"): ?>
                        <button type="button">
                            <label for="wednesdayOffice">
                                <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>" id="wedOffice">
                            </label>
                            <input type="radio" name="wednesday" id="wednesdayOffice" value="2" checked hidden>
                        </button>
                        <button type="button">
                            <label for="wednesdayHome">
                                <img src="<?php echo URLROOT . '/public/img/icons/defaulthome.svg'; ?>" id="wedHome">
                            </label>
                            <input type="radio" name="wednesday" id="wednesdayHome" value="1" hidden>
                        </button>
                    <?php endif; ?>
                <?php else: ?>
                    <button type="button">
                        <label for="wednesdayOffice">
                            <img src="<?php echo URLROOT . '/public/img/icons/defaultoffice.svg'; ?>" id="wedOffice">
                        </label>
                        <input type="radio" name="wednesday" id="wednesdayOffice" value="2" hidden>
                    </button>
                    <button type="button">
                        <label for="wednesdayHome">
                            <img src="<?php echo URLROOT . '/public/img/icons/defaulthome.svg'; ?>" id="wedHome">
                        </label>
                        <input type="radio" name="wednesday" id="wednesdayHome" value="1" hidden>
                    </button>
                <?php endif; ?>
            </div>
        </li>
        <li class="list-group-item text-light d-flex justify-content-between">
            <div class="day">ČETVRTAK</div>
            <div class="buttons">
                <?php if (isset($userSchedule) && !empty($userSchedule->cetvrtak)): ?>
                    <?php if ($userSchedule->cetvrtak === "1"): ?>
                        <button type="button">
                            <label for="thursdayOffice">
                                <img src="<?php echo URLROOT . '/public/img/icons/defaultoffice.svg'; ?>" id="thuOffice">
                            </label>
                            <input type="radio" name="thursday" id="thursdayOffice" value="2" hidden>
                        </button>
                        <button type="button">
                            <label for="thursdayHome">
                                <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>" id="thuHome">
                            </label>
                            <input type="radio" name="thursday" id="thursdayHome" value="1" checked hidden>
                        </button>
                    <?php elseif ($userSchedule->cetvrtak === "2"): ?>
                        <button type="button">
                            <label for="thursdayOffice">
                                <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>" id="thuOffice">
                            </label>
                            <input type="radio" name="thursday" id="thursdayOffice" value="2" checked hidden>
                        </button>
                        <button type="button">
                            <label for="thursdayHome">
                                <img src="<?php echo URLROOT . '/public/img/icons/defaulthome.svg'; ?>" id="thuHome">
                            </label>
                            <input type="radio" name="thursday" id="thursdayHome" value="1" hidden>
                        </button>
                    <?php endif; ?>
                <?php else: ?>
                    <button type="button">
                        <label for="thursdayOffice">
                            <img src="<?php echo URLROOT . '/public/img/icons/defaultoffice.svg'; ?>" id="thuOffice">
                        </label>
                        <input type="radio" name="thursday" id="thursdayOffice" value="2" hidden>
                    </button>
                    <button type="button">
                        <label for="thursdayHome">
                            <img src="<?php echo URLROOT . '/public/img/icons/defaulthome.svg'; ?>" id="thuHome">
                        </label>
                        <input type="radio" name="thursday" id="thursdayHome" value="1" hidden>
                    </button>
                <?php endif; ?>
            </div>
        </li>
        <li class="list-group-item text-light d-flex justify-content-between">
            <div class="day">PETAK</div>
            <div class="buttons">
                <?php if (isset($userSchedule) && !empty($userSchedule->petak)): ?>
                    <?php if ($userSchedule->petak === "1"): ?>
                        <button type="button">
                            <label for="fridayOffice">
                                <img src="<?php echo URLROOT . '/public/img/icons/defaultoffice.svg'; ?>" id="friOffice">
                            </label>
                            <input type="radio" name="friday" id="fridayOffice" value="2" hidden>
                        </button>
                        <button type="button">
                            <label for="fridayHome">
                                <img src="<?php echo URLROOT . '/public/img/icons/bluehome.svg'; ?>" id="friHome">
                            </label>
                            <input type="radio" name="friday" id="fridayHome" value="1" checked hidden>
                        </button>
                    <?php elseif ($userSchedule->petak === "2"): ?>
                        <button type="button">
                            <label for="fridayOffice">
                                <img src="<?php echo URLROOT . '/public/img/icons/pinkoffice.svg'; ?>" id="friOffice">
                            </label>
                            <input type="radio" name="friday" id="fridayOffice" value="2" checked hidden>
                        </button>
                        <button type="button">
                            <label for="fridayHome">
                                <img src="<?php echo URLROOT . '/public/img/icons/defaulthome.svg'; ?>" id="friHome">
                            </label>
                            <input type="radio" name="friday" id="fridayHome" value="1" hidden>
                        </button>
                    <?php endif; ?>
                <?php else: ?>
                    <button type="button">
                        <label for="fridayOffice">
                            <img src="<?php echo URLROOT . '/public/img/icons/defaultoffice.svg'; ?>" id="friOffice">
                        </label>
                        <input type="radio" name="friday" id="fridayOffice" value="2" hidden>
                    </button>
                    <button type="button">
                        <label for="fridayHome">
                            <img src="<?php echo URLROOT . '/public/img/icons/defaulthome.svg'; ?>" id="friHome">
                        </label>
                        <input type="radio" name="friday" id="fridayHome" value="1" hidden>
                    </button>
                <?php endif; ?>
            </div>
        </li>
    </ul>
    <?php if (isset($userSchedule)): ?>
        <input type="hidden" id="userid" name="userId" value="<?php echo $userSchedule->id_zaposlen; ?>">
    <?php endif; ?>
    <button type="submit" id="submitSchedule" class="btn btn-primary">Sačuvaj</button>
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
<script type="module" src="<?php echo URLROOT; ?>/public/js/scripts/checkinApp.js"></script>
</html>