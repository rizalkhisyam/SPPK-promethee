<?php 
/**
 * 
 */
class Flasher 
{
	
	public static function setFlash($data,$pesan, $aksi, $tipe)
	{
		$_SESSION['flash'] = [

			'pesan' => $pesan,
			'aksi'	=> $aksi,
			'tipe'	=> $tipe,
			'data'	=> $data

		];
	}

	public static function flash()
	{
		if (isset($_SESSION['flash'])) {
			echo '<div class="alert alert-'. $_SESSION['flash']['tipe'] .' alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data '. $_SESSION['flash']['data'] .' <strong>'. $_SESSION['flash']['pesan'] .'</strong> '. $_SESSION['flash']['aksi'] .'
			</div>';

			unset($_SESSION['flash']);
		}
	}
}