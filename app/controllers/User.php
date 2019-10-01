<?php 

/**
 * 
 */
class User extends Controller
{
	
	public function check()
	{
		$data['judul'] = 'Chek Verifikasi';
		$data['status'] = $this->model('Admin_model')->seaarchKode($_POST);
		$this->view('templates/header', $data);
		$this->view('user/check',$data);
		$this->view('templates/footer');
	}

	public function dataUser()
	{

		if (!empty(trim($_POST['nama'])) && ($_POST['sik'] != 'Pilih') && ($_POST['ktn'] != 'Pilih') && ($_POST['keramba'] != 'Pilih') && ($_POST['kelompok'] != 'Pilih') && ($_POST['cpib'] != 'Pilih') && ($_POST['cbb'] != 'Pilih')) {
			$data = $this->model('Users_model')->createData($_POST);
			// var_dump();
			// die();
			$kodeUnik = $data[1];
			// var_dump($data[1]);
			// die($kodeUnik);
			if ($data[0] > 0) {
				// $data = 
				Flasher::setFlash('User','Berhasil','ditambahkan','success');
				$this->redirect('/User/kodeUnik/'.$kodeUnik);
			}else{
				Flasher::setFlash('User','Gagal','ditambahkan, Silahkan Chek inputan anda','danger');
				$this->redirect('/Home/index', $data);
			}
		}else{
			Flasher::setFlash('User','Gagal','ditambahkan, Silahkan Chek inputan anda','danger');
			$this->redirect('/Home/index', $data);
		}
	}

	public function kodeUnik($kodeUnik = 'Masukkan data Dulu Lur')
	{
		// die($kodeUnik);
		$data['judul'] = 'Kode Unik';
		$data['kodeUnik'] = $kodeUnik;
		// die($data['kodeUnik']);

		$this->view('templates/header', $data);
		$this->view('home/kodeUnik',$data);
		$this->view('templates/footer');
	}

}