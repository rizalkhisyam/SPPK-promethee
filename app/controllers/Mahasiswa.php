<?php
/**
 * 
 */
class Mahasiswa extends Controller
{
	public function index()
	{
		$data['judul'] ='Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getAllmhs();

		$this->view('templates/header', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}

	public function detail($id)
	{
		$data['judul'] ='Detail Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getMhsByid($id);

		$this->view('templates/header', $data);
		$this->view('mahasiswa/detail', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		// var_dump($_POST);
		if ($this->model('Mahasiswa_model')->tambahMHS($_POST) > 0) {
			Flasher::setFlash('Berhasil','ditambahkan','success');
			$this->redirect('/mahasiswa');
		}else{
			Flasher::setFlash('Gagal','ditambahkan','danger');
			$this->redirect('/mahasiswa');
		}
	}

	public function delete($id)
	{
		if ($this->model('Mahasiswa_model')->deleteMHS($id) > 0) {
			Flasher::setFlash('Berhasil','dihapus','success');
			$this->redirect('/mahasiswa');
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			$this->redirect('/mahasiswa');
		}
	}

	public function getubah()
	{
		echo json_encode($this->model('Mahasiswa_model')->getMhsByid($_POST['id']));
	}

	public function update()
	{
		if ($this->model('Mahasiswa_model')->updateMHS($_POST) > 0) {
			Flasher::setFlash('Berhasil','diubah','success');
			$this->redirect('/mahasiswa');
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			$this->redirect('/mahasiswa');
		}
	}

	public function cari()
	{
		$data['judul'] ='Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->cariMHS();

		$this->view('templates/header', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}
}