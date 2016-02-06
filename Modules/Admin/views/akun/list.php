<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo $title;?>
			</h1>
			<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-download"></i> Akun</a></li>
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
									<th>Email</th>
									<th>Tanggal Daftar</th>
									<th style="width: 40px">Hit</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
								<?php
									if(!empty($data)):
										$no=1;
										foreach ($data as $data):
								?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $data->email;?></td>
									<td>
										<?php echo $data->tgl_daftar;?>
									</td>
									<td><span class="badge bg-blue"><?php echo $data->hit;?> x</span></td>
									<td>
										<?php 
											if($data->stt==1){
												echo "<span class=\"label label-block label-success\">Aktif</span>";
											}else if($data->stt==2){
												echo "<span class=\"label label-block label-info\">Belum Aktif</span>";
											}else{
												echo "<span class=\"label label-block label-danger\">Banned</span>";
											}
										?>
									</td>
									<td>
										<a href="<?php echo $this->location('admin/akun/aktiv/'.$data->id);?>">
											<button<?php echo ($data->stt==1)?' disabled':'';?> class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
										</a>
										<a href="<?php echo $this->location('admin/akun/deaktiv/'.$data->id);?>">
											<button<?php echo ($data->stt==2)?' disabled':'';?> class="btn btn-info btn-xs"><i class="fa fa-times"></i></button>
										</a>
										<a href="<?php echo $this->location('admin/akun/banned/'.$data->id);?>">
											<button<?php echo ($data->stt==3)?' disabled':'';?> class="btn btn-danger btn-xs"><i class="fa fa-user-times"></i></button>
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
				</div>
			</div>

		</section><!-- /.content -->
	</div><!-- /.content-wrapper -->