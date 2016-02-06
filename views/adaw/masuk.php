  		<div class="content">
			Silahkan masuk terlebih dahulu untuk melihat file download disini.
			<br>Belum punya akun? Silahkan <a href='<?php echo $this->location('donlod/daftar').$ref_url;?>'>daftar.</a><br>
			<form action="" method="POST">
				<input type="text" name="A_email" id="input-email2" placeholder="contoh : fer@dika.web.id"/>
				<center><input type="submit" name="A_masuk" value="Masuk" /></center>
      		</form>

      		<?php echo (isset($notif))? $notif : '';?>
		</div>
	