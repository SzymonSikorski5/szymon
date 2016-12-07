<?php
    session_start();
    error_reporting(0);
    if (!$_SESSION['email']){
        header('location: logowanie.php');
    }
?>
<html ng-app="SrsApp">
    <head ng-controller="SrsHead">
        <meta charset="UTF-8">
        <title>{{Dodaj}}</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="js/srs.js"></script>
        <link rel="stylesheet" href="css/dodaj.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SRS</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li><a href="dodaj.php">Dodaj przedmiot</a></li>
                </ul>
                <form class="navbar-form navbar-left">
                </form>
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php
                      session_start();
                      if(isset($_SESSION['email'])){
                          echo $_SESSION['nick'].'<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="wylogowywanie.php">Wyloguj się</a></li>
                    </ul>';
                      }
                      else{
                          echo 'Witaj'.'<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="rejestracja.php">Zarejestruj się</a></li>
                        <li><a href="logowanie.php">Zaloguj się</a></li>
                    </ul>';
                      }
                  ?>
                  </li>
                </ul>
              </div>
            </div>
        </nav><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST" enctype="multipart/form-data">
                        Tytuł:<br><input type="text" id="" class="" name="tytul" required><br>
                        Opis:<br><textarea id="" class="" name="opis" required></textarea><br>
                        Zdjęcie:<br><input type="file" name="zdjecie" id="" accept='image/*' required><br>
                        Cena minimalna:<br><input type="text" id="" class="" name="kwota" placeholder="Wymagane dla licytacji"><br>
                        Cena:<br><input type="text" id="" class="" name="cenabazowa" required><br>
                        Data wygaśnięcia:<br><input type="text" id="" class="" name="datawygasniecia"><br>
                        Wybierz typ aukcji:<br> 
                        <select name='rodzaj' required>
                            <option value="1">Aukcja klasyczna</option>
                            <option value="2">Aukcja z ceną minimalną</option>
                            <option value="3">Aukcja holenderska</option>
                        </select><br><br>
                        <input type="submit" id="" class="btn btn-success" name="dodaj" value="Stwórz aukcję">
                    </form>
                    <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST") {
                            session_start();
                            $submit = $_POST['dodaj'];
                            $tytul = strip_tags($_POST['tytul']);
                            $opis = strip_tags($_POST['opis']);
                            $path = 'zdjecia/';
                            $kwota = strip_tags($_POST['kwota']);
                            $cenabazowa = strip_tags($_POST['cenabazowa']);
                            $dodano = date("Y-m-d H:i:s");
                            $datawygasniecia = strip_tags($_POST['datawygasniecia']);
                            $r_id = ($_POST['rodzaj']);
                            $u_id = $_SESSION['id'];
                            
                            $zdjecie = $path.basename($_FILES['zdjecie']['name']);
                            move_uploaded_file($_FILES['zdjecie']['tmp_name'], $zdjecie);
                                    if ($r_id==1&&$submit&&$tytul&&$opis&&$zdjecie&&$cenabazowa&&$dodano&&$datawygasniecia){
                                        include 'host.php';
                                        $query = mysqli_query($polacz,"INSERT INTO aukcje (a_tytul,a_opis,a_zdjecie,a_cenabazowa,a_dodano,a_czaswygasania,a_minelo,u_id,r_id) VALUES ('$tytul','$opis','$zdjecie','$cenabazowa','$dodano','$datawygasniecia','0','$u_id','$r_id')");
                                        header('location: index.php');
                                        echo 'gratuluję';
                                    }
                                    if ($r_id==2&&$submit&&$tytul&&$opis&&$zdjecie&&$kwota&&$cenabazowa&&$dodano&&$datawygasniecia){
                                        include 'host.php';
                                        if($kwota==0){
                                            echo 'No nie';
                                        }
                                        $query = mysqli_query($polacz,"INSERT INTO aukcje (a_tytul,a_opis,a_zdjecie,a_kwota,a_cenabazowa,a_dodano,a_czaswygasania,a_minelo,u_id,r_id) VALUES ('$tytul','$opis','$zdjecie','$kwota','$cenabazowa','$dodano','$datawygasniecia','0','$u_id','$r_id')");
                                        header('location: index.php');
                                        echo 'gratuluję';
                                    }
                                    if ($r_id==3&&$submit&&$tytul&&$opis&&$zdjecie&&$cenabazowa&&$dodano&&$datawygasniecia){
                                        include 'host.php';
                                        $query = mysqli_query($polacz,"INSERT INTO aukcje (a_tytul,a_opis,a_zdjecie,a_cenabazowa,a_dodano,a_czaswygasania,a_minelo,u_id,r_id) VALUES ('$tytul','$opis','$zdjecie','$cenabazowa','$dodano','$datawygasniecia','0','$u_id','$r_id')");
                                        header('location: index.php');
                                        echo 'gratuluję';
                                    }
                                }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>