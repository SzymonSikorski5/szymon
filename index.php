<html ng-app="SrsApp">
    <head ng-controller="SrsHead">
        <meta charset="UTF-8">
        <title>{{Index}}</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="js/srs.js"></script>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
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
        <li><a href="">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="dodaj.php">Dodaj przedmiot</a></li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Szukaj">
        </div>
        <button type="submit" class="btn btn-danger">Szukaj</button>
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
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?php
                        include 'host.php';
                        $aukcje = mysqli_query($polacz,"SELECT * FROM aukcje INNER JOIN uzytkownicy ON aukcje.u_id=uzytkownicy.u_id ORDER BY aukcje.a_id desc") or die ('nie udało się wyświetlić. Wróć tutaj za kilka minut.');
                        while($wyswietl = mysqli_fetch_array($aukcje)){
                            echo "<div class='aukcja'><div class='naglowek'><h3><a href='produkt.php?a_id=".$wyswietl['a_id']."'>".$wyswietl['a_tytul']."</a></h3> <h5>Cena: ".$wyswietl['a_cenabazowa']."</h5></div><br>";
                            echo "<div class='informacje'> Dodał: ".$wyswietl['u_nick']." Data dodania: ".$wyswietl['a_dodano']."</div></div></br>";
                        }
                    ?>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </body>
</html>