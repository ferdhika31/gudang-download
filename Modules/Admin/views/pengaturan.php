<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo $title;?>
			</h1>
			<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-gear"></i> Pengaturan</a></li>
			<li class="active">Ubah</li>
			</ol>
		</section>

		<section class="content">

			<div class="row">
				<div class="col-md-12">

				<?php if(!empty($data)): ?>

				<?php echo (isset($notifikasi)) ? $notifikasi : '';?>

					<div class="box box-primary">

						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $title;?></h3>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form role="form" method="post" action="">
							<div class="box-body">
								<?php foreach($data as $data): ?>
									<?php
										if($data->field_pengaturan=='text'){
									?>
									<div class="form-group">
										<label for="<?php echo $data->tipe_pengaturan;?>"><?php echo $data->nama_pengaturan;?></label>
										<input type="text" name="A_<?php echo $data->tipe_pengaturan;?>" class="form-control" id="<?php echo $data->tipe_pengaturan;?>" <?php echo (!empty($data) ? 'value="'.$data->value_pengaturan.'"': '');?>/>
									</div>
									<?php
										}else if($data->field_pengaturan=='textarea'){
									?>
									<div class="form-group">
										<label for="<?php echo $data->tipe_pengaturan;?>"><?php echo $data->nama_pengaturan;?></label>
										<textarea name="A_<?php echo $data->tipe_pengaturan;?>" class="form-control" id="<?php echo $data->tipe_pengaturan;?>"><?php echo (!empty($data) ? $data->value_pengaturan: '');?></textarea>
									</div>
									<?php
										}else if($data->field_pengaturan=='dropdown'){
											if($data->tipe_pengaturan=='site_theme'){
									?>
									<div class="form-group">
										<label for="<?php echo $data->tipe_pengaturan;?>"><?php echo $data->nama_pengaturan;?></label>
										<select name="A_<?php echo $data->tipe_pengaturan;?>" class="form-control" id="<?php echo $data->tipe_pengaturan;?>">
											<?php
											while (($folder = $folderTema->read()) !== false){
						           				if ($folder != "." && $folder != ".." ) {
						           					echo "<option value='".$folder."'>".$folder."</option>";
						           				}
											}
											?>
										</select>
									</div>
									<?php
											}
										}
									?>
								<?php endforeach;?>
								

							</div><!-- /.box-body -->

							<div class="box-footer">
								<input type="submit" name="A_simpan" class="btn btn-primary" value="Kirim"/>
							</div>
						</form>
					</div><!-- /.box -->

				<?php endif;?>
				</div>
			</div>
		</section>

	</div>