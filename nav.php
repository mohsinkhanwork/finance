
		<!-- HEADER MOBILE-->
		<header class="header-mobile d-block d-lg-none">
			<div class="header-mobile__bar">
				<div class="container-fluid">
					<div class="header-mobile-inner">
						<a class="logo" href="index.html">
							<h4><?php echo Config::webTitle; ?></h4>
						</a>
						<button class="hamburger hamburger--slider" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
				<div class="account-dropdown js-dropdown">
			</div>
			<nav class="navbar-mobile">
				<div class="container-fluid">
					<ul class="navbar-mobile__list list-unstyled">
						<li class="">
							<a class="js-arrow" href="index.php">
								<i class="fas fa-tachometer-alt"></i>Dashboard</a>
						</li>
						
                        <?php
                          if ($_SESSION['level'] == 0) {
                            echo '
                                <li class="">
                                    <a class="js-arrow" href="index.php?cat=user-module&subcat=users">
                                        <i class="fa fa-users"></i>Users</a>
                                </li>
                            ';
                          }
                          else if ($_SESSION['level'] == 3) {
                            echo '
                                <li class="">
                                    <a class="js-arrow" href="index.php?cat=admin-module&subcat=users">
                                        <i class="fa fa-users"></i>Users</a>
                                </li>
                            ';
                          }
                        ?>
						<li class="">
							<a class="js-arrow" href="#">
								<i class="fas fa-tachometer-alt"></i>Settings</a>
						</li>

						<li class="">
							<a class="js-arrow" href="logout.php">
								<i class="fas fa-tachometer-alt"></i>Logout</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- END HEADER MOBILE-->

		<!-- MENU SIDEBAR-->
		<aside class="menu-sidebar d-none d-lg-block">
			<div class="logo">
				<a href="#">
					<h4><?php echo Config::webTitle; ?></h4>
				</a>
			</div>
			<div class="menu-sidebar__content js-scrollbar1">
				<nav class="navbar-sidebar">
					<ul class="list-unstyled navbar__list">
						<li >
							<a class="js-arrow" href="index.php">
								<i class="fas fa-tachometer-alt"></i>Dashboard</a>
						</li>
                        <?php
                          if ($_SESSION['level'] == 0) {
                            echo '
                                <li class="">
                                    <a class="js-arrow" href="index.php?cat=user-module&subcat=users">
                                        <i class="fa fa-users"></i>Users</a>
                                </li>
                            ';
                          }
                          else if ($_SESSION['level'] == 3) {
                            echo '
                                <li class="">
                                    <a class="js-arrow" href="index.php?cat=admin-module&subcat=users">
                                        <i class="fa fa-userst"></i>Users</a>
                                </li>
                            ';
                          }
                        ?>
						
					</ul>
				</nav>
			</div>
		</aside>
		<!-- END MENU SIDEBAR-->