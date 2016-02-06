		<div class="content">
        	<ul class="posts">
        		<?php
        			if(!empty($data)){
        				$no=1;
        				foreach ($data as $data) {
        					echo "
        		<li>
        			".$no.". ".substr($data->email, 0,4)."xxx (".$data->hit."x nge-download)
        		</li>
        					";
        				$no++;
        				}
        			}
        		?>
        	</ul>
		</div>