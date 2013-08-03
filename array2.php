<?php
    $p = file('pelajar.txt');
    
    foreach($p as $kekunci => $nilai) {
        
        $p1 = explode('|', trim($nilai));

        if ($kekunci == 0) {
            $k0 = $p1[0]; // Nama
            $k1 = $p1[1]; // Tahun
            $k2 = $p1[2]; // Rumah Sukan
        } else {
            $pelajar[$k0] = $p1[0]; // $pelajar['Nama']
            $pelajar[$k1] = $p1[1]; // $pelajar['Tahun']
            $pelajar[$k2] = $p1[2]; // $pelajar['Rumah Sukan']
            
            $semua_pelajar[] = $pelajar;
        }

    }

    echo "<pre>";
    print_r($semua_pelajar);
    echo "</pre>";
    
    /* ==== */
    
    foreach($semua_pelajar as $pelajar) {
        $rumah_sukan[$pelajar['Rumah Sukan']][] = $pelajar;
    }

    echo "<br>=====================================<br>";

    echo "<pre>";
    print_r($rumah_sukan);
    echo "</pre>";

    /* ==== */
    
    foreach($semua_pelajar as $pelajar) {
        $pelajar_tahun[$pelajar['Tahun']][] = $pelajar;
    }

    echo "<br>=====================================<br>";

    echo "<pre>";
    print_r($pelajar_tahun);
    echo "</pre>";

?>
