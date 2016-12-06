<?php
    session_start();
    if($_SESSION['id']){
        include 'host.php';
        $nraukcji=$_GET['a_id'];
        $rodzaj=$_GET['r_id'];
        $wybierzprodukt = mysqli_query($polacz,"SELECT * FROM aukcje WHERE a_id=$nraukcji");
        $aukcja = mysqli_fetch_array($wybierzprodukt);
        $autorid = $aukcja['u_id'];
        $zwyciezca = $_SESSION['id'];
        $wybierzautora = mysqli_query($polacz,"SELECT * FROM uzytkownicy WHERE u_id=$autorid");
        $autor = mysqli_fetch_array($wybierzautora);
        $zakoncz = mysqli_query($polacz,"UPDATE aukcje SET a_stanaukcji='1' WHERE a_id='$nraukcji'");
        header('location: gratulacje.php?a_id='.$nraukcji.'');
    }
    else{
        header('location: logowanie.php');
    }
?>