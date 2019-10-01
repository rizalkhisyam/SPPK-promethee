<div class="head-content-admin">
	<h2>Daftar Pengajuan Bantuan Pengadaan Bibit ikan</h2>
	<div class="table-responsive">          
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Nama</th>
					<th>Foto</th>
					<th>Ktp</th>
					<th>Surat Izin Kelompok</th>
					<th>Kartu Tanda Nelayan</th>
					<th>Ukuran Keramba</th>
					<th>Jumlah Kelompok</th>
					<th>Cara Pembenihan Ikan yang Baik (Sertifikat)</th>
					<th>Cara Budidaya Bibit (Sertifikat)</th>
					<th>Status</th>
					<th>Kode Unik</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data['user'] as $user): ?>
					<tr>
						<td><?php echo $data['no']++ ?></td>
						<td><?php echo $user['nama'] ?></td>
						<td>
							<div id="image-foto">
								<img src="<?php echo BASEURL; ?>/image/projek/<?php echo $user['foto'] ?>" alt="">
							</div>
						</td>
						<td>
							<div id="image-foto">
								<img src="<?php echo BASEURL; ?>/image/projek/<?php echo $user['ktp'] ?>" alt="">
							</div>
						</td>
						<td>
							<?php 
							if ($user['sik'] == 1) {
								echo "Ada surat Izin";
							}else{
								echo "Satu atau beberapa Memiliki surat izin";
							}
							?>
						</td>
						<td>
							<?php 
							if ($user['ktn'] == 1) {
								echo "Ada Kartu tanda Nelayan";
							}else{
								echo "Tidak ada Kartu tanda Nelayan";
							}
							?>
						</td>
						<td>
							<?php 
							if ($user['uk'] == 0) {
								echo "3 X 3 kurang dari 2 Kotak";
							}else if($user['uk'] == 1){
								echo "3 X 3 sebanyak 2 Kotak";
							}else if($user['uk'] == 2){
								echo "3 X 3 sebanyak 3 Kotak";
							}else{
								echo "3 X 3 sebanyak 4 Kotak";
							}
							?>
						</td>
						<td>
							<?php 
							if ($user['jk'] == 0) {
								echo "< 5 Orang";
							}else if($user['jk'] == 1){
								echo "5 - 7 Orang";
							}else if($user['jk'] == 2){
								echo "8 - 10 Orang";
							}else{
								echo "11 - 12 Orang";
							}
							?>
						</td>
						<td>
							<?php 
							if ($user['cpib'] == 1) {
								echo "Lengkap";
							}else{
								echo "1 atau beberapa";
							}
							?>
						</td>
						<td>
							<?php 
							if ($user['cbb'] == 1) {
								echo "Lengkap";
							}else{
								echo "1 atau beberapa";
							}
							?>
						</td>
						<td>
							<?php echo $user['status'];?>
						</td>
						<td>
							<?php echo $user['kodeunik'];?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>