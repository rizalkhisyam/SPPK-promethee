<div class="container">

	<div class="row">
		<div class="col-md-6">
			<?php Flasher::flash(); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<button type="button" class="btn btn-info btn-lg tambahdataMHS" data-toggle="modal" data-target="#myModal">Tambah Mahasiswa</button>

			<h3>Daftar Mahasiswa</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<form action="<?php echo BASEURL ?>/mahasiswa/cari" method="post">
				<div class="input-group">
					<input type="text" class="form-control" id="keyword" name="keyword" autocomplete="off" placeholder="Cari...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">Go!</button>
					</span>
				</div><!-- /input-group -->
			</form>
		</div><!-- /.col-lg-6 -->
	</div>

	<div class="row" style="margin-top: 25px;">
		<div class="col-md-6">

			<?php foreach ($data['mhs'] as $mhs) { ?>
				<ul class="list-group">
					<li class="list-group-item">
						<span class="badge" style="background-color: red"><a href="<?php echo BASEURL; ?>/mahasiswa/delete/<?php echo $mhs['id'] ?>" style="color: white" onclick="return confirm('yakin?')">Delete</a></span>
						<span class="badge" style="background-color: green"><a href="#!" class="modalUbah" data-toggle="modal" data-target="#myModal" style="color: white" data-id="<?php echo $mhs['id'] ?>">Edit</a></span>
						<span class="badge" style="background-color: #0087ff"><a href="<?php echo BASEURL; ?>/mahasiswa/detail/<?php echo $mhs['id'] ?>" style="color: white">Detail</a></span>
						<?php echo $mhs['nama'] ?>
					</li>
				</ul>
			<?php } ?>

		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-md">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Mahasiswa</h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo BASEURL ?>/mahasiswa/tambah" method="POST">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label>Nama</label>
						<input class="form-control" type="text" id="nama" name="nama">
					</div>
					<div class="form-group">
						<label>Nim</label>
						<input class="form-control" type="text" id="nim" name="nim">
					</div>
					<div class="form-group">
						<label>Jurusan</label>
						<select name="jurusan" id="jurusan" class="form-control">
							<option value="Informatika">Informatika</option>
							<option value="Sistem Informasi">Sistem Informasi</option>
							<option value="Teknik Informatika">Teknik Informatika</option>
						</select>
					</div>
					<div class="form-group">
						<label>Hoby</label>
						<input class="form-control" id="hoby" type="text" name="hoby">
					</div>
					<button type="submit" class="btn btn-info tombolUbah">Tambah</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>