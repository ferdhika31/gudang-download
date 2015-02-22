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
			<h2>Admin Area</h2>
		</div>

		<div class="content">
			<form action="" method="POST">
				<label for="jUseraname">Username</label>
				<input type="text" name="A_username" id="jUseraname" placeholder=""/>

				<label for="jPass">Password</label>
				<input type="password" name="A_password" id="jPass" placeholder=""/>

				<center><input type="submit" name="masuk" value="Masuk" /></center>
				<!--<center><button name="masuk" value="Masuk"><i class='fa fa-sign-in'></i> Masuk</button></center>-->
			</form>
			<?php echo $error;?>
		</div>
	</div>
<?php $this->output($temaAdmin.'footer');?>
</body>
</html>