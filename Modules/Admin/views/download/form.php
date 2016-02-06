<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo $title;?>
			</h1>
			<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-download"></i> Download</a></li>
			<li class="active"><?php echo ($active_menu=="tambah_download") ? "Tambah" : "Ubah";?></li>
			</ol>
		</section>

		<section class="content">

			<div class="row">
				<div class="col-md-12">

				<?php echo (isset($notifikasi)) ? $notifikasi : '';?>

					<div class="box box-primary">

						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $title;?></h3>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form role="form" method="post" action="">
							<div class="box-body">
								<div class="form-group">
									<label for="judul">Judul Link Download</label>
									<input type="text" name="A_judul" class="form-control" id="judul" placeholder="Judul" <?php echo (!empty($data) ? 'value="'.$data->judul_artikel.'"': '');?>/>
								</div>

								<div class="form-group">
									<label for="linkA">Link Artikel</label>
									<input type="text" name="A_linkA" class="form-control" id="linkA" placeholder="http://" <?php echo (!empty($data) ? 'value="'.$data->link_artikel.'"': '');?>/>
								</div>

								<div class="form-group">
									<label for="linkD">Link Download</label>
									<input type="text" name="A_linkD" class="form-control" id="linkD" placeholder="http://" <?php echo (!empty($data) ? 'value="'.$data->link_download.'"': '');?>/>
								</div>
							</div><!-- /.box-body -->

							<div class="box-footer">
								<input type="submit" name="A_simpan" class="btn btn-primary" value="Kirim"/>
							</div>
						</form>
					</div><!-- /.box -->
				</div>
			</div>
		</section>

	</div>