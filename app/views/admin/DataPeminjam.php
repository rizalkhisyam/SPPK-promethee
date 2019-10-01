<div class="head-content-admin">
	<h2>Daftar Seleksi Bantuan Pengadaan Bibit ikan</h2>
	<div class="table-responsive">          
		<table class="table">
			<thead>
				<tr>
					<th>Peringkat</th>
					<th>Nama</th>
					<th>Foto</th>
					<th>Ktp</th>
					<th>Leaving Flow</th>
					<th>Entering Flow</th>
					<th>Net Flow</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data['user'] as $user): ?>
					<tr id="idnya<?php echo $user['id'] ?>">
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
							<?php echo $user['lf'] ?>
						</td>
						<td>
							<?php echo $user['ef'] ?>
						</td>
						<td>
							<?php echo $user['nf'] ?>
						</td>
						<td>
							<select class="statusUser" data-id="<?php echo $user['id'] ?>">
								<option <?php if($user['status'] == 'diproses') echo 'selected="selected"'; ?> value="diproses">diproses</option>
								<option <?php if($user['status'] == 'diterima') echo 'selected="selected"'; ?> value="diterima">diterima</option>
								<option <?php if($user['status'] == 'ditolak') echo 'selected="selected"'; ?> value="ditolak">ditolak</option>
							</select>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

