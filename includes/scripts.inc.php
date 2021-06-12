<?php
    if( !isset($_SESSION) )
        session_start();
?>
<?php date_default_timezone_set(timezone_name_from_abbr("PKT")); ?>
<?php include '../includes/autoload2.inc.php'; ?>



<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
}
/*
	* ======================================= *
	*			   transfer Module			  *
	* ======================================= *
*/

/*
	* Data Insert Module
*/


if( empty( $_GET['id'] ) && !empty( $_GET['name'] ) && $_GET['name'] == Config::tbT )
{
	extract($_POST);
	
	if( empty( $tbTAmount ) )
	{
		sendMsg( 'error', 'Amount field is required.' );
	}
	else if( empty( $tbTBeneficiaryName ) )
	{
		sendMsg( 'error', 'Beneficiary Name is required.' );
	}
	else if( empty( $tbTBenificiaryBank ) )
	{
		sendMsg( 'error', 'Benificiary Bank is required.' );
	}
	else if( empty( $tbTAccountNumber ) )
	{
		sendMsg( 'error', 'Account Number is required.' );
	}
	else if( empty( $tbTIbanCode ) )
	{
		sendMsg( 'error', 'Iban Code is required.' );
	}
    else if( empty( $tbTPhone ) )
	{
		sendMsg( 'error', 'Phone Nummber is required.' );
	}
	else if( empty( $tbTEmail ) )
	{
		sendMsg( 'error', 'Email is required.' );
	}
	else if( empty( $tbTCity ) )
	{
		sendMsg( 'error', 'City is required.' );
	}
	else if( empty( $tbTState ) )
	{
		sendMsg( 'error', 'State field is required.' );
	}
	else if( empty( $tbTCountry ) )
	{
		sendMsg( 'error', 'Country field is required.' );
	}
	
	
	else
	{
		$data = [
					Config::tbU	 					=> $_SESSION['uid'],
					Config::tbTAmount  				=> $tbTAmount,
					Config::tbTBeneficiaryName 		=> $tbTBeneficiaryName,
					Config::tbTPhone 				=> $tbTPhone,
					Config::tbTBenificiaryBank 		=> $tbTBenificiaryBank,
					Config::tbTCountry 				=> $tbTCountry,
					Config::tbTState 				=> $tbTState,
					Config::tbTEmail 				=> $tbTEmail,
					Config::tbTCity 				=> $tbTCity,
					Config::tbTIbanCode 			=> $tbTIbanCode,
					Config::tbTAccountNumber 		=> $tbTAccountNumber
					
				];

		$tableName = $_GET['name'];
		

    	$oldBalance = get_value(Config::tbUBalance, Config::tbUUID, $_SESSION['uid'], Config::tbU);
    	
    	
    	if($tbTAmount > $oldBalance) {

    	?>
			<script>
			swal({
			title: "Sorry..! you have insufficiant balance",
			text: "Thank You!",
			icon: "error",
			button: "OK",
			dangerMode: true,
			});
			</script>
			
			<?php
			return;

    	} ;

    	$newBalance = $oldBalance - $tbTAmount;

		$data2 = [
					Config::tbUBalance  				=> $newBalance,
				];


        $query2 = update_data( $data2, Config::tbU, $_SESSION['uid'] );

        if ( $query2 )
        {

        }
        else
        {
        	return;
        }
        
        $query = insert_data( $data, $tableName );

        if ( $query )
        {

          ?>
			<script>
			swal({
			//title: "Congratulations your amount <?php// echo "$tbTAmount"  ?> is Successfully transfered",
			title: "Your amount will be transfered after Admin authorization",
			text: "Thank You!",
			icon: "success",
			button: "Back!",
			});
			</script>
			
			<?php

        }
        else
        {
			echo '<script> alert("PLease Check Your Query"); document.location.href = "index.php?cat=admin-module&subcat=add-users"; </script>';
            return;
        }
	}
			
}


/*
	* ======================================= *
	*			   Users Module			  *
	* ======================================= *
*/

/*
	* Data Insert Module
*/


if( empty( $_GET['id'] ) && !empty( $_GET['name'] ) && $_GET['name'] == Config::tbU )
{
	extract($_POST);
	
	if( empty( $tbUUsername ) )
	{
		sendMsg( 'error', 'username field is required.' );
	}
	if( empty( $tbUPass ) )
	{
		sendMsg( 'error', 'Password field is required.' );
	}
	if( empty( $tbUEmail ) )
	{
		sendMsg( 'error', 'Email field is required.' );
	}
	if( empty( $tbUBalance ) )
	{
		sendMsg( 'error', 'Balance field is required.' );
	}
	if( empty( $tbUAddress ) )
	{
		sendMsg( 'error', 'address field is required.' );
	}
    if( empty( $tbUCity ) )
	{
		sendMsg( 'error', 'City name field is required.' );
	}
    if( empty( $tbUCountry ) )
	{
		sendMsg( 'error', 'Country field is required.' );
	}
	if( empty( $tbUState ) )
	{
		sendMsg( 'error', 'State field is required.' );
	}

	if( empty( $tbUPhone ) )
	{
		sendMsg( 'error', 'phone field is required.' );
	}
	if( empty( $tbUAccountCurrency ) )
	{
		sendMsg( 'error', 'Account Currency is required.' );
	}
	
	
	
	else
	{
		$data = [
					Config::tbUUsername	 		=> $tbUUsername,
					Config::tbUPass  			=> md5($tbUPass),
					Config::tbUEmail 			=> $tbUEmail,
					Config::tbUBalance 			=> $tbUBalance,
					Config::tbUPhone 			=> $tbUPhone,
					Config::tbUCity 			=> $tbUCity,
					Config::tbUAddress 			=> $tbUAddress,
					Config::tbUCountry 			=> $tbUCountry,
					Config::tbUState 			=> $tbUState,
					Config::tbUAccountCurrency 	=> $tbUAccountCurrency
				];

		$tableName = $_GET['name'];
		
        $query = insert_data( $data, $tableName );

        if ( $query )
        {
           ?>
			<script>
			swal({
			title: "User is Successfully Added!",
			text: "Thank You!",
			icon: "success",
			button: "Back!",
			});
			</script>
			
			<?php

        }
        else
        {
			echo '<script> alert("PLease Check Your Query"); document.location.href = "index.php?cat=admin-module&subcat=add-users"; </script>';
            return;
        }
	}
}


/*
	* Data Update Module
*/

if( !empty( $_GET['id'] ) && !empty( $_GET['name'] ) && $_GET['name'] =='action_reason' )

{
	extract($_POST);
	
	if( empty( $tbUReason ) )
	{
		sendMsg( 'error', 'Reason field is required.' );
	}
	else
	{
		$data = [
					
					Config::tbUReason       => $tbUReason
		
				];

		$tableName = Config::tbU;
		$id = $_GET['id'];
        
        $query = update_data( $data, $tableName, $id );

        if ( $query )
        {
           ?>
			<script>
			swal({
			title: "Reason Added Successfully!",
			text: "Thank You!",
			icon: "success",
			button: "Back!",
			});
			</script>
			
			<?php
        }
        else
        {
            sendMsg( 'error', 'Check your query...' );
        }
	}
}

if( !empty( $_GET['id'] ) && !empty( $_GET['name'] ) && $_GET['name'] == Config::tbU )
{
    extract($_POST);
	

    if ($_SESSION['level'] == 0) {
        
        
    $image = $_FILES["tbUPaddress"]["name"];
	$imageTmp = $_FILES["tbUPaddress"]["tmp_name"];
              

    if( empty( $image ) )
	{
		sendMsg( 'error', 'No File Chosen..!' );
	}
  
	else
	{
		
        $target_file = "../" . Config::storageDocument . basename( $image );
		$data = [
            
					
                    Config::tbUPaddress => basename( $image )
					
				];

		$tableName = $_GET['name'];
		$id = $_GET['id'];
        
        if ( file_exists( $target_file ) )
			{
				unlink( $target_file );
			}

        else if ( move_uploaded_file( $imageTmp, $target_file ) )
			{
        
        $query = update_data( $data, $tableName, $id );

        if ( $query )
        {
            sendMsg( 'success', 'Data Uploaded sucessfully.' );
        }
        else
        {
            sendMsg( 'error', 'Check your query...' );
        }
            
        }
	}


	$image1 = $_FILES["tbUPidentification"]["name"];
	$imageTmp1 = $_FILES["tbUPidentification"]["tmp_name"];
              

    if( empty( $image1 ) )
	{
		sendMsg( 'error', 'No File Chosen..!' );
	}
  
	else
	{
        $target_file = "../" . Config::storageDocument . basename( $image1 );
		$data = [
            
					
                    Config::tbUPidentification =>     basename( $image1 )
					
				];

		$tableName = $_GET['name'];
		$id = $_GET['id'];
        
        if ( file_exists( $target_file ) )
			{
				sendMsg( 'error', 'selected file name already exists.' );
			}
        else if ( move_uploaded_file( $imageTmp1, $target_file ) )
			{
        
        $query = update_data( $data, $tableName, $id );

        if ( $query )
        {
            ?>
			<script>
			swal({
			title: "Data Uploaded Successfully!",
			text: "Thank You!",
			icon: "success",
			button: "Back!",
			});
			</script>
			
			<?php
        }
        else
        {
            sendMsg( 'error', 'Check your query...' );
        }
            
        }
	}



//new
	
	$image2 = $_FILES["tbUPfinance"]["name"];
	$imageTmp2 = $_FILES["tbUPfinance"]["tmp_name"];
              

    if( empty( $image2 ) )
	{
		sendMsg( 'error', 'No File Chosen..!' );
	}
  
	else
	{
        $target_file = "../" . Config::storageDocument . basename( $image2 );
		$data = [
            
					
                    Config::tbUPfinance =>     basename( $image2 )
					
				];

		$tableName = $_GET['name'];
		$id = $_GET['id'];
        
        if ( file_exists( $target_file ) )
			{
				sendMsg( 'error', 'selected file name already exists.' );
			}
        else if ( move_uploaded_file( $imageTmp2, $target_file ) )
			{
        
        $query = update_data( $data, $tableName, $id );

        if ( $query )
        {
            ?>
			<script>
			swal({
			title: "Uploaded Successfully!",
			text: "Thank You!",
			icon: "success",
			button: "Back!",
			});
			</script>
			
			<?php
        }
        else
        {
            sendMsg( 'error', 'Check your query...' );
        }
            
        }
	}


}

	 else if ($_SESSION['level'] == 3) {

	
	if( empty( $tbUUsername ) )
	{
		sendMsg( 'error', 'username field is required.' );
	}
	if( empty( $tbUPass ) )
	{
		sendMsg( 'error', 'Password field is required.' );
	}
	if( empty( $tbUEmail ) )
	{
		sendMsg( 'error', 'email field is required.' );
	}
	if( empty( $tbUBalance ) )
	{
		sendMsg( 'error', 'balance field is required.' );
	}
	if( empty( $tbUAddress ) )
	{
		sendMsg( 'error', 'address field is required.' );
	}
    if( empty( $tbUCity ) )
	{
		sendMsg( 'error', 'City name field is required.' );
	}
    if( empty( $tbUCountry ) )
	{
		sendMsg( 'error', 'Country name field is required.' );
	}
	if( empty( $tbUState ) )
	{
		sendMsg( 'error', 'State name field is required.' );
	}
	if( empty( $tbUPhone ) )
	{
		sendMsg( 'error', 'Phone name field is required.' );
	}
	if( empty( $tbUAccountCurrency ) )
	{
		sendMsg( 'error', 'Account Currency is required.' );
	}

	
	
	
	else
	{
		$data = [
					
					Config::tbUUsername    		 => $tbUUsername,
					Config::tbUPass        		 => md5($tbUPass),
					Config::tbUEmail       		 => $tbUEmail,
					Config::tbUBalance     	     => $tbUBalance,	
					Config::tbUPhone       		 => $tbUPhone,		
					Config::tbUAddress     		 => $tbUAddress,
					Config::tbUCity        		 => $tbUCity,
					Config::tbUCountry     		 => $tbUCountry,
					Config::tbUState       		 => $tbUState,
					Config::tbUAccountCurrency   => $tbUAccountCurrency
					
					
					
					
				];

		$tableName = $_GET['name'];
		$id = $_GET['id'];
        
        
		
        $query = update_data( $data, $tableName, $id );

        if ( $query )
        {
			?>
			<script>
			swal({
			title: "User is Successfully Updated!",
			text: "Thank You!",
			icon: "success",
			button: "Back!",
			});
			</script>
			
			<?php
        }
        else
        {
            sendMsg( 'error', 'Check your query...' );
        }
	}
}
}

/*
	* Data Update Module
*/

if( !empty($_GET['id']) && !empty($_GET['tableName']) && $_GET['role']=='user_activate')
{
    $id = legal_input($_GET['id']);
    $tableName = legal_input($_GET['tableName']);
    $query = "SELECT ".Config::tbUActivate." FROM ".Config::tbU." WHERE ".Config::tbUUID."=:".Config::tbUUID."";
    $res = $db->Select($query, [ Config::tbUUID => $id ]);

    if ( !empty( $res ) )
    {

        if ( $res[0][Config::tbUActivate] == 0 )
        {
            $data = [ Config::tbUActivate => 1 ];
            $return = "fas fa-toggle-on fa-2x iconRole";
        }
        else if ( $res[0][Config::tbUActivate] == 1 )
        {
            $data = [ Config::tbUActivate => 0 ];
            $return = "fas fa-toggle-off fa-2x iconRole";
        }
        
        $updateData = update_data( $data, $tableName, $id );
        if($updateData)
        {
            echo $return;
        }
        else
        {
            echo "<span class='fail'>Error!.. check your query...</span>";
        }
    }

}




/*
	* Data Update Module
*/

if( !empty($_GET['id']) && !empty($_GET['tableName']) && $_GET['role']=='transfer_approval')
{
    $id = legal_input($_GET['id']);
    $tableName = legal_input($_GET['tableName']);
    $query = "SELECT ".Config::tbU.", ".Config::tbTPendingTransfer.", ".Config::tbTAmount." FROM ".Config::tbT." WHERE ".Config::tbTUID."=:".Config::tbTUID."";
    $res = $db->Select($query, [ Config::tbTUID => $id ]);

    if ( !empty( $res ) )
    {

        if ( $_GET['action'] == 1 )
        {
            $data = [ 
            			Config::tbTPendingTransfer => 'Approved'

            	];


		    $return[] = array(
		    					"user_id" => $res[0][Config::tbU],
		                    	"approval_text" => 'Approved'

		                    	);
        }
        else if ( $_GET['action'] == 2 )
        {
            $data = [ 

            		Config::tbTPendingTransfer => 'Un-Approved'

            	];
		    $return[] = array(
		    					"user_id" => $res[0][Config::tbU],
		                    	"approval_text" => 'Un-Approved'

		                    	);

        }
        
        $updateData = update_data( $data, $tableName, $id );
        if($updateData)
        {
				if ( $_GET['action'] == 2 )
					{


					$oldBalance = get_value(Config::tbUBalance, Config::tbUUID, $res[0][Config::tbU], Config::tbU);

					$data2 = [ 

							Config::tbUBalance =>  $oldBalance + $res[0][Config::tbTAmount]
					];
					$updateData = update_data( $data2, Config::tbU, $res[0][Config::tbU] );
					}


            echo json_encode($return);;
        }
        else
        {
            echo "<span class='fail'>Error!.. check your query...</span>";
        }
    }

}







if( !empty( $_GET['id'] ) && !empty( $_GET['name'] ) && !empty( $_GET['value'] ) && $_GET['name'] == 'action_status' )
{
	$data = [
				Config::tbUStatus =>     $_GET['value']
			];

	$tableName = Config::tbU;
	$id = $_GET['id'];
	
	$query = update_data( $data, $tableName, $id );

	if ( $query )
	{
		sendMsg( 'success', '' );
	}
	else
	{
		sendMsg( 'error', '' );
	}
}



if( !empty( $_GET['id'] ) && !empty( $_GET['name'] ) && !empty( $_GET['value'] ) && $_GET['name'] == 'action_account' )
{
	$data = [
				Config::tbUAccountType =>     $_GET['value']
			];

	$tableName = Config::tbU;
	$id = $_GET['id'];
	
	$query = update_data( $data, $tableName, $id );

	if ( $query )
	{
		sendMsg( 'success', '' );
	}
	else
	{
		sendMsg( 'error', '' );
	}
}

if( !empty( $_GET['id'] ) && !empty( $_GET['name'] ) && !empty( $_GET['value'] ) && $_GET['name'] == 'transfer_account' )
{
	$data = [
				Config::tbTStatus =>     $_GET['value']
			];

	$tableName = Config::tbU;
	$id = $_GET['id'];
	
	$query = update_data( $data, $tableName, $id );

	if ( $query )
	{
		sendMsg( 'success', '' );
	}
	else
	{
		sendMsg( 'error', '' );
	}
}




// ======= delete data from database ============//

if ( !empty( $_GET['deleteId'] ) && !empty( $_GET['deleteData'] ) )
{
	$id = legal_input($_GET['deleteId']);
	$deleteData =legal_input($_GET['deleteData']);
	$tableName = $deleteData;

// 	if ($tableName == Config::tbU)
//    {
// 		$query = "SELECT ".Config::tbRImage." FROM ".Config::tbR." WHERE ".Config::tbH."=:".Config::tbH."";
// 		$result = $db->Select( $query,	[
// 											Config::tbH => $id
// 										] );
// 		if ( $result )
// 		{
// 			foreach ( $result as $key => $data )
// 			{
// 				if ( file_exists( "../../assets/images/rooms_main/" . $data[Config::tbRImage] ) )
// 				{
// 					unlink( "../../assets/images/rooms_main/" . $data[Config::tbRImage] );

// 				}
// 			}
// 		}
//    }


	$deleteData = delete_data($tableName, $id);

	if ( $deleteData )
	{
		?>
			<script>
			swal({
			title: "Deleted Succeffuly!",
			text: "Thank You!",
			icon: "success",
			button: "Back!",
			});
			</script>
			
			<?php
	}
	else
	{
		sendMsg( 'error', 'Check your query...' );
	}	 
}

function legal_input($value)
{
	$value = trim($value);
	$value = stripslashes($value);
	$value = htmlspecialchars($value);
	return $value;
}

function insert_data(array $data, string $tableName)
{
	global $db;

	$userValuesArr = [];
	$tableColumns = $tableColumnsPre = ''; 
	$num = 0; 
	
	foreach($data as $column=>$value)
	{ 
		$comma = ($num > 0)?', ':'';
		$tableColumns .= $comma.$column; 
		$tableColumnsPre .= $comma.':'.$column;
		$userValuesArr += [$column => $value];
		$num++; 
	}

	$insertQuery = "INSERT INTO ".$tableName." (".$tableColumns.") VALUES (".$tableColumnsPre.")";
	$insertResult = $db->Insert($insertQuery, $userValuesArr);


	if($insertResult)
	{
		return true;
	}
	else
	{
		return "Error: " . $insertQuery;
	}
}


function update_data($data, $tableName, $id)
{
		global $db;

		$userValuesArr = [];
		$columnsValues = ''; 
		$num = 0; 
		foreach($data as $column=>$value)
		{ 
				$comma = ($num > 0)?', ':''; 
				$columnsValues.=$comma.$column." = :".$column; 
				$userValuesArr += [$column => $value];
				$num++; 
		} 

		$updateQuery="UPDATE ".$tableName." SET ".$columnsValues." WHERE uid=:uid";
		$userValuesArr += ['uid' => $id];

		$updateResult = $db->Update($updateQuery, $userValuesArr);		
		return true;
}



function get_value($columnName, $columnPickName, $columnPickValue, $tableName)
{
		global $db;

		$selectQuery="SELECT ".$columnName." FROM ".$tableName." WHERE ".$columnPickName."=:".$columnPickName."";

		$selectResult = $db->Select($selectQuery, [$columnPickName => $columnPickValue]);
		
		if ( empty($selectResult) )
		{
				return NULL;
		}
		else
		{
				return $selectResult[0][$columnName];
		}
}



function get_uid($columnName, $columnValue, $tableName)
{
		global $db;

		$selectQuery="SELECT uid FROM ".$tableName." WHERE ".$columnName."=:".$columnName." ORDER BY uid DESC;";

		$selectResult = $db->Select($selectQuery, [$columnName => $columnValue]);
		
		if ( empty($selectResult) )
		{
				return NULL;
		}
		else
		{
				foreach($selectResult as $column=>$value)
				{
						return $value['uid'];
				}
		}
}

function delete_data($tableName, $id)
{
	global $db;

	$query="DELETE FROM ".$tableName." WHERE uid=:uid";
	$result = $db->Remove($query, [ 'uid' => $id ]);
	
	return true;
}

function sendMsg($type, $msg)
{
	switch ($type) {
		case 'success':
			echo '
				<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
					<span class="badge badge-pill badge-success">Success</span>
					'.$msg.'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
			';
			break;
		case 'error':
			echo '
				<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
					<span class="badge badge-pill badge-danger">Error</span>
					'.$msg.'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
			';
			break;
	}
}
?>