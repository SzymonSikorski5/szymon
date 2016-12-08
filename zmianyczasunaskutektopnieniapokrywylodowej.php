<?php
$zo=$aukcja['a_czaswygasania'];
$mi=$aukcja['a_minelo'];
$godzina='1';

if($zo>0){
    $zostalo=$zo-$godzina;
    $minelo=$mi+$godzina;
    if($aukcja['r_id']==3){
        $cenabazowa=$aukcja['a_cenabazowa'];
        $mnoznik='0.9';
        $cena=$cenabazowa*$mnoznik;
        $zmianaczasu = mysqli_query($polacz,"UPDATE aukcje SET a_cenabazowa='$cena',a_czaswygasania='$zostalo', a_minelo='$minelo' WHERE a_id=$nraukcji");
    }
    else {
        $zmianaczasu = mysqli_query($polacz,"UPDATE aukcje SET a_czaswygasania='$zostalo', a_minelo='$minelo' WHERE a_id=$nraukcji");
    }
}
if($zo==1){
    $czassieskonczyl = mysqli_query($polacz,"UPDATE aukcje SET a_stanaukcji='1' WHERE a_id=$nraukcji");
    header("location: index.php");
}
?>