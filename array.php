<?php

    $pelajar[0]['nama'] = 'Ali';
    $pelajar[0]['umur'] = 10;
    $pelajar[0]['kelas'] = '6 Merah';

    $pelajar[1]['nama'] = 'Ah Chong';
    $pelajar[1]['umur'] = 11;
    $pelajar[1]['kelas'] = '6 Hijau';

    for($i = 0; $i < count($pelajar); $i++) {
        foreach($pelajar[$i] as $kekunci => $nilai) {
            echo $kekunci .': '. $nilai .'<br>';            
        }
        
        echo '======================== <br>';
    }
    
?>
