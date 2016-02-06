<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo $title;?>
			</h1>
			<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-download"></i> Download</a></li>
			<li class="active">Daftar</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">

			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $title;?></h3>
						</div><!-- /.box-header -->

						<div class="box-body">
							<table class="table table-bordered">
								<tr>
									<th style="width: 10px">#</th>
									<th>Judul Artikel</th>
									<th>Link Artikel</th>
									<th>Link Download</th>
									<th style="width: 40px">Hit</th>
									<th>Aksi</th>
								</tr>
								<?php
									if(!empty($data)):
										$no=1;
										foreach ($data as $data):
								?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $data->judul_artikel;?></td>
									<td>
										<a href="<?php echo $data->link_artikel;?>" target="_blank">
											<?php echo substr($data->link_artikel, 0,30);?>
										</a>
									</td>
									<td>
										<a href="<?php echo $data->link_download;?>" target="_blank">
											<?php echo substr($data->link_download, 0,20);?>
										</a>
									</td>
									<td><span class="badge bg-green"><?php echo $data->hit;?> x</span></td>
									<td>
										<a href="<?php echo $this->location('admin/download/ubah/'.$data->id);?>">
											<button class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button>
										</a>
										<a href="<?php echo $this->location('admin/download/hapus/'.$data->id);?>">
											<button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
										</a>
									</td>
								</tr>
								<?php
										$no++;
										endforeach;
									else:
								?>
								<tr>
									<td colspan="6"><center>Tidak ada data.</center></td>
								</tr>
								<?php
									endif;
								?>
							</table>
						</div><!-- /.box-body -->

						<div class="box-footer clearfix">
							<?php if($pageLinks):?>
			                <ul class="pagination pagination-sm no-margin pull-right">
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
					<center>
						<a href="<?php echo $this->location('admin/download/tambah');?>">
							<button class="btn btn-primary btn-flat">Tambah Download</button>
						</a>
					</center>
				</div>
			</div>

		</section><!-- /.content -->
	</div><!-- /.content-wrapper -->