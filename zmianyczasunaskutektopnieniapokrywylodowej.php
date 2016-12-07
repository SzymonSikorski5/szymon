<?php
$zob=$aukcja['a_czaswygasania'];
$mib=$aukcja['a_minelo'];
$zo=$zob*3600;
$mi=$mib*3600;
$wstawionobaza=$aukcja['a_dodano'];
$wstawiono=$wstawionobaza;
$czasserwera=date('Y-m-d H:i:s');
$wynik=$czasserwera-$wstawiono;
$godzina=$wynik;
echo $wynik;
if($zo>0){
    $zostalo=$zo-$godzina;
    $minelo=$mi+$godzina;
    if($aukcja['r_id']==3){
        $cenabazowa=$aukcja['a_cenabazowa'];
        $mnoznik='0.9';
        $cena=$cenabazowa*$czaswwyniku*$mnoznik;
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