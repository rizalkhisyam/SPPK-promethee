<?php 

/**
 * 
 */
class Users_model 
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

	public function getUserByid($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
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

	function random_string($length) {
		$key = '';
		$keys = array_merge(range(0, 9), range('A', 'Z'));

		for ($i = 0; $i < $length; $i++) {
			$key .= $keys[array_rand($keys)];
		}

		return $key;
	}

}