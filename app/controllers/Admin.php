<?php 

/**
 * 
 */
class Admin extends Controller
{
	public function index()
	{
		$this->redirect('/admin/login');
	}
	
	public function login()
	{
		$data['judul'] = 'Login';

		$this->view('templates/header', $data);
		$this->view('admin/index');
		$this->view('templates/footer');
	}

	public function dashboard()
	{
		$data['judul'] = 'Dashboard';
		$data['admin'] = 'admin';

		$this->view('templates/header', $data);
		$this->view('admin/dashboard');
		$this->view('templates/footer');
	}

	public function masuk()
	{
		$email = $_POST['email']; 
		$password = $_POST['password']; 

		if (!empty(trim($email)) && !empty(trim($password))) {
			if ($this->model('Admin_model')->loginUser($_POST) > 0) {
				Flasher::setFlash('Login','Berhasil','Selamat datang','success');
				$this->redirect('/Admin/dashboard');
			}else{
				Flasher::setFlash('Login','Gagal','Ada kesalahan Silahkan Chek inputan anda','danger');
				$this->redirect('/Admin/login');
			}
		}else{
			Flasher::setFlash('Login','Gagal','Silahkan Chek inputan anda','danger');
			$this->redirect('/Admin/login');
		}
	}

	public function logout()
	{
		session_destroy();
		$this->redirect('/Home');
	}

	public function DaftarPengajuan()
	{
		if (isset($_SESSION['id_user'])) {
			$data['judul'] = 'Daftar Pengajuan Bantuan';
			$data['admin'] = 'admin';

			$data['user'] = $this->model('Admin_model')->getAlluser();
			$data['no'] = 1;

			// var_dump($data['user']);
			// die();

			$this->view('templates/header', $data);
			$this->view('admin/DaftarPengajuan',$data);
			$this->view('templates/footer');
		} else {
			$this->redirect('/Home/index', $data);
		}
	}
	public function DetailPenghitungan()
	{
		if (isset($_SESSION['id_user'])) {
			$data['judul'] = 'Detail Penghitungan';
			$data['admin'] = 'admin';

			$data['user'] = $this->model('Admin_model')->getAlluser();
			$data['no'] = 1;

			$this->view('templates/header', $data);
			$this->view('admin/bobot',$data);
			$this->view('templates/footer');
		} else {
			$this->redirect('/Home/index', $data);
		}
	}
	public function Seleksi()
	{
		if (isset($_SESSION['id_user'])) {
			$data['judul'] = 'Seleksi Pengajuan';
			$data['admin'] = 'admin';

			if ($this->model('Admin_model')->getUpdateNilaiuser() > 0) {
				$data['user'] = $this->model('Admin_model')->getAlluserPeringkat();
				$data['no'] = 1;

				$this->view('templates/header', $data);
				$this->view('admin/DataPeminjam',$data);
				$this->view('templates/footer');
			}
		} else {
			$this->redirect('/Home/index', $data);
		}
	}

	public function updateStatusUser()
	{
		$data = $data['user'] = $this->model('Admin_model')->updateStatusOrang();
		if ($data>0) {
			$data;
		}else{
			die();
		}
	}

}