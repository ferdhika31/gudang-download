<?php 
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-18 16:44:36
	**/
namespace Controllers;
use Resources, Models;

class Donlod extends Resources\Controller{

	function __construct(){
		parent::__construct();
		$this->pengaturan = new Models\M_pengaturan;
		$this->session = new Resources\Session();
		$this->theme = $_SESSION['site_theme'];
		$this->dw = new Models\M_download;
		$this->pengguna = new Models\M_pengguna;
		$this->pagination = new Resources\Pagination; 
		$this->request = new Resources\Request;
	}

	public function index($hal=1){
		if(!$this->session->getValue('isLogin')){
    		$this->redirect('donlod/masuk');	
    	}
		$this->pagination = new Resources\Pagination();
        
        $hal = (int) $hal;
		$limit = $_SESSION['site_page'];
		//$piew['url'] = $this->uri->baseUri;
		$piew['url'] = $this->location();
		//$piew['asset'] = $this->location('assets')."/".$this->theme."/";
		$piew['asset'] = $this->uri->baseUri."assets/".$this->theme."/";
		$piew['tema'] = $this->theme."/";
		$piew['hal'] = $hal;
			
        $piew['data'] = $this->dw->ambilDonlod($hal, $limit);
	
		$piew['pageLinks'] = $this->pagination->setOption(
			array(
		    	'limit' => $limit,
		    	'base' => $this->location('donlod/index/%#%/'),
		    	'total' => count($this->dw->tampil()),
		    	'current' => $hal,
		    	'nextText' => 'Selanjutnya',
		    	'prevText' => 'Sebelumnya'
			)
	    )->getUrl();
        
        $this->output($this->theme.'/dashboard', $piew);
	}

	public function masuk(){
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

    	//variabel error pada halaman form login
    	$piew['error'] = '';
    	$piew['ref_url'] = "/?url=".$ref_url;
    	//$piew['url'] = $this->uri->baseUri;
    	$piew['url'] = $this->location();
		//$piew['asset'] = $this->location('assets')."/".$this->theme."/";
		$piew['asset'] = $this->uri->baseUri."assets/".$this->theme."/";
		$piew['tema'] = $this->theme."/";

    	//buat tombol masuk di tekan
		if(isset($_POST['A_masuk'])){
			$email = $this->request->post('A_email');
			$cek_mail = $this->resources->Validation->isEmail($email);

			if(empty($cek_mail)){
				$piew['error'] = "Email tidak valid!";
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
						$piew['error'] = 'Email di banned gan.';
					}else{ //banned
						$piew['error'] = 'Email belum di aktivasi gan.';
					}
					
				}else{
					$piew['error'] = 'Email belum terdaftar gan.';
				}
			}
		}
        
        //echo $ref_url;
        $this->output($this->theme.'/masuk', $piew); //load view
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

    	//variabel error pada halaman form login
    	$piew['error'] = '';
    	$piew['ref_url'] = "/?url=".$ref_url;
    	//$piew['url'] = $this->uri->baseUri;
    	$piew['url'] = $this->location();
		//$piew['asset'] = $this->location('assets')."/".$this->theme."/";
		$piew['asset'] = $this->uri->baseUri."assets/".$this->theme."/";
		$piew['tema'] = $this->theme."/";

		//buat tombol daftar di tekan
		if (isset($_POST['A_daftar'])){
			$email = $this->request->post('A_email');
			$cek_mail = $this->resources->Validation->isEmail($email);

			if(empty($cek_mail)){
				$piew['error'] = "Email tidak valid!";
			}else{
				$user = $this->pengguna->cek_email($email);
				if(!$user){
					$dat = array(
						'email' => $email,
						'stt' => 1,
						'aktivasi' => '',
						'hit' => 0,
						'tgl_daftar' => Date("Y-m-d H:i:s"),
						'tgl_aktivasi' => Date("Y-m-d H:i:s")
					);

					$this->pengguna->simpan($dat);
					// Redirect ke halaman sebelumnya.
					//$this->redirect($ref_url);
					$piew['error'] = 'Sukses mendaftar, silahkan <a href="'.$this->uri->baseUri.'donlod/masuk">login gan.</a>';
				}else{
					$piew['error'] = 'Email sudah terdaftar.';
				}
			}
		}

		

		$this->output($this->theme.'/daftar', $piew); //load view
	}

	public function keluar(){
		$this->session->destroy();
		$this->redirect('donlod');
	}

	public function detail(){
		$id = ((int) $this->resource->uri->path(2)!=0) ? $this->resource->uri->path(2) : $this->redirect('donlod');

		//cek login apa belum
		if(!$this->session->getValue('isLogin')){ 
    		$this->redirect('donlod/masuk/?url='.$this->location('donlod/detail/'.$id));	
    	}

		$piew = array(
			//'url' => $this->uri->baseUri,
			'url' => $this->location(),
			//'asset' => $this->location('assets')."/".$this->theme."/",
			'asset' => $this->uri->baseUri."assets/".$this->theme."/",
			'tema' => $this->theme."/",
			'data' => $this->dw->lihat($id)
		);

		$this->output($this->theme.'/detail', $piew);
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
}