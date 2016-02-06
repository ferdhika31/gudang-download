<?php 
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-18 16:50:31
	**/
namespace Models;
use Resources;

class M_pengaturan{

	public function __construct(){
		$this->db = new Resources\Database;
		$this->tb = "tb_pengaturan";
		session_start();
		$dt = $query = $this->db->select()->from($this->tb)->getAll(); 
		$i = 1;
		foreach($dt as $d)
		{
			$_SESSION['konfig_app_'.$i] = $d->value_pengaturan;
			$_SESSION[$d->tipe_pengaturan] = $_SESSION['konfig_app_'.$i];
			$i++;
		}
	}

	public function tampil(){
		$query = $this->db->select()->from($this->tb)->getAll(); 
    	return $query;
	}

	public function ubah($isi=array(),$id=array()){
        $query = $this->db->update($this->tb, $isi, $id); 
    }
	
}