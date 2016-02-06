<div class="container">

	<div class="row">
		<div class="col-md-10 col-lg-8">
			<h1>Semua file</h1>
			<?php
			if(!empty($data)):
			?>
			<ul class="post-list">
				<?php 
				foreach ($data as $data):
				?>
				<li class="post-list__post">
					<a href="<?php echo $this->location('donlod/detail/'.$data->id);?>" class="post-list__link"><?php echo $data->judul_artikel;?></a>
					<p class="post-list__preview">
						<?php echo $this->library->tgl_indonesia(substr($data->tgl_posting, 0,10))->tgl_indo();?> - 
						<small class="label label-info"><?php echo $data->hit;?>x Download</small></p>
				</li>
				<?php
				endforeach;
				?>
			</ul>
			<?php
			endif;
			?>

        	<?php if($pageLinks):?>
                <ul class="pagination">
                    <?php foreach($pageLinks as $paging):?>
                    	<?php
                    	$aktif = (strip_tags($paging)==$hal) ? 'active' : '';
                    	?>
                        <li class="<?php echo $aktif;?>"><?php echo $paging;?></li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
           
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