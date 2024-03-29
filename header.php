<?php
    require_once('libs/inwentarz-lib.php');
    require_once('libs/pracownie-lib.php');
    require_once('libs/stanowisko-lib.php');
    require_once('admin/admin.php');
    $inwentarz = new Inwentarz();
    $pracownie = new Pracownie();
    $stanowisko = new Stanowisko();
    $admin = new Admin();

    session_start();
    if(isset($_SESSION['zalogowany']) != "1") {
        header("Location: index.php");
    }

    $dane_usera = $inwentarz->daneZalogowanego();
?>
<!docType HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Inwentarz dla szkoły <?php $inwentarz->nazwaSzkoly(); ?></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/panel.css">
    <link rel="stylesheet" type="text/css" href="css/powiadomienia.css">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/inwentarz.js"></script>
</head>
<body>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="szkola">
                    <p>Inwentarz sprzętu komputerowego szkoły: <?php $inwentarz->nazwaSzkoly(); ?></p>
                </div>
            </div>
        </div>
        <div class="row oddziel">
            <div class="col-md-4">
                <div class="dane-uzytkownika kafelek brazowy">
                    <p class="srodkuj">Witaj <br><?php echo $dane_usera['imie']; ?> <?php echo $dane_usera['nazwisko'];?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="powiadomienie bialy">
                    <?php $ile = $pracownie->iloscPracowni();
                    if ($ile == 0) { echo '
                            <section class="notif notif-warning">
                                <h6 class="notif-title">Nie znalezniono pracowni!</h6>
                                <p>W bazie nie znaleziono żadnej pracowni!</p>
                            </section>';
                    } else { ?>
                        <section class="notif notif-notice">
                            <h6 class="notif-title">Znaleziono pracownie!</h6>
                            <p>W bazie znaleziono  <?php if($ile == 1 || $ile == 2 || $ile == 3 || $ile == 4) {echo $ile.' pracownie';} else {echo $ile.' pracownii';}?></p>
                        </section>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="uprawnienia kafelek czerwony">
                    <p class="uprawnienie srodkuj">Rola: <?php $inwentarz->rolaUsera();?></p>
                </div>
            </div>
        </div>
    </div>
</header>
<acticle>
    <div class="container oddziel">
        <div class="row odstep">
            <div class="col-md-4">
                <div class="edytuj-profil kafelek niebieski">
                    <a href="konto.php">
                        <p class="srodek">Informacje o twoim koncie</p>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wyloguj kafelek zolty">
                    <?php $inwentarz->wyloguj();?>
                    <a href="?id=wyloguj">
                        <p>Wyloguj się</p>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="lista-userow kafelek zielony">
                    <a href="panel.php">
                        <p>Strona główna</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="row odstep">
            <div class="col-md-4">
                <div class="o-projekcie kafelek pomaranczowy">
                    <a href="oprojekcie.php">
                        <p>O Projekcie</p>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="changelog kafelek fioletowy">
                    <a href="changelog.php">
                        <p>Lista zmian</p>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="to-do-list kafelek morski">
                    <a href="#">
                        <p>Statystyki</p>
                    </a>
                </div>
            </div>
        </div>
    </div>