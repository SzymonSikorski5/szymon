<?php
    session_start();
    include 'host.php';
    $nraukcji=$_GET['a_id'];
    $wybierzprodukt = mysqli_query($polacz,"SELECT * FROM aukcje WHERE a_id=$nraukcji");
    $aukcja = mysqli_fetch_array($wybierzprodukt);
    $autorid = $aukcja['u_id'];
    $wybierzautora = mysqli_query($polacz,"SELECT * FROM uzytkownicy WHERE u_id=$autorid");
    $autor = mysqli_fetch_array($wybierzautora);
    $przebijajacy=$aukcja['a_zwyciezca'];
    $licytujacy = mysqli_query($polacz,"SELECT * FROM uzytkownicy WHERE u_id=$przebijajacy");
    $tenlicytujacy = mysqli_fetch_array($licytujacy);
?>
<html ng-app="SrsApp">
    <head ng-controller="SrsHead">
        <meta charset="UTF-8">
        <title>{{Produkt}}: <?php echo $aukcja['a_tytul']; ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="js/srs.js"></script>
        <link rel="stylesheet" href="css/produkt.css">
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
        </nav>
        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php echo $aukcja['a_tytul']; ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Dodano przez: <?php echo $autor['u_nick']; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Data dodania: <?php echo $aukcja['a_dodano']; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo "<img class='zdjecie' src='".$aukcja['a_zdjecie']."'>";?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <p><h2>Szczegóły/opis przedmiotu aukcji</h2></p><br>
                    <p><?php echo $aukcja['a_opis']; ?></p>
                </div>
                <div class="col-md-2">
                    
                    <?php
                        include 'zmianyczasunaskutektopnieniapokrywylodowej.php';
                        if($aukcja['r_id']==2){
                            echo '
                                <form method="POST" action="licytuj.php?a_id='.$aukcja['a_id'].'&r_id='.$aukcja['r_id'].'">
                                Kwota: <input type="text" name="kwota" placeholder="';if($aukcja['a_zwyciezca']!=0){echo ''.$tenlicytujacy['u_nick'].': ';}echo $aukcja['a_kwota'].' PLN"><br>
                                <input type="submit" class="btn btn-danger" name="przebij" value="przebij!">
                                </form>
                            ';
                        }
                        echo'<a href="kup.php?a_id='.$aukcja['a_id'].'&r_id='.$aukcja['r_id'].'">';
                        if($aukcja['r_id']==1){
                            echo '<button class="btn btn-danger">Kup: '.$aukcja['a_cenabazowa'].' PLN</button>';
                        }
                        if($aukcja['r_id']==2){
                            echo '<button class="btn btn-danger">Kup teraz: '.$aukcja['a_cenabazowa'].' PLN</button>';
                        }
                        if($aukcja['r_id']==3){
                            echo '<button class="btn btn-danger">Kup teraz: '.$aukcja['a_cenabazowa'].' PLN</button>';
                        }
                        echo '</a>';
                    ?>
                    <br><br><br><br>
                    <script id="cid0020000142107517861" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 215px;height: 350px;">{"handle":"projektprogramowanie","arch":"js","styles":{"a":"990000","b":100,"c":"FFFFFF","d":"FFFFFF","k":"990000","l":"990000","m":"990000","n":"FFFFFF","p":"10","q":"990000","r":100,"usricon":0,"fwtickm":1}}</script>
                </div>
            </div>
        </div>
    </body>
</html>