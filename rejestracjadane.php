<?php
	session_start();
	$submit = $_POST['zarejestruj'];
	$email = strip_tags($_POST['email']);
	$nick = strip_tags($_POST['nick']);
	$haslo = strip_tags($_POST['haslo']);
	$powtorzhaslo = strip_tags($_POST['powtorzhaslo']);
	$imie = strip_tags($_POST['imie']);
	$nazwisko = strip_tags($_POST['nazwisko']);
	if ($submit&&$email&&$nick&&$haslo&&$powtorzhaslo&&$imie&&$nazwisko){
		if($haslo==$powtorzhaslo){
			$polacz = mysqli_connect('localhost','root','','srs') or die ('Wystąpił problem podczas łączenia z bazą');
			$sprawdzemail = mysqli_query($polacz,"SELECT `u_email` FROM `uzytkownicy` WHERE `u_email`='".$email."'");
			if(mysqli_num_rows($sprawdzemail)){
				echo "Ten email jest już zajęty";
				header('location: rejestracja.php');
				mysqli_close($polacz);
			}
			else{
				$query = mysqli_query($polacz,"INSERT INTO uzytkownicy (u_email,u_nick,u_haslo,u_imie,u_nazwisko) VALUES ('$email','$nick','$haslo','$imie','$nazwisko')");
				header('location: index.php');
				mysqli_close($polacz);
			}
		}
		else{
			echo "Hasła nie są takie same";
			header('location: rejestracja.php');
		}
	}
?>