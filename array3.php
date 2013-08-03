<?php

// BACA DATA DARI FAIL DAN MEMBINA ARRAY
function read_file($char, $filename) {
    $p = file($filename);
    $all_data = array();
    foreach($p as $kekunci => $nilai) {
        $p1 = explode($char, trim($nilai));
        if ($kekunci == 0) {
			$mainkey = $p1;
        } else {
			foreach($p1 as $key => $thevalue) {
				$single_row[$mainkey[$key]] = $p1[$key];
			}            
            $all_data[] = $single_row;
        }
    }
	return $all_data;
}

// MEMBUAT ARRAY GROUPING
function group_by($key, $array_data) {
    foreach($array_data as $single_row) {
		$temp_key = $single_row[$key];
		unset($single_row[$key]);
        $group_array[$temp_key][] = $single_row;
    }
	return $group_array;
}

// BINA TABLE UNTUK ARRAY SATU LAPIS
function bina_table1($senarai) {
	$table_data = "<table border='1' width='300'>\r\n";
	
	$pembilang = 0;
	foreach($senarai as $item) {
		if($pembilang == 0) {
			$table_data .= "<tr><th>bil</th>";
			foreach(array_keys($item) as $table_key) {
				$table_data .= "<th>$table_key</th>";
			}
			$table_data .= "</tr>\r\n";
		}
				
		$pembilang++;
		$table_data .= "<tr>";
		$table_data .= "<td>$pembilang</td>";
		foreach ($item as $nilai) {
			$table_data .= "<td>$nilai</td>";
		}
		$table_data .= "</tr>\r\n";
	}
	$table_data .= "</table>\r\n";
	return $table_data;
}

// BINA TABLE UNTUK ARRAY DUA LAPIS
function bina_table2($senarai) {
	$table_data = "<table border='1' width='300'>\r\n";
	$pembilang = 0;
	foreach($senarai as $kumpulan => $senarai) {
		$pembilang2 = 0;
		foreach($senarai as $p => $item) {
			if ($pembilang == 0) {
				$table_data .= "<tr><th>bil</th>";
				foreach(array_keys($item) as $table_key) {
					$table_data .= "<th>$table_key</th>";
				}
				$table_data .= "</tr>\r\n";
				
				$colspan = count(array_keys($item)) + 1;
			}

			if ($pembilang2 == 0) {
			$table_data .= "<tr><td colspan='$colspan' class='group'>$kumpulan</td></tr>";
			}
			
			$pembilang2++;
			$pembilang++;
			$table_data .= "<tr>";
			$table_data .= "<td>$pembilang</td>";
			foreach($item as $nilai) {
				$table_data .= "<td>$nilai</td>";
			}
			$table_data .= "</tr>\r\n";
		}
	}
	$table_data .= "</table>\r\n";
	return $table_data;
}

$semua_pelajar = read_file('|', 'pelajar.txt');
$pelajar_tahun = group_by('Tahun', $semua_pelajar);
$rumah_sukan = group_by('Rumah Sukan', $semua_pelajar);

$table_pelajar = bina_table1($semua_pelajar);
$table_tahun = bina_table2($pelajar_tahun);
$table_sukan = bina_table2($rumah_sukan);

?>

<style>
	table td.group {
		background-color: #f0f0f0;
		font-weight: bold;
	}
	table th {
		background-color: #c0c0c0;
	}
	table {
		float: left;
		margin-right: 10px;
		border-collapse: collapse;
	}
</style>

<?php

echo $table_pelajar;
echo $table_tahun;
echo $table_sukan;


?>