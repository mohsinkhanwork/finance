<?php
	if(!empty($cat) && !empty($subcat))
	{
		$sub = explode('-', $subcat);
		if( $sub[0] == 'add' )
		{
			$val=[];
			foreach ( $sub as $key => $value )
			{
				if( $value == $sub[0] )
				{
					continue;
				}
				$val[] = $value;
			}

		include( $cat."/".implode('-',$val).".php" );   
		}
		else
		{
			include( $cat."/".$subcat.".php" );
		}
	}
	else
	{
		echo "Welcome...";
	}

?>