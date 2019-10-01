<?php 

/**
 * 
 */
class Mahasiswa_model 
{
	private $table = 'mahasiswa';
	private $db;

	function __construct()
	{
		$this->db = new Database;
	}

	public function getAllmhs()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getMhsByid($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();	
	}

	public function tambahMHS($data)
	{
		$query = "INSERT INTO " . $this->table . " VALUES ('', :nama, :jurusan, :nim, :hoby)";

		$this->db->query($query);

		$this->db->bind('nama', $data['nama']);
		$this->db->bind('jurusan', $data['jurusan']);
		$this->db->bind('nim', $data['nim']);
		$this->db->bind('hoby', $data['hoby']);

		$this->db->execute();

		return $this->db->rowCount();
	}
	public function updateMHS($data)
	{
		$query = "UPDATE ". $this->table ." SET nama = :nama, 
												jurusan = :jurusan,
												nim = :nim,
												hoby = :hoby 
												WHERE id = :id";

		$this->db->query($query);

		$this->db->bind('nama', $data['nama']);
		$this->db->bind('nim', $data['nim']);
		$this->db->bind('jurusan', $data['jurusan']);
		$this->db->bind('hoby', $data['hoby']);
		$this->db->bind('id', $data['id']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteMHS($id)
	{
		$query = "DELETE FROM ". $this->table ." WHERE id = :id";

		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariMHS()
	{
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM " . $this->table . " WHERE nama LIKE :keyword";

		$this->db->query($query);

		$this->db->bind('keyword', "%$keyword%");

		return $this->db->resultSet();
	}


}