<?php 
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-18 17:09:47
	**/
namespace Models;
use Resources;

class M_pengguna{

	public function __construct(){
		$this->db = new Resources\Database;
		$this->tb = "tb_pengguna";
	}

	public function masuk($imel=""){
		$query = $this->db->select()->from($this->tb)->where('email', '=', $imel)->getOne();
    	return $query;
    }

    public function hit($imel){
    	$query = $this->db->results("update ".$this->tb." set hit=hit+1 where email='".$imel."'");
    }

    public function cek_email($imel){
    	$query = $this->db->select()->from($this->tb)->where('email', '=', $imel)->getOne();
    	return $query;
    }

    public function simpan($data=array()){
    	$query = $this->db->insert($this->tb, $data); 
    }

    //top user
    public function tampilTop(){
		$query = $this->db->results("select * from ".$this->tb." order by hit desc limit 5");
        return $query;
    }
}