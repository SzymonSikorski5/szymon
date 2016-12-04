<?php
        $sesja = mysqli_num_rows($logowanie);
        if ($sesja!=0){
            while ($stworzsesje = mysqli_fetch_assoc($logowanie)){
                $ASid = $stworzsesje['u_id']; $_SESSION['id'] = $ASid;
                $ASemail = $stworzsesje['u_email']; $_SESSION['email'] = $ASemail;
                $ASnick = $stworzsesje['u_nick']; $_SESSION['nick'] = $ASnick;
                $AShaslo = $stworzsesje['u_haslo']; $_SESSION['haslo'] = $AShaslo;
                $ASimie = $stworzsesje['u_imie']; $_SESSION['imie'] = $ASimie;
                $ASnazwisko = $stworzsesje['u_nazwisko']; $_SESSION['nazwisko'] = $ASnazwisko;
                header('location: index.php');
            }
        }
?>
