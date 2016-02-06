<?php 
namespace Controllers;
use Models;

include_once (dirname(__FILE__) . "/Main.php");

class Auth extends Main{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-02-05 20:29:00
	**/

	function __construct(){
		parent::__construct();

		//jika session login sudah di set maka di direk ke halaman admin
    	if($this->session->getValue('isAdmin')){
    		$this->redirect('admin/dashboard');	
    	}

    	$this->admin = new Models\M_admin;
	}

	public function index(){
		$this->global_data['title'] = "Login";

		// Event login
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
				$this->redirect('admin/dashboard');
			}else{

				$this->global_data['message'] = 'Username atau password salah gan!';
			}
		}

		$this->output('masuk',$this->global_data);
	}
}