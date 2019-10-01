<?php

/**
 * 
 */
class Home extends Controller
{
	
	public function index($nama='ardi',$pekerjaan='makan')
	{
		if (isset($_SESSION['id_user'])) {
 			$this->redirect('/Admin/dashboard');
		} else {
			$data['nama'] = $nama;
			$data['pekerjaan'] = $pekerjaan;
			$data['judul'] = 'Dinas Kelautan Dan Perikanan';

			$this->view('home/index', $data);
		}
		
	}
}