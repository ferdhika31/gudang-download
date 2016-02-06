<!-- Main Header -->
<header class="main-header">

	<!-- Logo -->
	<a href="<?php echo $this->location('admin/dashboard'); ?>" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>G</b>D</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>Gudang</b>Download</span>
	</a>

	<!-- Header Navbar -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<!-- Navbar Right Menu -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
			
				<!-- User Account Menu -->
				<li class="dropdown user user-menu">
					<!-- Menu Toggle Button -->
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<!-- The user image in the navbar-->
						<img src="https://s.gravatar.com/avatar/<?php echo md5($akunInfo->email);?>?s=200&r=pg" height="160px" width="160px" class="user-image" alt="User Image">
						<!-- hidden-xs hides the username on small devices so only the image appears. -->
						<span class="hidden-xs"><?php echo $akunInfo->nama;?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- The user image in the menu -->
						<li class="user-header">
							<img src="https://s.gravatar.com/avatar/<?php echo md5($akunInfo->email);?>?s=200&r=pg" class="img-circle" alt="User Image">
							<p>
								<?php echo $akunInfo->nama;?>
							</p>
						</li>

						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-right">
								<a href="<?php echo $this->location('admin/dashboard/keluar'); ?>" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>

			</ul>
		</div>
	</nav>
</header>