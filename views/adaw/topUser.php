<html>
<head>
	<?php $this->output($tema.'meta');?>
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

<?php $this->output($tema.'header');?>

	<div id='container'>
		<?php $this->output($tema.'menu');?>

		<div class="content">
        	<ul class="posts">
        		<?php
        			if(!empty($data)){
        				$no=1;
        				foreach ($data as $data) {
        					echo "
        		<li>
        			".$no.". ".substr($data->email, 0,4)."xxx (".$data->hit."x nge-download)
        		</li>
        					";
        				$no++;
        				}
        			}
        		?>
        	</ul>
		</div>
	</div>

<?php $this->output($tema.'footer');?>

</body>
</html>