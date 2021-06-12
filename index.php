<?php

	session_start();

	$username = !empty( $_SESSION['username'] ) ? $_SESSION['username'] : '';
	$uid = !empty( $_SESSION['uid'] ) ? $_SESSION['uid'] : '';
	$level = !empty( $_SESSION['level'] ) ? $_SESSION['level'] : 0;
	
    if ( isset($_GET['cat']) && $_GET['cat'] == 'admin-module' && $level == 0 )
    {
        echo '<script> document.location.href = "index.php?cat=user-module&subcat=users"; </script>';
		return;
    }
    if ( isset($_GET['cat']) && $_GET['cat'] == 'user-module' && $level == 3 )
    {

        echo '<script> document.location.href = "index.php?cat=admin-module&subcat=users"; </script>';
		return;
    }
    


	if ( !empty( $username ) )
	{
        include 'dashboard.php';
	}
	else
	{
        echo '<script> document.location.href = "login.php"; </script>';
		return;


	}

?>