<nav class="navbar navbar-dark bg-dark navbar-expand-md p-2 fixed-top">
    <div class="container">
        <a href="/bizkod/home"><img src='<?= URLROOT."public/img/infostud.png" ?>' alt="Infostud Logo" style="width: 150px"></a>
        <button class="navbar-toggler ml-auto m-2" data-toggle="collapse" data-target="#navbarNav">
            <span class=" navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav d-flex w-100">
                <li class="nav-item m-2">
                    <a class="nav-link font-weight-bold text-light" href="/bizkod/team">Moj tim</a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link font-weight-bold text-light" href="/bizkod/checkin/0">Prijava za raspored</a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link font-weight-bold text-light" href="/bizkod/info">Vesti</a>
                </li>
                <li class="nav-item m-2">
                    <a class="nav-link font-weight-bold text-light" href="/bizkod/profile">Profil</a>
                </li>
                <?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                if(isset($_SESSION["user"]) && $_SESSION["user"]["role"] === "1"): ?>
                <li class="nav-item m-2">
                    <a class="nav-link font-weight-bold text-light" href="/bizkod/statspage">Statistika</a>
                </li>
                <?php endif; ?>
                <li class="nav-item m-2">
                    <a class="nav-link font-weight-bold text-light" href="/bizkod/logout">Izloguj se</a>
                </li>
            </ul>
        </div>
    </div>
</nav>