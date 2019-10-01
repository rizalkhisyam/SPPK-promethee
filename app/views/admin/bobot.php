<div class="head-content-admin">
	<h2>Penghitungan dengan Metode PROMETHEE</h2>

	<div class="table-responsive">          
		<table class="table">
			<tr>
				<th>Nama</th>
				<?php foreach ($data['user'] as $user): ?>
					<td><?php echo $user['nama'] ?></td>
				<?php endforeach ?>
			</tr>
			<tr>
				<th>Surat Izin Kelompok</th>
				<?php foreach ($data['user'] as $user): ?>
					<td>
						<?php echo $user['sik'];?>
					</td>
				<?php endforeach ?>
			</tr>
			<tr>
				<th>Kartu Tanda Nelayan</th>
				<?php foreach ($data['user'] as $user): ?>
					<td>
						<?php echo $user['ktn'];?>
					</td>
				<?php endforeach ?>
			</tr>
			<tr>
				<th>Ukuran Keramba</th>
				<?php foreach ($data['user'] as $user): ?>
					<td>
						<?php echo $user['uk'];?>
					</td>
				<?php endforeach ?>
			</tr>
			<tr>
				<th>Jumlah Kelompok</th>
				<?php foreach ($data['user'] as $user): ?>
					<td>
						<?php echo $user['jk'];?>
					</td>
				<?php endforeach ?>
			</tr>
			<tr>
				<th>Cara Pembenihan Ikan yang Baik (Sertifikat)</th>
				<?php foreach ($data['user'] as $user): ?>
					<td>
						<?php echo $user['cpib'];?>
					</td>
				<?php endforeach ?>
			</tr>
			<tr>
				<th>Cara Budidaya Bibit (CBB)</th>
				<?php foreach ($data['user'] as $user): ?>
					<td>
						<?php echo $user['cbb'];?>
					</td>
				<?php endforeach ?>
			</tr>
		</table>
	</div>

	<h1>Nilai prefensi</h1>
	<div class="table-responsive">          
		<table class="table">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Surat Izin Kelompok</th>
					<th>Kartu Tanda Nelayan</th>
					<th>Ukuran Keramba</th>
					<th>Jumlah Kelompok</th>
					<th>Cara Pembenihan Ikan yang Baik (Sertifikat)</th>
					<th>Cara Budidaya Bibit (CBB)</th>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody id="table-preferensi">
				<?php
				$jumlah = 6;
				$orang=array(); 
				?>
				<?php foreach ($data['user'] as $user): ?>
					<?php foreach ($data['user'] as $lawan): ?>
						<?php if ($user['id'] != $lawan['id']) {?>
							<tr>
								<td><?php echo '('.$user['nama'].','.$lawan['nama'].')' ?></td>
								<td><?php 
								if (($user['sik']-$lawan['sik']) <= 0) {
									$sik=0;
									echo 0;
								}else{
									$sik=1;
									echo 1;
								}
								?></td>
								<td><?php 
								if (($user['ktn']-$lawan['ktn']) <= 0) {
									$ktn=0;
									echo 0;
								}else{
									$ktn=1;
									echo 1;
								}
								?></td>
								<td><?php 
								if (($user['uk']-$lawan['uk']) <= 0) {
									$uk=0;
									echo 0;
								}else{
									$uk=1;
									echo 1;
								}
								?></td>
								<td><?php 
								if (($user['jk']-$lawan['jk']) <= 0) {
									$jk=0;
									echo 0;
								}else{
									$jk=1;
									echo 1;
								}
								?></td>
								<td><?php 
								if (($user['cpib']-$lawan['cpib']) <= 0) {
									$cpib=0;
									echo 0;
								}else{
									$cpib=1;
									echo 1;
								}
								?></td>
								<td><?php 
								if (($user['cbb']-$lawan['cbb']) <= 0) {
									$cbb=0;
									echo 0;
								}else{
									$cbb=1;
									echo 1;
								}
								?></td>
								<td><?php echo $sik+$ktn+$uk+$jk+$cpib+$cbb; ?></td>
							</tr>
						<?php } ?>
					<?php endforeach ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

	<h1>Menghitung Indeks Preferensi
		Multikriteria
	</h1>
	<div class="table-responsive">          
		<table class="table">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Nilai</th>
				</tr>
			</thead>
			<tbody id="table-preferensi">
				<?php
				$jumlah = 6;
				$orang=array(); 
				?>
				<?php foreach ($data['user'] as $user): ?>
					<?php foreach ($data['user'] as $lawan): ?>
						<?php if ($user['id'] != $lawan['id']) {?>
							<tr>
								<td><?php echo '('.$user['nama'].','.$lawan['nama'].')' ?></td>
								<?php 
								if (($user['sik']-$lawan['sik']) <= 0) {
									$sik=0;
								}else{
									$sik=1;
								}
								?>
								<?php 
								if (($user['ktn']-$lawan['ktn']) <= 0) {
									$ktn=0;
								}else{
									$ktn=1;
								}
								?>
								<?php 
								if (($user['uk']-$lawan['uk']) <= 0) {
									$uk=0;
								}else{
									$uk=1;
								}
								?>
								<?php 
								if (($user['jk']-$lawan['jk']) <= 0) {
									$jk=0;
								}else{
									$jk=1;
								}
								?>
								<?php 
								if (($user['cpib']-$lawan['cpib']) <= 0) {
									$cpib=0;
								}else{
									$cpib=1;
								}
								?><?php 
								if (($user['cbb']-$lawan['cbb']) <= 0) {
									$cbb=0;
								}else{
									$cbb=1;
								}
								?>
								<td>1/<?php echo $jumlah ?>(<?php echo $sik ?>+<?php echo $ktn ?>+<?php echo $uk ?>+<?php echo $jk ?>+<?php echo $cpib ?>+<?php echo $cbb ?>) = <?php echo number_format(($sik+$ktn+$uk+$jk+$cpib+$cbb)/$jumlah, 3); ?></td>
							</tr>
						<?php } ?>
					<?php endforeach ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

	<h1>Tabel indeks Preferensi Multikriteria</h1>
	<div class="table-responsive">          
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<?php foreach ($data['user'] as $user): ?>
						<th><?php echo $user['nama'] ?></th>
					<?php endforeach ?>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$jumlah = 6;
				$orang=array(); 
				$totalall = 0;
				$totalnew=0;
				$lawanId=0;
				?>
				<?php foreach ($data['user'] as $user): ?>
					<tr>
						<th><?php echo $user['nama'] ?></th>
						<?php foreach ($data['user'] as $lawan): ?>
							<?php if ($user['id'] != $lawan['id']) {?>
								<?php 
								if (($user['sik']-$lawan['sik']) <= 0) {
									$sik=0;
								}else{
									$sik=1;
								}
								?>
								<?php 
								if (($user['ktn']-$lawan['ktn']) <= 0) {
									$ktn=0;
								}else{
									$ktn=1;
								}
								?>
								<?php 
								if (($user['uk']-$lawan['uk']) <= 0) {
									$uk=0;
								}else{
									$uk=1;
								}
								?>
								<?php 
								if (($user['jk']-$lawan['jk']) <= 0) {
									$jk=0;
								}else{
									$jk=1;
								}
								?>
								<?php 
								if (($user['cpib']-$lawan['cpib']) <= 0) {
									$cpib=0;
								}else{
									$cpib=1;
								}
								?><?php 
								if (($user['cbb']-$lawan['cbb']) <= 0) {
									$cbb=0;
								}else{
									$cbb=1;
								}
								?>
								<?php 
								$totalall += number_format(($sik+$ktn+$uk+$jk+$cpib+$cbb)/$jumlah, 3); ?>
								<td><?php echo number_format(($sik+$ktn+$uk+$jk+$cpib+$cbb)/$jumlah, 3); ?></td>
							<?php } else{ ?>
								<td>#</td>
							<?php } ?>
						<?php endforeach ?>
						<td><?php echo $totalall ?></td>
						<?php $totalall=0; ?>
					</tr>
				<?php endforeach ?>
				<tr>
					<th>Jumlah</th>
					

					<?php foreach ($data['user'] as $lawan): ?>
						<?php foreach ($data['user'] as $user ): ?>
							<?php $lawanId=$lawan['id']; ?>
							<?php if ($user['id'] != $lawan['id']) {?>
								<?php 
								if (($user['sik']-$lawan['sik']) <= 0) {
									$sik=0;
								}else{
									$sik=1;
								}
								?>
								<?php 
								if (($user['ktn']-$lawan['ktn']) <= 0) {
									$ktn=0;
								}else{
									$ktn=1;
								}
								?>
								<?php 
								if (($user['uk']-$lawan['uk']) <= 0) {
									$uk=0;
								}else{
									$uk=1;
								}
								?>
								<?php 
								if (($user['jk']-$lawan['jk']) <= 0) {
									$jk=0;
								}else{
									$jk=1;
								}
								?>
								<?php 
								if (($user['cpib']-$lawan['cpib']) <= 0) {
									$cpib=0;
								}else{
									$cpib=1;
								}
								?><?php 
								if (($user['cbb']-$lawan['cbb']) <= 0) {
									$cbb=0;
								}else{
									$cbb=1;
								}
								?>
							<?php }?>
							<?php 
							if ($user['id'] != $lawan['id'] &&  $lawan['id'] <= $lawanId) {
								$totalnew += number_format(($sik+$ktn+$uk+$jk+$cpib+$cbb)/$jumlah, 3);
							}
							?>
						<?php endforeach ?>
						<td><?php echo $totalnew; ?></td>
						<?php $totalnew =0;  ?>
					<?php endforeach ?>

				</tr>
			</tbody>
		</table>
	</div>

	<h1>Leaving Flow</h1>
	<div class="table-responsive">          
		<table class="table">
			<thead>
				<tr>
					<th>Nama</th>
					<th>LF</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$jumlah = 6;
				$orang=array(); 
				$totalall = 0;
				$totalnew=0;
				$lawanId=0;
				?>
				<?php foreach ($data['user'] as $user): ?>
					<tr>
						<th><?php echo $user['nama'] ?></th>
						<?php foreach ($data['user'] as $lawan): ?>
							<?php if ($user['id'] != $lawan['id']) {?>
								<?php 
								if (($user['sik']-$lawan['sik']) <= 0) {
									$sik=0;
								}else{
									$sik=1;
								}
								?>
								<?php 
								if (($user['ktn']-$lawan['ktn']) <= 0) {
									$ktn=0;
								}else{
									$ktn=1;
								}
								?>
								<?php 
								if (($user['uk']-$lawan['uk']) <= 0) {
									$uk=0;
								}else{
									$uk=1;
								}
								?>
								<?php 
								if (($user['jk']-$lawan['jk']) <= 0) {
									$jk=0;
								}else{
									$jk=1;
								}
								?>
								<?php 
								if (($user['cpib']-$lawan['cpib']) <= 0) {
									$cpib=0;
								}else{
									$cpib=1;
								}
								?><?php 
								if (($user['cbb']-$lawan['cbb']) <= 0) {
									$cbb=0;
								}else{
									$cbb=1;
								}
								?>
								<?php 
								$totalall += number_format(($sik+$ktn+$uk+$jk+$cpib+$cbb)/$jumlah, 3); ?>
							<?php } ?>
						<?php endforeach ?>
						<td><?php echo number_format($totalall/($jumlah-1),3); ?></td>
						<?php $totalall =0; ?>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

	<h1>Entering Flow</h1>
	<div class="table-responsive">          
		<table class="table">
			<thead>
				<tr>
					<th>Nama</th>
					<th>EF</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$jumlah = 6;
				$orang=array(); 
				$totalall = 0;
				$totalnew=0;
				$lawanId=0;
				?>
				<?php foreach ($data['user'] as $lawan): ?>
					<tr>
						<th><?php echo $lawan['nama'] ?></th>
						<?php foreach ($data['user'] as $user ): ?>
							<?php $lawanId=$lawan['id']; ?>
							<?php if ($user['id'] != $lawan['id']) {?>
								<?php 
								if (($user['sik']-$lawan['sik']) <= 0) {
									$sik=0;
								}else{
									$sik=1;
								}
								?>
								<?php 
								if (($user['ktn']-$lawan['ktn']) <= 0) {
									$ktn=0;
								}else{
									$ktn=1;
								}
								?>
								<?php 
								if (($user['uk']-$lawan['uk']) <= 0) {
									$uk=0;
								}else{
									$uk=1;
								}
								?>
								<?php 
								if (($user['jk']-$lawan['jk']) <= 0) {
									$jk=0;
								}else{
									$jk=1;
								}
								?>
								<?php 
								if (($user['cpib']-$lawan['cpib']) <= 0) {
									$cpib=0;
								}else{
									$cpib=1;
								}
								?><?php 
								if (($user['cbb']-$lawan['cbb']) <= 0) {
									$cbb=0;
								}else{
									$cbb=1;
								}
								?>
							<?php }?>
							<?php 
							if ($user['id'] != $lawan['id'] &&  $lawan['id'] <= $lawanId) {
								$totalnew += number_format(($sik+$ktn+$uk+$jk+$cpib+$cbb)/$jumlah, 3);
							}
							?>
						<?php endforeach ?>
						<td><?php echo number_format($totalnew/($jumlah-1),3); ?></td>
						<?php $totalnew =0;  ?>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

	<h1>Net Flow</h1>
	<div class="table-responsive">          
		<table class="table">
			<thead>
				<tr>
					<th>Nama</th>
					<th>NF</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$jumlah = 6;
				$orang=array(); 
				$totalall = 0;
				$totalnew=0;
				$lawanId=0;
				?>
				<?php foreach ($data['user'] as $user): ?>
					<tr>
						<th><?php echo $user['nama'] ?></th>
						<?php foreach ($data['user'] as $lawan): ?>
							<?php $lawanId=$user['id']; ?>
							<?php if ($user['id'] != $lawan['id']) {?>
								<?php 
								if (($user['sik']-$lawan['sik']) <= 0) {
									$sik=0;
								}else{
									$sik=1;
								}
								?>
								<?php 
								if (($user['ktn']-$lawan['ktn']) <= 0) {
									$ktn=0;
								}else{
									$ktn=1;
								}
								?>
								<?php 
								if (($user['uk']-$lawan['uk']) <= 0) {
									$uk=0;
								}else{
									$uk=1;
								}
								?>
								<?php 
								if (($user['jk']-$lawan['jk']) <= 0) {
									$jk=0;
								}else{
									$jk=1;
								}
								?>
								<?php 
								if (($user['cpib']-$lawan['cpib']) <= 0) {
									$cpib=0;
								}else{
									$cpib=1;
								}
								?><?php 
								if (($user['cbb']-$lawan['cbb']) <= 0) {
									$cbb=0;
								}else{
									$cbb=1;
								}
								?>
								<?php 
								$totalall += number_format(($sik+$ktn+$uk+$jk+$cpib+$cbb)/$jumlah, 3); 
								?>
							<?php } ?>
							<?php if ($user['id'] != $lawan['id']) {?>
								<?php 
								if (($lawan['sik']-$user['sik']) <= 0) {
									$sik=0;
								}else{
									$sik=1;
								}
								?>
								<?php 
								if (($lawan['ktn']-$user['ktn']) <= 0) {
									$ktn=0;
								}else{
									$ktn=1;
								}
								?>
								<?php 
								if (($lawan['uk']-$user['uk']) <= 0) {
									$uk=0;
								}else{
									$uk=1;
								}
								?>
								<?php 
								if (($lawan['jk']-$user['jk']) <= 0) {
									$jk=0;
								}else{
									$jk=1;
								}
								?>
								<?php 
								if (($lawan['cpib']-$user['cpib']) <= 0) {
									$cpib=0;
								}else{
									$cpib=1;
								}
								?><?php 
								if (($lawan['cbb']-$user['cbb']) <= 0) {
									$cbb=0;
								}else{
									$cbb=1;
								}
								?>
								<?php 
								if ($user['id'] != $lawan['id'] &&  $user['id'] <= $user['id']) {
									$totalnew += number_format(($sik+$ktn+$uk+$jk+$cpib+$cbb)/$jumlah, 3);
								}
							} ?>
						<?php endforeach ?>
						<td><?php echo number_format(($totalall/($jumlah-1))-($totalnew/($jumlah-1)),3); ?></td>
						<?php 
						$totalall =0;
						$totalnew=0;
						?>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

</div>
