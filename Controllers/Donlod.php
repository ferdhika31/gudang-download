<?php 
namespace Controllers;
use Models,Resources;

include_once (dirname(__FILE__) . "/Main.php");

class Donlod extends Main{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-18 16:44:36
	**/

	function __construct(){
		parent::__construct();
		
		$this->dw = new Models\M_download;
		$this->pengguna = new Models\M_pengguna;
		$this->pagination = new Resources\Pagination; 

	}

	public function index($hal=1){
		if(!$this->session->getValue('isLogin')){
    		$this->redirect('donlod/masuk');	
    	}
        
        $hal = (int) $hal;
		$limit = $_SESSION['site_page'];
		
		$this->global_data['hal'] = $hal;
			
      	$this->global_data['data'] = $this->dw->ambilDonlod($hal, $limit);
	
		$this->global_data['pageLinks'] = $this->pagination->setOption(
			array(
		    	'limit' => $limit,
		    	'base' => $this->location('donlod/index/%#%/'),
		    	'total' => count($this->dw->tampil()),
		    	'current' => $hal,
		    	'nextText' => '>>',
		    	'prevText' => '<<'
			)
	    )->getUrl();
        
        $this->tampilan('dashboard');
	}

	public function masuk(){
		//redirect url ref link
    	if($this->request->get('url')){
    		$ref_url = $this->request->get('url');
    	}else{
    		$ref_url = $this->uri->baseUri;
    	}

		// //jika session login sudah di set maka di direk ke halaman dashboard
    	if($this->session->getValue('isLogin')){
    		$this->redirect($ref_url);	
    	}

    	$this->global_data['ref_url'] = "/?url=".$ref_url;


    	//buat tombol masuk di tekan
		if(isset($_POST['A_masuk'])){
			$email = $this->request->post('A_email');
			$cek_mail = $this->resources->Validation->isEmail($email);

			if(empty($cek_mail)){
				$notifHtml = "
					<div class=\"alert alert-info alert-dismissable\">
						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
						<h4><i class=\"icon fa fa-ban\"></i> Alert!</h4>
						Email tidak valid!
					</div>
				";

				$this->global_data['notif'] = $notifHtml;
			}else{
				$user = $this->pengguna->masuk($email);
				if($user){
					if($user->stt==1){
						// Username dan password sudah benar, simpan nilai ke dalam session
						$data = array(
							'isLogin' => true,
							'email'	=> $user->email,
							'tgl_daftar' => $user->tgl_daftar
							);
						$this->session->setValue($data);

						// Redirect ke halaman utama.
						$this->redirect($ref_url);
					}else if($user->stt==2){
						$notifHtml = "
						<div class=\"alert alert-warning alert-dismissable\">
							<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
							<h4><i class=\"icon fa fa-ban\"></i> Alert!</h4>
							Email belum di aktivasi gan.
						</div>
					";

					$this->global_data['notif'] = $notifHtml;
					}else{ //banned
						$notifHtml = "
							<div class=\"alert alert-danger alert-dismissable\">
								<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
								<h4><i class=\"icon fa fa-ban\"></i> Alert!</h4>
								Email di banned gan.
							</div>
						";

						$this->global_data['notif'] = $notifHtml;
					}
					
				}else{
					$notifHtml = "
						<div class=\"alert alert-warning alert-dismissable\">
							<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
							<h4><i class=\"icon fa fa-ban\"></i> Alert!</h4>
							Email belum terdaftar gan.
						</div>
					";

					$this->global_data['notif'] = $notifHtml;
				}
			}
		}
   
        $this->tampilan('masuk');
	}

	public function daftar(){
		//redirect url ref link
    	if($this->request->get('url')){
    		$ref_url = $this->request->get('url');
    	}else{
    		$ref_url = $this->uri->baseUri;
    	}

		//jika session login sudah di set maka di direk ke halaman dashboard
    	if($this->session->getValue('isLogin')){
    		$this->redirect($ref_url);	
    	}

    	$this->global_data['ref_url'] = "/?url=".$ref_url;

		//buat tombol daftar di tekan
		if (isset($_POST['A_daftar'])){
			$email = $this->request->post('A_email');
			$cek_mail = $this->resources->Validation->isEmail($email);

			if(empty($cek_mail)){
				$notifHtml = "
						<div class=\"alert alert-danger alert-dismissable\">
							<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
							<h4><i class=\"icon fa fa-ban\"></i> Alert!</h4>
							Email tidak valid gan.
						</div>
					";

					$this->global_data['notif'] = $notifHtml;
			}else{
				$user = $this->pengguna->cek_email($email);
				if(!$user){
					$dat = array(
						'email' => $email,
						'stt' => 1,
						'aktivasi' => '',
						'hit' => 0,
						'tgl_daftar' => Date("Y-m-d H:i:s"),
						'tgl_aktivasi' => Date("Y-m-d H:i:s"),
						'ip' => $_SERVER['REMOTE_ADDR']
					);

					$this->pengguna->simpan($dat);
					// Redirect ke halaman sebelumnya.
					//$this->redirect($ref_url);
					$notifHtml = "
						<div class=\"alert alert-warning alert-dismissable\">
							<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
							<h4><i class=\"icon fa fa-ban\"></i> Alert!</h4>
							Sukses mendaftar, silahkan <a href='".$this->uri->baseUri."donlod/masuk'>login gan.</a>
						</div>
					";

					$this->global_data['notif'] = $notifHtml;
				}else{
					$notifHtml = "
						<div class=\"alert alert-warning alert-dismissable\">
							<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
							<h4><i class=\"icon fa fa-ban\"></i> Alert!</h4>
							Email sudah terdaftar gan.
						</div>
					";

					$this->global_data['notif'] = $notifHtml;
				}
			}
		}

		$this->tampilan('daftar'); //load view
	}

	public function detail(){
		$id = ((int) $this->resource->uri->path(2)!=0) ? $this->resource->uri->path(2) : $this->redirect('donlod');

		//cek login apa belum
		if(!$this->session->getValue('isLogin')){ 
    		$this->redirect('donlod/masuk/?url='.$this->location('donlod/detail/'.$id));	
    	}

		$this->global_data['data'] = $this->dw->lihat($id);

		$this->tampilan('detail');
	}

	public function ambil(){
		if($this->request->post('donlod')){
			$id = $this->request->post('A_id');
			$url = $this->request->post('A_url');
			$this->dw->hit($id);
			$this->pengguna->hit($_SESSION['email']);
			$this->redirect($url);
		}else{
			$this->redirect();
		}
	}

	public function keluar(){
		$this->session->destroy();
		$this->redirect('donlod');
	}
}