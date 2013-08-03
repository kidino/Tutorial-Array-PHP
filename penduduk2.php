<?php

$group = $_GET['group'];

include('table-array.php');

$semua_penduduk = read_file('#', 'penduduk.txt');

/* MEMBINA LINK UNTUK GROUPING */
$key_table = "<table>";
$key_table .= "<tr><td><strong>Susunan</strong></td></tr>";
$key_table .= "<tr><td><a href='penduduk2.php'>[ tiada ]</a></td></tr>";
foreach($semua_penduduk as $penduduk) {
	foreach(array_keys($penduduk) as $thekey) {
		$key_table .= "<tr><td><a href='penduduk2.php?group=$thekey'>$thekey</a></td></tr>";
	}
	break;
}
$key_table .= "</table>";


if ($group != '') { 
	$penduduk_status = group_by($group, $semua_penduduk);
	$group_table = bina_table2($penduduk_status);
} else {
	$group_table = bina_table1($semua_penduduk);
}

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
		border-left: 1px solid #333;
		border-top: 1px solid #333;
	}

	table th, table td {
		padding: 3px 5px;
		border-right: 1px solid #333;
		border-bottom: 1px solid #333;
	}
</style>

<?php

echo $key_table;
echo $group_table;

?>