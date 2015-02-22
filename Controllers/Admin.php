<?php 
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-19 13:05:12
	**/
namespace Controllers;
use Resources, Models;

class Admin extends Resources\Controller{
	public function __construct(){
		parent::__construct();
		$this->pengaturan = new Models\M_pengaturan;
		$this->session = new Resources\Session();
		$this->theme = $_SESSION['site_theme'];
		$this->themeAdmin = "panel/".$_SESSION['site_theme'];
		$this->admin = new Models\M_admin;
		$this->dw = new Models\M_download;
		$this->pengguna = new Models\M_pengguna;
		$this->pagination = new Resources\Pagination; 
		$this->request = new Resources\Request;

		//kalo session belum di set di alihkan ke halaman beranda
		if(!$this->session->getValue('isAdmin')){
    		$this->redirect('donlod');	
    	}
	}
	
	public function index($hal=1){

		$this->pagination = new Resources\Pagination();
        
        $hal = (int) $hal;
		$limit = $_SESSION['site_page_admin'];

		//$piew['url'] = $this->uri->baseUri;
    	$piew['url'] = $this->location();
		//$piew['asset'] = $this->location('assets')."/".$this->theme."/";
		$piew['asset'] = $this->uri->baseUri."assets/".$this->theme."/";
		$piew['tema'] = $this->theme."/";
		$piew['temaAdmin'] = $this->themeAdmin."/";
		$piew['hal'] = $hal;

		$piew['data'] = $this->dw->ambilDonlod($hal, $limit);

		$piew['pageLinks'] = $this->pagination->setOption(
			array(
		    	'limit' => $limit,
		    	'base' => $this->location('admin/index/%#%/'),
		    	'total' => count($this->dw->tampil()),
		    	'current' => $hal,
		    	'nextText' => 'Selanjutnya',
		    	'prevText' => 'Sebelumnya'
			)
	    )->getUrl();

		$this->output($this->themeAdmin.'/dashboard',$piew);
	}

	public function tambah(){
		$piew = array(
			'url' => $this->location(),
			'asset' => $this->uri->baseUri."assets/".$this->theme."/",
			'tema' => $this->theme."/",
			'temaAdmin' => $this->themeAdmin."/",
			'error'	=> ''
		); 

		if($this->request->post('A_simpan')){
			$link_artikel = $this->resources->Validation->isUrl($this->request->post('A_linkA'));
			$link_download = $this->resources->Validation->isUrl($this->request->post('A_linkD'));

			if(!empty($link_artikel) || !empty($link_download)){
				//cek link
				$cek_link = $this->dw->cek_link_download($link_download);
				if(!$cek_link){
					$data = array(
						'judul_artikel' => $this->request->post('A_judul'), 
						'link_artikel'	=> $link_artikel,
						'link_download'	=> $link_download,
						'tgl_posting'	=> date("Y-m-d H:i:s"),
						'hit'	=> 0
					);
					$this->dw->simpan($data);
					$piew['error'] = 'Berhasil disimpan!';
				}else{
					$piew['error'] = 'Link sudah ada di katalog : '.$cek_link->judul_artikel;
				}
				
			}else{
				$piew['error'] = "Link tidak valid"; 
			}
		}
			

		$this->output($this->themeAdmin.'/tambah',$piew);
	}

	public function ubah($id=null){
		$id = (int) $id;
		if(!empty($id)){
			$piew = array(
				'url' => $this->location(),
				'asset' => $this->uri->baseUri."assets/".$this->theme."/",
				'tema' => $this->theme."/",
				'temaAdmin' => $this->themeAdmin."/",
				'error'	=> '',
				'data'	=> $this->dw->lihat($id)
			); 
			//aksi ubah
			if($this->request->post('A_ubah')){
				$link_artikel = $this->resources->Validation->isUrl($this->request->post('A_linkA'));
				$link_download = $this->resources->Validation->isUrl($this->request->post('A_linkD'));

				if(!empty($link_artikel) || !empty($link_download)){
					$data = array(
						'judul_artikel' => $this->request->post('A_judul'),
						'link_artikel'	=> $link_artikel,
						'link_download'	=> $link_download
					);
					$id = array(
						'id' => $id
					);
					$this->dw->ubah($data,$id);
					$piew['error'] = 'Berhasil di ubah!';
				}else{
					$piew['error'] = "Link tidak valid"; 
				}

			}

			$this->output($this->themeAdmin.'/ubah',$piew);
		}else{
			$this->redirect('admin');
		}
	}

	public function akun(){
		$limit = $_SESSION['site_page'];
		//$piew['url'] = $this->uri->baseUri;
		$piew['url'] = $this->location();
		//$piew['asset'] = $this->location('assets')."/".$this->theme."/";
		$piew['asset'] = $this->uri->baseUri."assets/".$this->theme."/";
		$piew['tema'] = $this->theme."/";
		$piew['temaAdmin'] = $this->themeAdmin."/";
			
        $piew['data'] = $this->pengguna->tampilTop();

        $this->output($this->themeAdmin.'/topUser', $piew);
	}

	public function file(){
		$limit = $_SESSION['site_page'];
		//$piew['url'] = $this->uri->baseUri;
		$piew['url'] = $this->location();
		//$piew['asset'] = $this->location('assets')."/".$this->theme."/";
		$piew['asset'] = $this->uri->baseUri."assets/".$this->theme."/";
		$piew['tema'] = $this->theme."/";
		$piew['temaAdmin'] = $this->themeAdmin."/";
			
        $piew['data'] = $this->dw->tampilTop();

        $this->output($this->themeAdmin.'/topFile', $piew);
	}

	public function hapus($id=null){
		$id = (int) $id;
		if(!empty($id)){
			$this->dw->hapus($id);
			$this->redirect('admin');
		}else{
			$this->redirect('admin');
		}
	}

	public function keluar(){
		$this->session->destroy();
		$this->redirect('panel');
	}
}