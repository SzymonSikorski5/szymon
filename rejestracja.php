<html ng-app="SrsApp">
    <head ng-controller="SrsHead">
        <meta charset="UTF-8">
        <title>{{Rejestracja}}</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
		<script src="js/srs.js"></script>
    </head>
    <body>
		<form action='rejestracjadane.php' method='post'>
			email: 
			<input type="text" id="email" class="" name="email" required><br>
			nick: 
			<input type="text" id="nick" class="" name="nick" required><br>
			haslo: 
			<input type="text" id="haslo" class="" name="haslo" required><br>
			powtórz haslo:
			<input type="text" id="powtorzhaslo" class="" name="powtorzhaslo" required><br>
			imie: 
			<input type="text" id="imie" class="" name="imie" required><br>
			nazwisko: 
			<input type="text" id="nazw" class="" name="nazwisko" required><br>
			<input type="submit" id="submit" class="" name="zarejestruj" value="Zarejestruj">
		</form>
       
        
    </body>
</html>
