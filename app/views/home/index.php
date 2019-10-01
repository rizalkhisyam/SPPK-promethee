<!DOCTYPE html>
<html>
<head>
	<title><?php echo $data['judul'] ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>/css/main.css">
	<style type="text/css">
	.alert {
		margin-bottom: 20px !important;
	}
</style>
</head>
<body>

	<div class="header-nav">
		<img src="<?php echo BASEURL; ?>/image/animals-fish-fishes-213399.jpg" alt="">
		<div class="header-first">
			<div class="grup-head">
				<h3>Dinas Kelautan Dan Perikanan</h3>
				<p style="text-transform:capitalize">Sistem Pendukung Keputusan Pemberian Bantuan Bibit Ikan kepada Nelayan oleh Dinas Kelautan dan Perikanan dengan menggunakan METODE PROMETHEE</p>
			</div>
			<div class="navigasi-nav">
				<a href="<?php echo BASEURL ?>">Dinas Kelautan Dan Perikanan</a>
			</div>
		</div>
		<div class="header-second">
			<div class="grup-daftar">
				<ul>
					<li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
					<li><a href="#menu2" data-toggle="tab"><i class="fa fa-plus" aria-hidden="true"></i> Pengajuan</a></li>
					<li><a href="#menu3" data-toggle="tab"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Check</a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php Flasher::flash(); ?>
	<div class="tab-content" style="background-color: #ab0d2e;display: inline-block;width: 100%;margin-top: -5px;">
		<div id="home" style="background-color: white" class="tab-pane fade in active">
			<div class="col-xs-12 col-sm-6">
				<div class="image-style">
					<img src="<?php echo BASEURL; ?>/image/101994-OM0XMB-226.png" alt="">
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="grup-detail-home">
					<h1>Dinas Kelautan Dan Perikanan</h1>
					<p>Dinas Kelautan dan Perikanan kota
						Kendari adalah sebuah instansi pemerintah
						yang bergerak di bidang perikanan dan
						kelautan. Instansi ini memiliki program
						pemberian bantuan kepada para nelayan
						seperti pengadaan bibit ikan dalam
						mengembangkan usaha produktif dibidang
						pembudidayaan ikan dalam rangka
						mendukung peningkatan produksi,
						kemampuan, pendapatan, dan penumbuhan
					wirausaha perikanan budidaya.</p>
				</div>
			</div>
		</div>
		<div id="menu2" style="background-color: white" class="tab-pane fade">
			<div class="grup-form-pengajuan">
				<h3>Pengajuan</h3>
				<form action="<?php echo BASEURL; ?>/User/dataUser" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" placeholder="Nama" class="form-control" name="nama" id="nama">
					</div>
					<div class="form-group">
						<label for="jurusan">Foto</label>
						<input type="file" style="font-size: 14px;" placeholder="foto" name="foto" class="form-control" id="jurusan">
					</div>
					<div class="form-group">
						<label for="jurusan">Ktp</label>
						<input type="file" style="font-size: 14px;" placeholder="ktp" name="ktp" class="form-control" id="jurusan">
					</div>
					<div class="form-group">
						<label for="jurusan">Surat Izin kelompok</label>
						<select name="sik" class="form-control">
							<option style="display:none">Pilih</option>
							<option value="1">Ada surat Izin</option>
							<option value="0">Satu atau beberapa Memiliki surat izin</option>
						</select>
					</div>
					<div class="form-group">
						<label for="jurusan">Kartu tanda Nelayan</label>
						<select name="ktn" class="form-control">
							<option style="display:none">Pilih</option>
							<option value="1">Ada Kartu tanda Nelayan</option>
							<option value="0">Tidak ada Kartu tanda Nelayan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="jurusan">Ukuran Keramba</label>
						<select name="keramba" class="form-control">
							<option style="display:none">Pilih</option>
							<option value="0">3 X 3 kurang dari 2 Kotak</option>
							<option value="1">3 X 3 sebanyak 2 Kotak</option>
							<option value="2">3 X 3 sebanyak 3 Kotak</option>
							<option value="3">3 X 3 sebanyak 4 Kotak</option>
						</select>
					</div>
					<div class="form-group">
						<label for="jurusan">Jumlah Kelompok</label>
						<select name="kelompok" class="form-control">
							<option style="display:none">Pilih</option>
							<option value="0"> < 5 Orang</option>
							<option value="1">5 - 7 Orang</option>
							<option value="2">8 - 10 Orang</option>
							<option value="3">11 - 12 Orang</option>
						</select>
					</div>
					<div class="form-group">
						<label for="jurusan">CPIB</label>
						<select name="cpib" class="form-control">
							<option style="display:none">Pilih</option>
							<option value="1">Lengkap</option>
							<option value="0">1 atau beberapa</option>
						</select>
					</div>
					<div class="form-group">
						<label for="jurusan">CBB</label>
						<select name="cbb" class="form-control">
							<option style="display:none">Pilih</option>
							<option value="1">Lengkap</option>
							<option value="0">1 atau beberapa</option>
						</select>
					</div>
					<button type="submit">Upload</button>
				</form>
			</div>
		</div>
		<div id="menu3" style="background-color: white" class="tab-pane fade">
			<div class="grup-form-pengajuan">
				<h3>Check Your Code</h3>
				<form action="<?php echo BASEURL; ?>/User/check" method="POST">
					<div class="form-group">
						<label for="code">Code Unik</label>
						<input type="text" placeholder="XHJS665G" name="code" style="text-transform: uppercase;" class="form-control" id="code">
					</div>
					<button type="submit">Check</button>
				</form>
			</div>
		</div>
	</div>
	<footer>
		<div class="footer-style">
			@Copyright 2018 - Salam Damai 
		</div>
	</footer>

	<script type="text/javascript" src="<?php echo BASEURL; ?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo BASEURL; ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo BASEURL; ?>/js/javascript.js"></script>
</body>
</html>