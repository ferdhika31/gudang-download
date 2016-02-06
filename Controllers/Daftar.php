<?php 
namespace Controllers;
use Models,Resources;

include_once (dirname(__FILE__) . "/Main.php");

class Daftar extends Main{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-18 23:24:18
	**/

	public function __construct(){
		parent::__construct();
		$this->dw = new Models\M_download;
		$this->pengguna = new Models\M_pengguna;
	}
	public function index(){
		$this->redirect('donlod');
	}

	public function file(){			
        $this->global_data['data'] = $this->dw->tampilTop();

        $this->tampilan('topFile');
	}

	public function akun(){			
        $this->global_data['data'] = $this->pengguna->tampilTop();

        $this->tampilan('topUser');
	}
}
