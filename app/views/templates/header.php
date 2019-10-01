<!DOCTYPE html>
<html>
<head>
	<title><?php echo $data['judul'] ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/toastr.min.css">

	<style type="text/css">
		<?php 
	$hitung =0;
	foreach ($data['user'] as $user): ?>
		<?php foreach ($data['user'] as $lawan): ?>
			<?php if ($user['id'] != $lawan['id']) {
				$hitung++;
			} ?>
		<?php endforeach ?>
		#table-preferensi tr:nth-child(<?php echo $hitung ?>){
			border-bottom: solid;
		}
	<?php endforeach ?>
	</style>
</head>
<body>


	<?php Flasher::flash(); ?>
	<?php if (!empty($data['admin'])): ?>
		<?php if ($data['admin'] == 'admin'): ?>
			<div class="grup-all-admin-content">
				<div class="grup-detail-admin-content">
					<h1>Dinas Kelautan Dan Perikanan</h1>
					<p>Sistem Pendukung Keputusan Pemberian Bantuan Bibit Ikan kepada Nelayan oleh Dinas Kelautan dan Perikanan dengan menggunakan METODE PROMETHEE</p>
				</div>
				
				<div class="sidebar" id="sidebar-nav">
					<a id="dashboard" href="<?php echo BASEURL; ?>/Admin/dashboard"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
					<a id="DaftarPengajuan" href="<?php echo BASEURL; ?>/Admin/DaftarPengajuan"><i class="fa fa-list" aria-hidden="true"></i> Dafar User</a>
					<a id="DetailPenghitungan" href="<?php echo BASEURL; ?>/Admin/DetailPenghitungan"><i class="fa fa-balance-scale" aria-hidden="true"></i> Detail Penghitungan</a>
					<a id="Seleksi" href="<?php echo BASEURL; ?>/Admin/Seleksi"><i class="fa fa-database" aria-hidden="true"></i> Seleksi Pengajuan</a>
					<a id="btnSidebar" href="<?php echo BASEURL; ?>/Admin/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
				</div>

				<div class="content">
				<?php endif ?>
			<?php endif ?>


