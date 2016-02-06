<?php 
namespace Modules\Admin\Controllers;
use Models,Resources;

include_once (dirname(__FILE__) . "/Main.php");

class Akun extends Main{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-02-06 17:10:46
	**/

	function __construct(){
		parent::__construct();
		
	}

	public function index($hal=1){
		$this->global_data['active_menu'] = "akun";
		$this->global_data['title'] = "Daftar Akun";
        
        $hal = (int) $hal;
		$limit = $_SESSION['site_page_admin'];

		$this->global_data['hal'] = $hal;

		$this->global_data['data'] = $this->admin->ambilAkun($hal, $limit);

		$this->global_data['pageLinks'] = $this->pagination->setOption(
			array(
		    	'limit' => $limit,
		    	'base' => $this->location('admin/akun/index/%#%/'),
		    	'total' => count($this->admin->semuaAkun()),
		    	'current' => $hal,
		    	'nextText' => '>>',
		    	'prevText' => '<<'
			)
	    )->getUrl();

		$this->tampilan('akun/list');
	}

	public function aktiv($id=null){
		$id = (int) $id;
		if(!empty($id)){
			$data = ['stt' => 1];
			$id = ['id' => $id];
			$this->admin->ubahStatus($data,$id);
			$this->redirect('admin/akun');
		}else{
			$this->redirect('admin/akun');
		}
	}

	public function deaktiv($id=null){
		$id = (int) $id;
		if(!empty($id)){
			$data = ['stt' => 2];
			$id = ['id' => $id];
			$this->admin->ubahStatus($data,$id);
			$this->redirect('admin/akun');
		}else{
			$this->redirect('admin/akun');
		}
	}

	public function banned($id=null){
		$id = (int) $id;
		if(!empty($id)){
			$data = ['stt' => 3];
			$id = ['id' => $id];
			$this->admin->ubahStatus($data,$id);
			$this->redirect('admin/akun');
		}else{
			$this->redirect('admin/akun');
		}
	}
}