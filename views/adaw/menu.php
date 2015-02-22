<?php 
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-18 17:53:42
	**/
?>
		<div class="block">
			<a target="_top" class="main" href="<?php echo $this->location();?>">Beranda</a>
			<a target="_top" class="main" href="<?php echo $this->location('daftar/file');?>">Top File</a>
			<a target="_top" class="main" href="<?php echo $this->location('daftar/akun');?>">Top Downloader</a>
			<?php
			if($this->session->getValue('isLogin')){
    			echo "<a target=\"_top\" class=\"main\" href='".$this->location('donlod/keluar')."'>Keluar</a>";
    		}else{
    			echo "<a target=\"_top\" class=\"main\" href='".$this->location('donlod/masuk')."'>Masuk</a>";
    		}
    		?>
		</div>