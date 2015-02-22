<html>
<head>
    <?php $this->output($temaAdmin.'meta');?>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />
	<link href='<?php echo $asset;?>css/style.css' rel='stylesheet' type='text/css' />
	<link href='<?php echo $asset;?>css/pagination.css' rel='stylesheet' type='text/css' />
	<link href='<?php echo $asset;?>css/responsive.css' rel='stylesheet' type='text/css' />
	<link href="<?php echo $asset;?>css/responsive.min.css" rel="stylesheet" type='text/css' />
	<link href="<?php echo $asset;?>css/font-awesome.css" rel="stylesheet" type='text/css' />
	<!-- - -->
	<script src='<?php echo $asset;?>js/jquery.js' type='text/javascript'></script>
	<script src='<?php echo $asset;?>js/pd.js' type='text/javascript'></script>
	<script src='<?php echo $asset;?>js/basics.js' type='text/javascript'></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>

<body>
	<?php $this->output($temaAdmin.'header');?>
	<div id='container'>
		<div class="block">
			<?php $this->output($temaAdmin.'menu');?>
		</div>

		<div class="content">
			Selamat datang <?php echo $this->session->getValue('nama');?> :)
			<hr>
			<?php
				if(!empty($data)){
       				foreach ($data as $data) { 
       		?>
       		<div id="isiDownload">
				<label><?php echo $this->library->tgl_indonesia(substr($data->tgl_posting, 0,10))->nama_hari().", ".$this->library->tgl_indonesia(substr($data->tgl_posting, 0,10))->tgl_indo();?></label>
				<a href="<?php echo $data->link_artikel;?>" target="_blank"><?php echo $data->judul_artikel; ?></a>
				<hr>
				<sup><?php echo $data->hit;?>x Didownload</sup><br>
				<a href="<?php echo $this->location('admin/ubah/').$data->id;?>">Ubah</a> | 
				<a href="<?php echo $this->location('admin/hapus/').$data->id;?>">Hapus</a> | 
				<a href="<?php echo $this->location('donlod/detail/').$data->id;?>" target="_blank">Link Download</a>
			</div>
			<br>
       		<?php
       				}
       			}
			?>
			<div class="pagination">
        	<?php if($pageLinks):?>
                <ul>
                    <?php foreach($pageLinks as $paging):?>
                    	<?php
                    	$aktif = (strip_tags($paging)==$hal) ? 'active' : '';
                    	?>
                        <li class="page <?php echo $aktif;?>"><?php echo $paging;?></li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
            </div>
		</div>
	</div>
<?php $this->output($temaAdmin.'footer');?>
</body>
</html>