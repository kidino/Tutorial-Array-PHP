<?php

include('table-array.php');

$semua_penduduk = read_file('#', 'penduduk.txt');
$penduduk_status = group_by('Warga', $semua_penduduk);

$group_table = bina_table2($penduduk_status);


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

echo $group_table;

?>