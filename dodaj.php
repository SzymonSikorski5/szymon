<?php
    session_start();
    error_reporting(0);
    if (!$_SESSION['u_email']){
        header('location: logowanie.php');
    }
?>
<html ng-app="SrsApp">
    <head ng-controller="SrsHead">
        <meta charset="UTF-8">
        <title>{{Dodaj}}</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
	<script src="js/srs.js"></script>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" id="" class="" name="email" required>
            <input type="text" id="" class="" name="haslo" required>
            <input type="submit" id="" class="" name="dodaj" value="Stwórz aukcję">
	</form>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                session_start();
                $submit = $_POST['zaloguj'];
                $email = strip_tags($_POST['email']);
                $haslo = strip_tags($_POST['haslo']);
                if ($submit&&$email&&$haslo){
                    $polacz = mysqli_connect('localhost','root','','srs') or die ('Wystąpił problem podczas łączenia z bazą');
                    $logowanie = mysqli_query($polacz,"SELECT * FROM `uzytkownicy` WHERE `u_email`='".$email."'");
                    include 'sesjaphp.php';
                }
            }
        ?>
    </body>
</html>