<?php 
namespace Modules\Admin\Controllers;
use Models,Resources;

include_once (dirname(__FILE__) . "/Main.php");

class Download extends Main{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-02-06 15:52:13
	**/

	function __construct(){
		parent::__construct();
		// Load model m_download
		$this->dw = new Models\M_download;
	}

	public function index($hal=1){
		$this->global_data['active_menu'] = "download";
		$this->global_data['title'] = "Daftar Download";
        
        $hal = (int) $hal;
		$limit = $_SESSION['site_page_admin'];

		$this->global_data['hal'] = $hal;

		$this->global_data['data'] = $this->dw->ambilDonlod($hal, $limit);

		$this->global_data['pageLinks'] = $this->pagination->setOption(
			array(
		    	'limit' => $limit,
		    	'base' => $this->location('admin/download/index/%#%/'),
		    	'total' => count($this->dw->tampil()),
		    	'current' => $hal,
		    	'nextText' => '>>',
		    	'prevText' => '<<'
			)
	    )->getUrl();

		$this->tampilan('download/list');
	}

	public function tambah(){
		$this->global_data['active_menu'] = "tambah_download";
		$this->global_data['title'] = "Tambah Download";

		if($this->request->post('A_simpan')){
			$link_artikel = $this->resources->Validation->isUrl($this->request->post('A_linkA'));
			$link_download = $this->request->post('A_linkD');

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
					$htmlNotif = "
						<div class=\"alert alert-success alert-dismissable\">
							<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
							<h4><i class=\"icon fa fa-ban\"></i> Alert!</h4>
							Berhasil disimpan!
						</div>
					"; 
					$this->global_data['notifikasi'] = $htmlNotif;
				}else{
					$htmlNotif = "
						<div class=\"alert alert-info alert-dismissable\">
							<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
							<h4><i class=\"icon fa fa-ban\"></i> Alert!</h4>
							Link  sudah ada di katalog : ".$cek_link->judul_artikel.".
						</div>
					"; 
					$this->global_data['notifikasi'] = $htmlNotif;
				}
				
			}else{
				$htmlNotif = "
					<div class=\"alert alert-danger alert-dismissable\">
						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
						<h4><i class=\"icon fa fa-ban\"></i> Alert!</h4>
						Link tidak valid.
					</div>
				"; 
				$this->global_data['notifikasi'] = $htmlNotif; 
			}
		}

		$this->tampilan('download/form');
	}

	public function ubah($id=null){
		$id = (int) $id;
		if(!empty($id)){
			// Ambil satu data
			$this->global_data['data'] = $this->dw->lihat($id);
			// Kalo kosong, maka di alihkan ke halaman daftar download
			if(empty($this->global_data['data'])){
				$this->redirect('admin/download');
			}

			$this->global_data['active_menu'] = "ubah_download";
			$this->global_data['title'] = "Ubah Download ".$this->global_data['data']->judul_artikel;

			//aksi ubah
			if($this->request->post('A_simpan')){
				$link_artikel = $this->resources->Validation->isUrl($this->request->post('A_linkA'));
				$link_download = $this->request->post('A_linkD');

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
					$htmlNotif = "
						<div class=\"alert alert-success alert-dismissable\">
							<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
							<h4><i class=\"icon fa fa-ban\"></i> Alert!</h4>
							Berhasil diubah!
						</div>
					"; 
					$this->global_data['notifikasi'] = $htmlNotif;
				}else{
					$htmlNotif = "
						<div class=\"alert alert-danger alert-dismissable\">
							<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
							<h4><i class=\"icon fa fa-ban\"></i> Alert!</h4>
							Link tidak valid.
						</div>
					"; 
					$this->global_data['notifikasi'] = $htmlNotif; 
				}

			}

			$this->tampilan('download/form');
		}else{
			$this->redirect('admin/download');
		}
	}

	public function hapus($id=null){
		$id = (int) $id;
		if(!empty($id)){
			$this->dw->hapus($id);
			$this->redirect('admin/download');
		}else{
			$this->redirect('admin/download');
		}
	}

}