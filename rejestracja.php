<?php
    session_start();
    error_reporting(0);
    if ($_SESSION['email']){
        header('location: index.php');
    }
?>
<html ng-app="SrsApp">
    <head ng-controller="SrsHead">
        <meta charset="UTF-8">
        <title>{{Rejestracja}}</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="js/srs.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse ">
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
                </form>
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php
                      session_start();
                      if(isset($_SESSION['email'])){
                          echo $_SESSION['imie'].'<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="wylogowywanie.php">Wyloguj się</a></li>
                    </ul>';
                      }
                      else{
                          echo 'Witaj'.'<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="logowanie.php">Zaloguj się</a></li>
                    </ul>';
                      }
                  ?>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <form action='rejestracjadane.php' method='post'>
			email:<br> 
			<input type="text" id="email" class="" name="email" required><br>
			nick: <br>
			<input type="text" id="nick" class="" name="nick" required><br>
			haslo: <br>
			<input type="password" id="haslo" class="" name="haslo" required><br>
			powtórz haslo:<br>
			<input type="password" id="powtorzhaslo" class="" name="powtorzhaslo" required><br>
			imie: <br>
			<input type="text" id="imie" class="" name="imie" required><br>
			nazwisko: <br>
			<input type="text" id="nazw" class="" name="nazwisko" required><br>
			<br><input type="submit" id="submit" class="btn btn-success" name="zarejestruj" value="Zarejestruj">
                    </form>
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>
        </div>
    </body>
</html>