<?php 
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-18 23:24:18
	**/
namespace Controllers;
use Resources, Models;

class Daftar extends Resources\Controller{
	public function __construct(){
		parent::__construct();
		$this->pengaturan = new Models\M_pengaturan;
		$this->session = new Resources\Session();
		$this->theme = $_SESSION['site_theme'];
		$this->dw = new Models\M_download;
		$this->pengguna = new Models\M_pengguna;
	}
	public function index(){
		$this->redirect('donlod');
	}

	public function file(){
		$limit = $_SESSION['site_page'];
		//$piew['url'] = $this->uri->baseUri;
		$piew['url'] = $this->location();
		//$piew['asset'] = $this->location('assets')."/".$this->theme."/";
		$piew['asset'] = $this->uri->baseUri."assets/".$this->theme."/";
		$piew['tema'] = $this->theme."/";
			
        $piew['data'] = $this->dw->tampilTop();

        $this->output($this->theme.'/topFile', $piew);
	}

	public function akun(){
		$limit = $_SESSION['site_page'];
		//$piew['url'] = $this->uri->baseUri;
		$piew['url'] = $this->location();
		//$piew['asset'] = $this->location('assets')."/".$this->theme."/";
		$piew['asset'] = $this->uri->baseUri."assets/".$this->theme."/";
		$piew['tema'] = $this->theme."/";
			
        $piew['data'] = $this->pengguna->tampilTop();

        $this->output($this->theme.'/topUser', $piew);
	}
}
