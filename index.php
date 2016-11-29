<html ng-app="SrsApp">
    <head ng-controller="SrsHead">
        <meta charset="UTF-8">
        <title>{{Index}}</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
	<script src="js/srs.js"></script>
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['email'])){
                echo $_SESSION['imie'];
            }
        ?>
    </body>
</html>
