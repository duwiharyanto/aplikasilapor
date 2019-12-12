<!DOCTYPE html>
<html>
<head>
	<title><?= ucwords('Laporan Presensi '.$kegiatan->kegiatan_nama)?></title>
</head>
<style type="text/css">
	.withborder, table {
	    border-collapse: collapse;
	}

	.withborder  td, th {
	    border: 1px solid black;
	}
</style>
<body>
<table width="100%" class="noborder">
	<tr>
		<td colspan="2" align="center"><h2><?= ucwords('Laporan Presensi '.$kegiatan->kegiatan_nama)?></h2></td>
	</tr>
	<tr>
		<td width="70%">
			<table width="100%" class="noborder">
				<tr>
					<td width="20%" align="left"><b>Kegiatan</b></td>
					<td width="30%" align="left">: <?= ucwords($kegiatan->kegiatan_nama)?></td>
				</tr>
				<tr>
					<td width="20%" align="left"><b>Tanggal Kegiatan</b></td>
					<td width="30%" align="left">: <?= date('d-m-Y',strtotime($kegiatan->kegiatan_date))?></td>
				</tr>
				<tr>
					<td width="20%" align="left"><b>Keterangan</b></td>
					<td width="30%" align="left">: <?= ucwords($kegiatan->kegiatan_keterangan)?></td>
				</tr>	
			</table>			
		</td>
		<td rowspan="2" width="30%" align="right"><img src="<?=$qrcode?>" style="width:90px;height:90px"></td>
	</tr>
</table>
<div style="height:50px"></div>
<table width="100%" class="withborder">
	<tr>
		<th width="10%">No</th>
		<th width="30%">Nama</th>
		<th width="30%">Email</th>
		<th width="30%">No. Telp</th>	
	</tr>
	<?php $i=1;foreach($data AS $row):?>
		<tr>
			<td><?=$i?></td>
			<td><?=ucwords($row->bukutamu_nama)?></td>
			<td><?= $row->bukutamu_email?></td>
			<td><?= $row->bukutamu_notlp?></td>
		</tr>
	<?php $i++;endforeach;?>
</table>
</body>
</html>