<?php 

/**
 * 
 */
class Admin_model 
{
	private $table = 'datapenilayan';
	private $db;

	function __construct()
	{
		$this->db = new Database;
	}

	public function getAlluser()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}
	// public function getAlluserPeringkat()
	// {
	// 	$this->db->query('SELECT * FROM ' . $this->table . ' WHERE status=:status order By nf desc');
	// 	$this->db->bind('status','diproses');
	// 	return $this->db->resultSet();
	// }
	public function getAlluserPeringkat()
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' order By nf desc');
		return $this->db->resultSet();
	}

	public function getUserByid($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();	
	}

	public function loginUser($data)
	{
		// die('masuk');
		$dataUser = $this->getHash($data['email']);
		// var_dump($dataUser['id']);
		if (password_verify($data['password'], $dataUser['password'])) {
			// die( ($dataUser['type'] == 'diary') != null );
			// die('berhasil');
			$_SESSION['id_user'] = $dataUser['id'];
			$_SESSION['nama'] = $dataUser['nama'];
			$_SESSION['email'] = $dataUser['email'];
			return 1;
		}else{
			// die('gagal');
			return 0;
		}
	}

	public function getHash($email)
	{
		$this->db->query('SELECT * FROM user WHERE email=:email');
		$this->db->bind('email',$email);
		return $this->db->single();	
	}
	
	public function createData($data)
	{
		$foto 	= $_FILES['foto']['name'];
		$asalfoto = $_FILES['foto']['tmp_name'];
		$namaFilefoto = 'image/projek/'.basename($foto);
		$exfoto = strtolower(pathinfo($foto,PATHINFO_EXTENSION));


		$ktp 	= $_FILES['ktp']['name'];
		$asalktp = $_FILES['ktp']['tmp_name'];
		$namaFilektp = 'image/projek/'.basename($ktp);
		$exktp = strtolower(pathinfo($ktp,PATHINFO_EXTENSION));
		// die($ktp);
		$kodeunik = $this->random_string(8);

		$time = time();
		$status = 'diproses';
		if($exfoto != "jpg" && $exfoto != "png" && $exfoto != "jpeg" && $exktp != "jpg" && $exktp != "png" && $exktp != "jpeg" ) {
			return 0;
		} else{
			if (file_exists($namaFilefoto) && file_exists($namaFilektp)) {
				if ($exfoto == "jpg" && $exktp == "jpg") {
					$namaFilefoto = str_replace(".jpg", "", $namaFilefoto);
					$namaFilefoto = $namaFilefoto . "_" . $time . ".jpg";
					$foto = str_replace(".jpg", "", $foto);
					$foto = $foto . "_" . $time . ".jpg";

					$namaFilektp = str_replace(".jpg", "", $namaFilektp);
					$namaFilektp = $namaFilektp . "_" . $time . ".jpg";
					$foto = str_replace(".jpg", "", $foto);
					$foto = $foto . "_" . $time . ".jpg";
				}else if ($exfoto == "png" && $exktp == "png") {
					$namaFilefoto = str_replace(".png", "", $namaFilefoto);
					$namaFilefoto = $namaFilefoto . "_" . $time . ".png";
					$foto = str_replace(".png", "", $foto);
					$foto = $foto . "_" . $time . ".png";

					$namaFilektp = str_replace(".png", "", $namaFilektp);
					$namaFilektp = $namaFilektp . "_" . $time . ".png";
					$foto = str_replace(".png", "", $foto);
					$foto = $foto . "_" . $time . ".png";
				}else if ($exfoto == "jpeg" && $exktp == "jpeg") {
					$namaFilefoto = str_replace(".jpeg", "", $namaFilefoto);
					$namaFilefoto = $namaFilefoto . "_" . $time . ".jpeg";
					$foto = str_replace(".jpeg", "", $foto);
					$foto = $foto . "_" . $time . ".jpeg";

					$namaFilektp = str_replace(".jpeg", "", $namaFilektp);
					$namaFilektp = $namaFilektp . "_" . $time . ".jpeg";
					$foto = str_replace(".jpeg", "", $foto);
					$foto = $foto . "_" . $time . ".jpeg";
				}
			}

			move_uploaded_file($asalfoto, $namaFilefoto);
			move_uploaded_file($asalktp, $namaFilektp);

			$query = "INSERT INTO " . $this->table . " VALUES ('', :nama, :foto, :ktp, :sik, :ktn, :uk, :jk, :cpib, :cbb, :kodeunik, :status, :lf, :ef, :nf)";

			$this->db->query($query);

			$this->db->bind('nama', $_POST['nama']);
			$this->db->bind('foto', $foto);
			$this->db->bind('ktp', $ktp);
			$this->db->bind('sik', $_POST['sik']);
			$this->db->bind('ktn', $_POST['ktn']);
			$this->db->bind('uk', $_POST['keramba']);
			$this->db->bind('jk', $_POST['kelompok']);
			$this->db->bind('cpib', $_POST['cpib']);
			$this->db->bind('cbb', $_POST['cbb']);
			$this->db->bind('kodeunik', $kodeunik);
			$this->db->bind('status', $status);
			$this->db->bind('lf', null);
			$this->db->bind('ef', null);
			$this->db->bind('nf', null);

			$this->db->execute();

			$rowCount = $this->db->rowCount();


			return array($rowCount, $kodeunik);
		}

	}

	public function getUpdateNilaiuser()
	{
		$data = $this->getAlluser();


		$jumlah = 6;
		$orang=array(); 
		$totalall = 0;
		$totalnew=0;
		$lawanId=0;
		$leav=0;
		$enter=0;
		$net=0;
		foreach ($data as $user): 
			foreach ($data as $lawan):
				$lawanId=$user['id'];  
				if ($user['id'] != $lawan['id']) {
					if (($user['sik']-$lawan['sik']) <= 0) {
						$sik=0;
					}else{
						$sik=1;
					}
					if (($user['ktn']-$lawan['ktn']) <= 0) {
						$ktn=0;
					}else{
						$ktn=1;
					}
					if (($user['uk']-$lawan['uk']) <= 0) {
						$uk=0;
					}else{
						$uk=1;
					}
					if (($user['jk']-$lawan['jk']) <= 0) {
						$jk=0;
					}else{
						$jk=1;
					}
					if (($user['cpib']-$lawan['cpib']) <= 0) {
						$cpib=0;
					}else{
						$cpib=1;
					} 
					if (($user['cbb']-$lawan['cbb']) <= 0) {
						$cbb=0;
					}else{
						$cbb=1;
					} 
					$totalall += number_format(($sik+$ktn+$uk+$jk+$cpib+$cbb)/$jumlah, 3); 
				}  
				if ($user['id'] != $lawan['id']) {

					if (($lawan['sik']-$user['sik']) <= 0) {
						$sik=0;
					}else{
						$sik=1;
					}
					if (($lawan['ktn']-$user['ktn']) <= 0) {
						$ktn=0;
					}else{
						$ktn=1;
					}
					if (($lawan['uk']-$user['uk']) <= 0) {
						$uk=0;
					}else{
						$uk=1;
					}
					if (($lawan['jk']-$user['jk']) <= 0) {
						$jk=0;
					}else{
						$jk=1;
					} 
					if (($lawan['cpib']-$user['cpib']) <= 0) {
						$cpib=0;
					}else{
						$cpib=1;
					} 
					if (($lawan['cbb']-$user['cbb']) <= 0) {
						$cbb=0;
					}else{
						$cbb=1;
					}
					if ($user['id'] != $lawan['id'] &&  $user['id'] <= $user['id']) {
						$totalnew += number_format(($sik+$ktn+$uk+$jk+$cpib+$cbb)/$jumlah, 3);
					}
				} 
			endforeach;
			$leav = number_format(($totalall/($jumlah-1)),3);
			$enter = number_format(($totalnew/($jumlah-1)),3);
			$net = number_format(($totalall/($jumlah-1))-($totalnew/($jumlah-1)),3);
			$totalall =0;
			$totalnew=0;


			$query = "UPDATE ". $this->table ." SET lf = :lf, ef = :ef, nf = :nf WHERE id = :id";

			$this->db->query($query);

			$this->db->bind('lf', $leav);
			$this->db->bind('ef', $enter);
			$this->db->bind('nf', $net);
			$this->db->bind('id', $user['id']);

			$this->db->execute();


		endforeach;

		return 1;
	}

	function random_string($length) {
		$key = '';
		$keys = array_merge(range(0, 9), range('A', 'Z'));

		for ($i = 0; $i < $length; $i++) {
			$key .= $keys[array_rand($keys)];
		}

		return $key;
	}

	public function updateStatusOrang()
	{
		$query = "UPDATE ". $this->table ." SET status = :status WHERE id = :id";

		$this->db->query($query);

		$this->db->bind('status', $_POST['value']);
		$this->db->bind('id', $_POST['idUser']);

		$this->db->execute();
	}

	public function seaarchKode($data)
	{
		$kode=$data['code'];
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE kodeunik LIKE :kode');
		$this->db->bind('kode',"%$kode%");
		return $this->db->single();
	}
}