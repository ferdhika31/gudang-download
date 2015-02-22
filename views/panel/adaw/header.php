<?php 
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-22 12:39:26
	**/
?>
<header>
<!--<a href="https://github.com/ferdhika31"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png" alt="Fork me on GitHub"></a>-->
<a id="go-back-home" href="<?php echo $this->location('admin');?>">
<div class="top-image">
	<img src="<?php echo $asset;?>img/logo-f.png" alt="Ferdhika" width="100" height="100">
</div>
</a>
<p><?php echo $_SESSION['site_title'];?></p>
</header>
