<?php 
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-22 13:30:00
	**/
?>
		<div class="block">
			<!--<a target="_top" class="main" href="<?php echo $this->location('admin');?>">Beranda</a>-->
			<a target="_top" class="main" href="<?php echo $this->location('admin/tambah');?>">Tambah Katalog Download</a>
			<a target="_top" class="main" href="<?php echo $this->location('admin/file');?>">Top File</a>
			<a target="_top" class="main" href="<?php echo $this->location('admin/akun');?>">Top Downloader</a>
			<?php
			if($this->session->getValue('isAdmin')){
    			echo "<a target=\"_top\" class=\"main\" href='".$this->location('admin/keluar')."'>Keluar</a>";
    		}else{
    			echo "<a target=\"_top\" class=\"main\" href='".$this->location('panel/masuk')."'>Masuk</a>";
    		}
    		?>
		</div>
		