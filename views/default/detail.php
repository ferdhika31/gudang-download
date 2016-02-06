<div class="container">

	<div class="row">
		<div class="col-lg-8 col-md-10 col-lg-offset-2 col-md-offset-1 ">
			
			<img src="<?php echo $asset;?>img/logo-f.png" alt="<?php echo $_SESSION['site_author'];?>" class="homepage-headshot">

			<center>
				<button onclick="location.href='<?php echo $data->link_artikel;?>'" class="btn btn-primary submit-button">Lihat Artikel</button>
			</center>

			<div class="homepage-email-signup">
				<center>
					<strong><?php echo $data->judul_artikel;?></strong><br>
					
					<form action='<?php echo $this->location('donlod/ambil');?>' method='post'>
						<input type='hidden' name='A_id' value="<?php echo $data->id;?>" />
						<input type='hidden' name='A_url' value="<?php echo $data->link_download;?>" />
						<button value="Download" class="btn btn-primary submit-button" name="donlod">Download</button>
					</form>
				</center>
			</div>

			<?php echo (isset($notif))? $notif : '';?>

		</div>
	</div>

</div>