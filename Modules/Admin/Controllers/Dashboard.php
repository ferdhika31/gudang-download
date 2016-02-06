<?php 
namespace Modules\Admin\Controllers;
use Models;

include_once (dirname(__FILE__) . "/Main.php");

class Dashboard extends Main{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-02-05 20:28:53
	**/

	function __construct(){
		parent::__construct();
		$this->dw = new Models\M_download;
	}

	public function index(){
		$this->global_data['active_menu'] = "dashboard";
		$this->global_data['title'] = "Dashboard";

		$this->global_data['akun'] = $this->admin->semuaAkun();
		$this->global_data['dw'] = $this->dw->tampil();

		$this->tampilan('dashboard');
	}

	public function keluar(){
		$this->session->destroy();
		$this->redirect('downlod');
	}

}	