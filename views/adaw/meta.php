<html>
<head>
	<title><?php echo $_SESSION['site_title'];?></title>
	<link href='<?php echo $asset_theme;?>img/logo-f.png' rel='shortcut icon'>
	
	<meta content='width=device-width, initial-scale=1.0, user-scalable=no' name='viewport'>
	<meta content='text/html; charset=utf-8' http-equiv='content-type' />
	<meta content="<?php echo $asset_theme;?>img/logo-f.png" property="og:image" />
	<meta content='<?php echo $_SESSION['site_author'];?>' property='og:title' />
	<meta content="<?php echo $_SESSION['site_description'];?>" property='og:description' />
	<meta content="website" property="og:type" />

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />
	<link href='<?php echo $asset_theme;?>css/style.css' rel='stylesheet' type='text/css' />
	<link href='<?php echo $asset_theme;?>css/pagination.css' rel='stylesheet' type='text/css' />
	<link href='<?php echo $asset_theme;?>css/responsive.css' rel='stylesheet' type='text/css' />
	<!-- - -->
	<script src='<?php echo $asset_theme;?>js/jquery.js' type='text/javascript'></script>
	<script src='<?php echo $asset_theme;?>js/pd.js' type='text/javascript'></script>
	<script src='<?php echo $asset_theme;?>js/basics.js' type='text/javascript'></script>
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
