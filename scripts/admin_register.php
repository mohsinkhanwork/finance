
<?php
	$query = "SELECT * FROM ".Config::tbU." WHERE ".Config::tbUUsername."=:".Config::tbUUsername."";
	$result = $db->Select( $query,	[
										Config::tbUUsername => Config::adminName
									] );
	
	if( !$result )
	{
		$query = "INSERT INTO ".Config::tbU." (".Config::tbUUsername.", ".Config::tbUPass.", ".Config::tbUType.") VALUES (:".Config::tbUUsername.", :".Config::tbUPass.", :".Config::tbUType.")";
		$result = $db->Insert( $query,	[
											Config::tbUUsername => Config::adminName,
											Config::tbUPass => md5(Config::adminPassword),
											Config::tbUType => 3
										] );
	}
?>