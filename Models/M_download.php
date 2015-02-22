<?php 
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-18 18:18:26
	**/
namespace Models;
use Resources;

class M_download{

	public function __construct(){
		$this->db = new Resources\Database;
		$this->tb = "tb_download";
	}

	public function tampil(){
    	$query = $this->db->select()->from($this->tb)->getAll(); 
    	return $query;
    }

    public function ambilDonlod($page = 1, $limit = 10){
		$offset = ($limit * $page) - $limit;
		$query = $this->db->results("SELECT * FROM tb_download ORDER BY id DESC LIMIT $offset, $limit");
		//$data = $this->db->select()->from('users')->where('id', '>', 1)->orderBy('id', 'DESC')->limit(6,2)->getAll(); 
        return $query;
    }
    
    public function lihat($id){
    	$query = $this->db->select()->from($this->tb)->where('id', '=', $id)->getOne();
    	return $query;
    }

    public function hit($id){
    	$query = $this->db->results("update ".$this->tb." set hit=hit+1 where id='".$id."'");
    }

    //top file
    public function tampilTop(){
		$query = $this->db->results("SELECT * FROM tb_download ORDER BY hit DESC LIMIT 5");
		//$data = $this->db->select()->from('users')->where('id', '>', 1)->orderBy('id', 'DESC')->limit(6,2)->getAll(); 
        return $query;
    }

    //admin
    public function simpan($data=array()){
        $query = $this->db->insert($this->tb, $data); 
    }

    public function ubah($isi=array(),$id=array()){
        $query = $this->db->update($this->tb, $isi, $id); 
    }

    public function hapus($id){
        $query = $this->db->delete($this->tb, array('id' => $id)); 
    }

    public function cek_link_download($link){
        $query = $this->db->select()->from($this->tb)->where('link_download', '=', $link)->getOne();
        return $query;
    }
}