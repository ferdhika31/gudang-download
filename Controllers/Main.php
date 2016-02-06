<?php 
namespace Controllers;
use Resources, Models;

class Main extends Resources\Controller{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-02-05 20:40:00
	**/

	function __construct(){
		parent::__construct();

		$this->pengaturan = new Models\M_pengaturan;
		$this->session = new Resources\Session();
		$this->theme = $_SESSION['site_theme'];
		$this->request = new Resources\Request;

		// Global data buat di inject ke view
		$this->global_data = array();

		$this->global_data['asset'] = $this->uri->baseUri."assets/";
		$this->global_data['asset_theme'] = $this->uri->baseUri."assets/themes/".$this->theme."/";

		$this->global_data['base_url'] = $this->uri->baseUri;
	}

	protected function tampilan($view_name){
		$this->output($this->theme.'/meta',$this->global_data);
		$this->output($this->theme.'/header',$this->global_data);
		$this->output($this->theme.'/'.$view_name,$this->global_data);
		$this->output($this->theme.'/footer',$this->global_data);
	}

}