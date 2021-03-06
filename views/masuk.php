<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $_SESSION['site_title'];?> | <?php echo $title;?></title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.5 -->
		<link rel="stylesheet" href="<?php echo $asset;?>css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo $asset;?>css/AdminLTE.min.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="<?php echo $asset;?>plugins/iCheck/square/blue.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="hold-transition login-page">
		<div class="login-box">
			<!-- <div class="login-logo">
			<a href="#" style="text-shadow: 2px 1px #FFF; /* 0 0 1px */"><b>BoxOfficeMovie</b></a>
			</div>login-logo -->

			<!-- Notifikasi -->
			<?php if(isset($message)):?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> Alert!</h4>
				<?php echo $message;?>
			</div>
			<?php endif;?>

			<div class="login-box-body">
				<p class="login-box-msg">Silahkan masuk dengan akun anda.</p>
				
				<form action="<?php echo $this->location('auth');?>" method="post">

					<div class="form-group has-feedback">
						<input type="text" class="form-control" name="A_username" placeholder="Username"/>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>

					<div class="form-group has-feedback">
						<input type="password" class="form-control" name="A_password" placeholder="Password"/>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>

					<div class="row">
						<div class="col-xs-4">
							<input type="submit" name="masuk" class="btn btn-primary btn-block btn-flat" value="Masuk" />
						</div><!-- /.col -->
					</div>
				
				</form>

				<!--
				<div class="social-auth-links text-center">
				<p>- OR -</p>
				<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
				<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
				</div> 
				social-auth-links -->

			</div><!-- /.login-box-body -->
		</div><!-- /.login-box -->

		<!-- jQuery 2.1.4 -->
		<script src="<?php echo $asset;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="<?php echo $asset;?>js/bootstrap.min.js"></script>
		<!-- iCheck -->
		<script src="<?php echo $asset;?>plugins/iCheck/icheck.min.js"></script>
		<script>
			$(function () {
				$('input').iCheck({
					checkboxClass: 'icheckbox_square-blue',
					radioClass: 'iradio_square-blue',
					increaseArea: '20%' // optional
				});
			});
		</script>
	</body>
</html>