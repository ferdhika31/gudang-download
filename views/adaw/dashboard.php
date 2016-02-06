		<div class="content">
			Selamat datang <?php echo $this->session->getValue('email');?>. Selamat mendonlod :)<hr>
        	<ul class="posts">
        		<?php
        			if(!empty($data)){
        				foreach ($data as $data) {
        					echo "
        		<li>
        			<small class=\"datetime muted\" data-time=\"<?php echo $data->tgl_posting;?> +0000\">
        				".$this->library->tgl_indonesia(substr($data->tgl_posting, 0,10))->tgl_indo()." - ".$data->hit."x Download
        			</small>
        			<a href='".$this->location('donlod/detail/'.$data->id)."' title=\"Download ".$data->judul_artikel."\">".$data->judul_artikel."</a>
        		</li>
        					";
        				}
        			}else{
        				echo "<li>
	        			Tidak ada file.
        				</li>";
        			}
        		?>
        	</ul>

        	<div class="pagination">
        	<?php if($pageLinks):?>
                <ul>
                    <?php foreach($pageLinks as $paging):?>
                    	<?php
                    	$aktif = (strip_tags($paging)==$hal) ? 'active' : '';
                    	?>
                        <li class="page <?php echo $aktif;?>"><?php echo $paging;?></li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
            </div>
		</div>