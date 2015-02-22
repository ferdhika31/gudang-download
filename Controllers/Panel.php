<?php 
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-19 13:05:03
	**/
namespace Controllers;
use Resources, Models;

class Panel extends Resources\Controller{
	public function __construct(){
		parent::__construct();
		$this->pengaturan = new Models\M_pengaturan;
		$this->session = new Resources\Session();
		$this->theme = $_SESSION['site_theme'];
		$this->themeAdmin = "panel/".$_SESSION['site_theme'];
		$this->admin = new Models\M_admin;
		$this->request = new Resources\Request;

		//jika session login sudah di set maka di direk ke halaman admin
    	if($this->session->getValue('isAdmin')){
    		$this->redirect('admin');	
    	}
	}
	public function index(){
		$this->redirect('panel/masuk');
	}

	public function masuk(){
		//variabel error pada halaman form login
    	$piew['error'] = '';
    	//$piew['url'] = $this->uri->baseUri;
    	$piew['url'] = $this->location();
		//$piew['asset'] = $this->location('assets')."/".$this->theme."/";
		$piew['asset'] = $this->uri->baseUri."assets/".$this->theme."/";
		$piew['tema'] = $this->theme."/";
		$piew['temaAdmin'] = $this->themeAdmin."/";

		if($this->request->post('masuk')){
			$username = $this->request->post('A_username');
			$password = md5($this->request->post('A_password'));

			$mimin = $this->admin->masuk($username,$password);

			if($mimin){
				$data = array(
					'isAdmin' => true,
					'username'	=> $mimin->username,
					'nama'		=> $mimin->nama
				);
				$this->session->setValue($data);
				$this->redirect('admin');
			}else{
				$piew['error'] = 'Username atau password salah gan!';
			}
		}	
		
		$this->output($this->themeAdmin.'/masuk',$piew);
	}
}