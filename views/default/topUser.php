<div class="container">

	<div class="row">
		<div class="col-md-10 col-lg-8">
			<h1>Top user</h1>
			<?php
			if(!empty($data)):
			?>
			<ul class="post-list">
				<?php 
				$no=1;
				foreach ($data as $data):
				?>
				<li class="post-list__post">
					<p class="post-list__preview">
						<?php echo $no.". ".substr($data->email, 0,4)."xxx (".$data->hit."x nge-download)";?>
					</p>
				</li>
				<?php
				$no++;
				endforeach;
				?>
			</ul>
			<?php
			endif;
			?>
           
		</div>

		<div class="col-lg-3 col-lg-push-1 col-md-2 right-rail">
			<div class="rail-bio">
				<img src="<?php echo $asset;?>img/logo-f.png" alt="Ferdhika Yudira" class="rail-bio__headshot">
				<p>Selamat datang <?php echo $this->session->getValue('email');?>. Selamat mendonlod :)</p>

				<p>Find me on Twitter at <a href="http://twitter.com/ferdhikaaa">@ferdhikaaa</a></p>
				<p style="margin-top: 1.5em;"><a href="https://twitter.com/ferdhikaaa" class="twitter-follow-button" data-show-count="true" data-size="medium" data-dnt="true">Follow @ferdhikaaa</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></p>
			</div>
		</div>
	</div>

</div>