<?php 
namespace Modules\Admin\Controllers;
use Models,Resources;

include_once (dirname(__FILE__) . "/Main.php");

class Pengaturan extends Main{	

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-02-06 18:13:12
	**/

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->global_data['active_menu'] = "pengaturan";
		$this->global_data['title'] = "Pengaturan";

		$this->global_data['data'] = $this->pengaturan->tampil();

		$this->global_data['folderTema'] = dir(getcwd()."/assets/themes");

		if($this->request->post('A_simpan')){
			foreach ($this->global_data['data'] as $pengaturan){
				$name = $this->request->post('A_'.$pengaturan->tipe_pengaturan);

				// echo $pengaturan['id'].$name."<br>";
				//$pengaturan['setting_tipe']
				$inp = ['value_pengaturan' => $name];
				$dimana = ['id' => $pengaturan->id];

				$this->pengaturan->ubah($inp,$dimana);
			}
			$this->redirect('admin/pengaturan');
		}

		$this->tampilan('pengaturan');
	}

}