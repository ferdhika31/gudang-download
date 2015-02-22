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
	}

	public function masuk($user="", $pass=""){
		$query = $this->db->select()->from($this->tb)->where('username', '=', $user, 'AND')->where('password', '=', $pass)->getOne();
    	return $query;
    }
}