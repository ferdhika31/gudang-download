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
			<center><h2>Katalog Download</h2></center>
			<hr>
			<form action="" method="POST">
			<label for="jArtikel">Judul Artikel</label>
			<input type="text" name="A_judul" id="jArtikel" value="<?php echo $data->judul_artikel;?>" />
			<label for="lArtikel">Link Artikel</label>
			<input type="text" name="A_linkA" id="lArtikel" value="<?php echo $data->link_artikel;?>" />
			<label for="lDownload">Link Download</label>
			<input type="text" name="A_linkD" id="lDownload" value="<?php echo $data->link_download;?>" />
			<center><button name="A_ubah" value="Ubah"><i class='fa fa-save'></i> Ubah</button></center></form>
			<?php echo $error;?>
		</div>
	</div>
<?php $this->output($temaAdmin.'footer');?>
</body>
</html>