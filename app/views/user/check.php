<div class="center-all-check">
	<div class="grup-all-hasil">
		<h1 style="text-align: center;">#Dinas Kelautan Dan Perikanan Kota Kendari</h1>
		<?php if ($data['status']['status'] == 'diterima'){ ?>
			<p>" SELAMAT PENGAJUAN ANDA DI SETUJUI "</p>
		<?php }else if($data['status']['status'] == 'ditolak'){ ?>
			<p>" MAAF ANDA BELUM BISA DI TERIMA, SILAHKAN CHEK KELENGKAPAN DOKUMEN ANDA DAN COBA LAGI"</p>
		<?php }else if($data['status']['status'] == 'diproses'){ ?>
			<p>" MOHON BERSABAR DATA MASIH DI PROSES "</p>
		<?php }else{ ?>
			<p>"DATA TIDAK DI TEMUKAN, MOHON PERIKSA CODE ANDA"</p>
		<?php } ?>
		<a href="<?php echo BASEURL; ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back</a>
	</div>
</div>