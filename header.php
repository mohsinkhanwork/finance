

<style>
	.bg-dark-2 {
		height: 95px;
		padding: 24px 22px 27px;
		margin: 0 auto;
		position: relative;
		float: none;
		background: #1bbcef;
		background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzFiYmNlZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjIwJSIgc3RvcC1jb2xvcj0iIzIzYjBlNiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjcwJSIgc3RvcC1jb2xvcj0iIzBiNjdiMiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMxNjQ4ODMiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
		background: -moz-linear-gradient(top, #1bbcef 0%, #23b0e6 20%, #0b67b2 70%, #164883 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #1bbcef), color-stop(20%, #23b0e6), color-stop(70%, #0b67b2), color-stop(100%, #164883));
		background: -webkit-linear-gradient(top, #1bbcef 0%, #23b0e6 20%, #0b67b2 70%, #164883 100%);
		background: -o-linear-gradient(top, #1bbcef 0%, #23b0e6 20%, #0b67b2 70%, #164883 100%);
		background: -ms-linear-gradient(top, #1bbcef 0%, #23b0e6 20%, #0b67b2 70%, #164883 100%);
		background: linear-gradient(to bottom, #1bbcef 0%, #23b0e6 20%, #0b67b2 70%, #164883 100%);
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#1bbcef', endColorstr='#164883', GradientType=0)
	}
</style>

<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark-2">
  <a class="navbar-brand" href="index.php?cat=admin-module&subcat=users"><?php echo Config::webTitle; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<style>
  #navbarSupportedContent.show {
    z-index: 3000; background: rgb(22 138 203); text-align: center;
  }
</style>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
		<?php
				if ($_SESSION['level'] == 0) {
				echo '
				
						<a class="nav-link" href="index.php?cat=user-module&subcat=users">
							<i class="fa fa-users"></i>  Users</a>
				
				';
				}
				else if ($_SESSION['level'] == 3) {
				echo '
					
						<a class="nav-link" href="index.php?cat=admin-module&subcat=users">
							<i class="fa fa-users"></i>  Users</a>
					
				';
				}
			?>
          </a>
      </li>
    
    </ul>
    <ul class="navbar-nav ">
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style="padding:45px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<?php echo '<span style="color:white;"> '. $_SESSION['username'] . '  </span>' ; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">			
          <a class="dropdown-item" href="settings.php" >Settings</a>
          <div class="dropdown-divider"> </div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </li>
  </div>
 
</nav>
