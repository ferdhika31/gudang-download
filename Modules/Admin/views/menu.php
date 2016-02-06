<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">

		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="https://s.gravatar.com/avatar/<?php echo md5($akunInfo->email);?>?s=200&r=pg" class="img-circle" alt="User Image">
				</div>

				<div class="pull-left info">
					<p><?php echo $akunInfo->nama;?></p>
					<!-- Status -->
					<a href="<?php echo $this->location('admin/profile');?>"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>

			<!-- search form (Optional) 
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form> -->

			<!-- Sidebar Menu -->
			<ul class="sidebar-menu">
				<li class="header">Main Navigation</li>
				<!-- Optionally, you can add icons to the links -->
				<li<?php echo ($active_menu=="dashboard") ? ' class="active"' : "";?>>
					<a href="<?php echo $this->location('admin/dashboard');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
				</li>
				<li<?php echo ($active_menu=="download" || $active_menu=="tambah_download" || $active_menu=="ubah_download") ? ' class="active"' : "";?>>
					<a href="<?php echo $this->location('admin/download');?>"><i class="fa fa-download"></i> <span>List Download</span></a>
				</li>
				<li<?php echo ($active_menu=="akun") ? ' class="active"' : "";?>>
					<a href="<?php echo $this->location('admin/akun');?>"><i class="fa fa-user"></i> <span>Akun</span></a>
				</li>
				<li<?php echo ($active_menu=="pengaturan") ? ' class="active"' : "";?>>
					<a href="<?php echo $this->location('admin/pengaturan');?>"><i class="fa fa-gear"></i> <span>Pengaturan</span></a>
				</li>
			</ul><!-- /.sidebar-menu -->
		</section>
		<!-- /.sidebar -->
	</aside>