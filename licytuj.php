<?php
    session_start();
    if($_SESSION['id']){
        include 'host.php';
        $nraukcji=$_GET['a_id'];
        $rodzaj=$_GET['r_id'];
        $kwota=strip_tags($_POST['kwota']);
        $wybierzprodukt = mysqli_query($polacz,"SELECT * FROM aukcje WHERE a_id=$nraukcji");
        $aukcja = mysqli_fetch_array($wybierzprodukt);
        $autorid = $aukcja['u_id'];
        $zwyciezca = $_SESSION['id'];
        $wybierzautora = mysqli_query($polacz,"SELECT * FROM uzytkownicy WHERE u_id=$autorid");
        $autor = mysqli_fetch_array($wybierzautora);
        $aktualnakwota = $aukcja['a_kwota'];
        if($kwota>$aktualnakwota){
            $przebij = mysqli_query($polacz,"UPDATE aukcje SET a_kwota='$kwota',a_zwyciezca='$zwyciezca' WHERE a_id='$nraukcji'");
        }
        header('location: produkt.php?a_id='.$nraukcji.'');
    }
    else{
        header('location: logowanie.php');
    }
?>