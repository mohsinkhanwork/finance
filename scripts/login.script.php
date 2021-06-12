<?php
	$userLoginErr1 = $userLoginErr2 = $userLoginErr3 = $userLoginErr4 = false;

	extract($_POST);

	if ( isset( $login ) )
	{
		if ( empty( $username ) )
		{
			$userLoginErr1 = Config::userLoginErr1;
		}
		else if ( empty( $password ) )
		{
			$userLoginErr2 = Config::userLoginErr2;
		}
		else
		{
			$username = legal_input( $username );
			$password = legal_input( $password ) ;

			$query = "SELECT ".Config::tbUUsername." FROM ".Config::tbU." WHERE ".Config::tbUUsername."=:".Config::tbUUsername."";
			$result = $db->Select( $query,	[
												Config::tbUUsername => $username
											] );

			if ( $result )
			{
				$query = "SELECT ".Config::tbUUID.", ".Config::tbUType." , ".Config::tbUActivate." FROM ".Config::tbU." WHERE ".Config::tbUUsername."=:".Config::tbUUsername." AND ".Config::tbUPass."=:".Config::tbUPass."";
				$result = $db->Select( $query,	[
													Config::tbUUsername => $username,
													Config::tbUPass     => md5($password),
												] );
				
				
					if($result && $result[0][Config::tbUActivate] == 0 && $result[0][Config::tbUType] == 0 )
					{

					echo '<script> alert("You will be log in after admin activation"); document.location.href = "login.php"; </script>';
                    return;
					
					}

	
				else if($result)
				{
					$_SESSION['username']=$username;
					$_SESSION['uid'] = $result[0][Config::tbUUID];
					$_SESSION['level'] =  $result[0][Config::tbUType];

                    if ($_SESSION['level'] == 0) {
                        echo '<script> document.location.href = "index.php?cat=user-module&subcat=users"; </script>';
                        return;
                      }
                      else if ($_SESSION['level'] == 3 ) {
                        echo '<script> document.location.href = "index.php?cat=admin-module&subcat=users"; </script>';
                        return;
                      }
				}
				else
				{
					$userLoginErr4 = Config::userLoginErr4;
				}
			}
			else
			{
				$userLoginErr3 = Config::userLoginErr3;
			}
		}
	}

	function legal_input($value)
	{
		$value = trim($value);
		$value = stripslashes($value);
		$value = htmlspecialchars($value);
		return $value;
	}
?>