<html>
<head>
	<?php $this->output($temaAdmin.'meta');?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />
	<link href='<?php echo $asset;?>css/style.css' rel='stylesheet' type='text/css' />
	<link href='<?php echo $asset;?>css/pagination.css' rel='stylesheet' type='text/css' />
	<link href='<?php echo $asset;?>css/responsive.css' rel='stylesheet' type='text/css' />
	<!-- - -->
	<script src='<?php echo $asset;?>js/jquery.js' type='text/javascript'></script>
	<script src='<?php echo $asset;?>js/pd.js' type='text/javascript'></script>
	<script src='<?php echo $asset;?>js/basics.js' type='text/javascript'></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=136269433249394";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
</head>

<body>

<?php $this->output($temaAdmin.'header');?>

	<div id='container'>
		<?php $this->output($temaAdmin.'menu');?>

		<div class="content">
			5 file yang paling banyak di download.<hr>
        	<ul class="posts">
        		<?php
        			if(!empty($data)){
        				foreach ($data as $data) {
        					echo "
        		<li>
        			<small class=\"datetime muted\" data-time=\"<?php echo $data->tgl_posting;?> +0000\">
        				".$this->library->tgl_indonesia(substr($data->tgl_posting, 0,10))->tgl_indo()." - ".$data->hit."x Download
        			</small>
        			<a href='".$url."donlod/detail/".$data->id."' title=\"Download ".$data->judul_artikel."\">".$data->judul_artikel."</a>
        		</li>
        					";
        				}
        			}else{
        				echo "<li>
	        			Tidak ada file.
        				</li>";
        			}
        		?>
        	</ul>
		</div>
	</div>

<?php $this->output($temaAdmin.'footer');?>

</body>
</html>