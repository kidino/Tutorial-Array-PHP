<?php

include('table-array.php');

$semua_penduduk = read_file('#', 'penduduk.txt');
$penduduk_status = group_by('Status', $semua_penduduk);

$penduduk_table = bina_table2($penduduk_status);

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

echo $penduduk_table;

?>