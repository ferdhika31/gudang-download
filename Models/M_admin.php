<?php 
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-22 12:57:10
	**/
namespace Models;
use Resources;

class M_admin{

	public function __construct(){
		$this->db = new Resources\Database;
		$this->tb = "tb_admin";
		$this->tb_akun = "tb_pengguna";
	}

	public function masuk($user="", $pass=""){
		$query = $this->db->select()->from($this->tb)->where('username', '=', $user, 'AND')->where('password', '=', $pass)->getOne();
    	return $query;
    }

    public function infoUser($username){
    	$query = $this->db->select()->from($this->tb)->where('username', '=', $username)->getOne();

    	return $query;
    }

    // Akun
    public function semuaAkun(){
    	$query = $this->db->select()->from($this->tb_akun)->getAll(); 
    	return $query;
    }

    public function ambilAkun($page = 1, $limit = 10){
		$offset = ($limit * $page) - $limit;
		$query = $this->db->results("SELECT * FROM tb_pengguna ORDER BY id DESC LIMIT $offset, $limit");

        return $query;
    }

    public function ubahStatus($isi=array(),$id=array()){
    	$query = $this->db->update($this->tb_akun, $isi, $id); 

    	return $query;
    }
    
}