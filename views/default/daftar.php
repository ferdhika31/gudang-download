<div class="container">

	<div class="row">
		<div class="col-lg-8 col-md-10 col-lg-offset-2 col-md-offset-1 ">
			
			<img src="<?php echo $asset;?>img/logo-f.png" alt="<?php echo $_SESSION['site_author'];?>" class="homepage-headshot">

			<div class="homepage-body">
			Silahkan daftar dulu sebelum nge-download file dimari.
			</div>

			<div class="homepage-email-signup">
				<form action="" method="POST" accept-charset="utf-8" class="form-inline">
					<p><strong>Daftar</strong></p>
					<div class="form-group">
					<label for="email" class="sr-only">Email</label>
					<input type="text" name="A_email" id="email" class="form-control" placeholder="Your Email..." required>
					</div>
					<input type="submit" name="A_daftar" class="btn btn-primary submit-button" value="Sign up!" />
				</form>
			</div>

			<?php echo (isset($notif))? $notif : '';?>

		</div>
	</div>

</div>