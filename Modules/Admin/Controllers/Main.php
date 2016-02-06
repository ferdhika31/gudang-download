<?php 
namespace Modules\Admin\Controllers;
use Resources, Models;

class Main extends Resources\Controller{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-02-05 20:52:38
	**/

	function __construct(){
		parent::__construct();
		// Load model
		$this->pengaturan = new Models\M_pengaturan;
		// Load library
		$this->session = new Resources\Session();
		$this->request = new Resources\Request;
		$this->pagination = new Resources\Pagination();

		//kalo session belum di set di alihkan ke halaman beranda
		if(!$this->session->getValue('isAdmin')){
    		$this->redirect($this->location('donlod'));	
    	}

    	// Add model class 
    	$this->admin = new Models\M_admin;

    	// Global data buat di inject ke view
		$this->global_data = array();

		$this->global_data['asset'] = $this->uri->baseUri."assets/";

		$this->global_data['akunInfo'] = $this->admin->infoUser($this->session->getValue('username'));
	}

	protected function tampilan($view_name){
		$this->output('meta',$this->global_data);
		$this->output('header',$this->global_data);
		$this->output('menu',$this->global_data);
		$this->output($view_name,$this->global_data);
		$this->output('footer',$this->global_data);
	}

}