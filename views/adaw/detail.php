<html>
<head>
	<?php $this->output($tema.'meta');?>
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

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=136269433249394";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
	function slideNews()
	{
	    akhir = $('ul#kotakticker li:last').hide().remove();
	    $('ul#kotakticker').prepend(akhir);
        $('ul#kotakticker li:first').slideDown("slow");
	}
	setInterval(slideNews, 4000);
</script> 
</head>

<body>

<?php $this->output($tema.'header');?>

    <div id='container'>
    	<?php $this->output($tema.'menu');?>
		
		<div class="content">

			<center><h3><?php echo $data->judul_artikel;?></h3></center>
			<hr>
			<center>
				<form action='<?php echo $this->location('donlod/ambil');?>' method='post'>
					<button onclick="location.href='<?php echo $url;?>'"><i class='fa fa-home'></i> Beranda</button>
					<button onclick="location.href='<?php echo $data->link_artikel;?>'"><i class='fa fa-sign-in'></i> Baca Artikel</button>
					<input type='hidden' name='A_id' value="<?php echo $data->id;?>" />
					<input type='hidden' name='A_url' value="<?php echo $data->link_download;?>" />
					<button value="Download" name="donlod"><i class='fa fa-download'></i> Download</button>
				</form>
			<div class="fb-like" data-href="http://blog.dika.web.id" data-send="true" data-width="500" data-show-faces="false" data-font="tahoma"></div>
			<hr>

			<iframe src="http://official.3owl.com/rss/rss.php" frameborder="0" autoscrolling="no" width="430" height="400" id="frameRss"></iframe>
			</center>
		</div>
	</div>
<?php $this->output($tema.'footer');?>
</body>
</html>