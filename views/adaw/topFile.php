		<div class="content">
			5 file yang paling banyak di download.<hr>
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
		</div>