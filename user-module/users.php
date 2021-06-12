<?php
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

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if ( !isset($_SESSION['level']) || $_SESSION['level'] == 3 )
    {
		echo '<script> document.location.href = "../index.php?cat=admin-module&subcat=users"; </script>';
		return;
    }
?>


<?php

if( $_GET['subcat'] == 'add-users' && isset($_GET['edit']) )
		
	{
		$idAttr = "insertForm";
        
        
?>

<div class="row">
	<div class="col-md-12">
		<div class="overview-wrap">
			<h2 class="title-1">
				
			</h2>
			<a href="index.php?cat=user-module&subcat=users" class="content-link">
				<button class="au-btn au-btn-icon au-btn--blue">
				<i class="fas fa-long-arrow-alt-left"></i>Back</button>
			</a>
		</div>
	</div>
</div>

<br>

<div class="card">
	<div class="card-body card-block" style=" font-family: Times New Roman;">
	
		<form id="<?php echo $idAttr; ?>" rel="" name="<?php echo Config::tbT; ?>" >
			
			<div class="form-group" style="text-align: center;">
				<label for="nf-email" class=" form-control-label"><strong><h2><i class="fa fa-credit-card"></i> TRANSFER FORM </h2> </strong></label> <br />
				
			</div>
			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Amount to be transfered: </label> <br />
				<input type="number" name="tbTAmount" class="form-control" placeholder="Enter Amount"  >
			</div>

			<div class="form-group">
			<label for="nf-email" class=" form-control-label">Beneficiary name:  </label> <br />
			<input type="text" name="tbTBeneficiaryName" class="form-control"  placeholder="Enter Beneficiary name" >
			</div>

			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Benificiary bank: </label> <br />
				<input type="text" name="tbTBenificiaryBank" class="form-control"  placeholder="Enter Benificiary bank" >
			</div>

			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Account number: </label> <br />
				<input type="number" name="tbTAccountNumber" class="form-control"  placeholder="Enter Account number "  >
			</div>

			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Sort/swift/iban code: </label> <br />
				<input type="number" name="tbTIbanCode" class="form-control"  placeholder="Enter Sort/swift/iban code"  >
			</div>

			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Phone: </label> <br />
				<input type="number" name="tbTPhone" class="form-control"  placeholder="Enter phone number" >
			</div>

			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Email: </label> <br />
				<input type="email" name="tbTEmail" class="form-control"  placeholder="Enter email "  >
			</div>
		<div class="form-group">
				<label for="nf-email" class=" form-control-label">City: </label> <br />
				<input type="text" name="tbTCity" class="form-control"  placeholder="Enter city "  >
			</div>
		<div class="form-group">
				<label for="nf-email" class=" form-control-label">State: </label> <br />
				<input type="state" name="tbTState" class="form-control"  placeholder="Enter city " >
			</div>
		<div class="form-group">
				<label for="nf-email" class=" form-control-label">Country: </label> <br />
				<input type="text" name="tbTCountry" class="form-control"  placeholder="Enter country "  >
		</div>



			<div class="card-footer">
			<button type="submit" class="btn btn-primary btn-sm" form="<?php echo $idAttr; ?>"> Done
			</button>
			</div>
		</form>
    </div>
    
	
</div>





<?php } else if ( $_GET['subcat'] == 'add-users' && !isset($_GET['edit']) )

	{
		
		$query = "SELECT * FROM ".Config::tbU." WHERE ".Config::tbUUID."=:".Config::tbUUID."";
		$result = $db->Select( $query,	[
											Config::tbUUID => $_SESSION['uid']
										] );
		if ( $result )
		{
			
			$tbUPaddress = $result[0][Config::tbUPaddress];
			$tbUPidentification = $result[0][Config::tbUPidentification];
			$tbUPfinance = $result[0][Config::tbUPfinance];


		}
		else
		{
			echo '<script> document.location.href = "index.php?cat=user-module&subcat=users"; </script>';
			return;
			
		}

		$idAttr = "updateForm";
        
        
?>

<div class="row">
	<div class="col-md-12">
		<div class="overview-wrap">
			<h2 class="title-1">
				
			</h2>
			<a href="index.php?cat=user-module&subcat=users" class="content-link">
				<button class="au-btn au-btn-icon au-btn--blue">
				<i class="fas fa-long-arrow-alt-left"></i>Back</button>
			</a>
		</div>
	</div>
</div>

<br>

<div class="card">
	<div class="card-body card-block">
	
		<form id="<?php echo $idAttr; ?>" rel="<?php echo $_SESSION['uid']; ?>" name="<?php echo Config::tbU; ?>" >
			
			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Upload Documents: </label> <br />
				
			</div>
			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Proof of address: </label> <br />
				<input type="file" name="tbUPaddress" class="form-control" value="<?php echo $tbUDocuments; ?>" >
			</div>
			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Proof of identification: </label> <br />
				<input type="file" name="tbUPidentification" class="form-control" value="<?php echo $tbUDocuments; ?>" >
			</div>
			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Proof of finance: </label> <br />
				<input type="file" name="tbUPfinance" class="form-control" value="<?php echo $tbUDocuments; ?>" >
			</div>

			<div class="card-footer">
			<button type="submit" class="btn btn-primary btn-sm" form="<?php echo $idAttr; ?>">
			<i class="fa fa-upload"></i> Upload
			</button>
			</div>
		</form>
    </div>
    
	
</div>


<?php }  else {

	
if( $_GET['subcat'] == 'add-users' && !empty( $_GET['edit'] ) )
{
			$editId= $_GET['edit'];

			$query = "SELECT * FROM ".Config::tbU." WHERE ".Config::tbUUID."=:".Config::tbUUID."";
			$result = $db->Select( $query,	[
												Config::tbUUID => $editId
											] );

			if ( $result && $_GET['doc_number'] == 1 )
			{
				$image1 = $result[0][Config::tbUPaddress];

				$target_file = Config::storageDocument . $image1;
				$data = [
							Config::tbUPaddress =>  ''
						];

				$tableName = Config::tbU;
				$id = $editId;
				
				if ( file_exists( $target_file ) )
					{
						unlink( $target_file  );
					}
					
				$query = update_data( $data, $tableName, $id );

				if ( $query )
				{
					?>
						<script>
					
					swal({
					title: "Deleted Successfully!",
					text: "Thank You!",
					icon: "success"
						}).then(function() {
							window.location = "index.php?cat=user-module&subcat=users";
						});

					</script>
					<?php

				}

				else
				{

					echo '<script> document.location.href = "index.php?cat=user-module&subcat=users"; </script>';
					return;
				
				}
			}
			else if ( $result && $_GET['doc_number'] == 2 )
			{
				$image2 = $result[0][Config::tbUPidentification];
				
				$target_file = Config::storageDocument . $image2;
				$data = [
							Config::tbUPidentification =>  ''
						];

				$tableName = Config::tbU;
				$id = $editId;
				
				if ( file_exists( $target_file ) )
					{
						unlink( $target_file  );
					}
					
				$query = update_data( $data, $tableName, $id );

				if ( $query )
				{
					?>
					<script>
					
					swal({
					title: "Deleted Successfully!",
					text: "Thank You!",
					icon: "success"
						}).then(function() {
							window.location = "index.php?cat=user-module&subcat=users";
						});

					</script>
					
					<?php

					

					
			
				}
				else
				{
					echo '<script> document.location.href = "index.php?cat=user-module&subcat=users"; </script>';
				return;
				
				}
			}
			else if ( $result && $_GET['doc_number'] == 3 )
			{
				$image3 = $result[0][Config::tbUPfinance];
				
				$target_file = Config::storageDocument . $image3;
				$data = [
							Config::tbUPfinance =>  ''
						];

				$tableName = Config::tbU;
				$id = $editId;
				
				if ( file_exists( $target_file ) )
					{
						unlink( $target_file  );
					}
					
				$query = update_data( $data, $tableName, $id );

				if ( $query )
				{
					?>

					<script>
					
					swal({
					title: "Deleted Successfully!",
					text: "Thank You!",
					icon: "success"
						}).then(function() {
							window.location = "index.php?cat=user-module&subcat=users";
						});

					</script>

					<?php

			
					
				}
				else
				{

				echo '<script> document.location.href = "index.php?cat=user-module&subcat=users"; </script>';
				return;
				
				}
			}
			
			else
			{
				echo '<script> document.location.href = "index.php?cat=user-module&subcat=users"; </script>';
				return;
			}

			$idAttr = "updateForm";

}


	
$query = "SELECT * FROM ".Config::tbU." WHERE ".Config::tbUUID."=:".Config::tbUUID." ORDER BY ".Config::tbUUsername." ASC";
        
                             $result = $db->Select( $query,	[
                                                        Config::tbUUID => $_SESSION['uid']
                                                    ] );
        if ( $result )
            
            {
				$tbUUID = $result[0][Config::tbUUID];
				$tbUUsername = $result[0][Config::tbUUsername];
				$tbUEmail = $result[0][Config::tbUEmail];
				$tbUBalance = $result[0][Config::tbUBalance];
				$tbUAddress = $result[0][Config::tbUAddress];
				$tbUCity = $result[0][Config::tbUCity];
				$tbUCountry = $result[0][Config::tbUCountry];
				$tbUState = $result[0][Config::tbUState];
				$tbUStatus = $result[0][Config::tbUStatus];
				$tbUAccountType = $result[0][Config::tbUAccountType];
				$tbUPhone = $result[0][Config::tbUPhone];
				$tbUPass = '';
				$tbUPaddress = $result[0][Config::tbUPaddress];
				$tbUPidentification = $result[0][Config::tbUPidentification];
				$tbUPfinance = $result[0][Config::tbUPfinance];
				$tbUReason = $result[0][Config::tbUReason];  
				$tbUAccountCurrency = $result[0][Config::tbUAccountCurrency];  
				

            }
	else
	{
		return;
	}
            $idAttr = "updateForm";
?>

<div style="background-color:lightblue; padding:1%; "  class="container">

<div class="row">
<!-- transfer status -->
     <?php
      $query = "SELECT * FROM ".Config::tbT." WHERE ".Config::tbU."=:".Config::tbU." ORDER BY ".Config::tbTUID." DESC LIMIT 1";

							$result2 = $db->Select( $query,	[
																Config::tbU => $_SESSION['uid']
							
													] );

												if ( $result2 )
													{

												$tbTPendingTransfer = $result2[0][Config::tbTPendingTransfer];  
											

												
												} else {
													$tbTPendingTransfer = " NO transfer made "; 
												}
												?>

	<div class="col-sm">
	<h3>Transfer Status: <?php echo $tbTPendingTransfer; ?> </h3>
	</div>		

  <?php 

    
  ?>
    


    <div class="col-sm">
		<h3>Balance: <?php echo $tbUAccountCurrency; ?> <?php echo $tbUBalance; ?></h3>
    </div>


    <div class="col-sm">
		<h3>Status: <span style="color:<?php if($tbUStatus == 'Active') echo 'green'; else echo 'red'; ?>;"><?php echo $tbUStatus; ?></span></h3>
    </div>


    <div class="col-sm">
		<h3>Account Type: <?php echo $tbUAccountType; ?> </h3>
    </div>
    <div class="col-sm">
		<h3>Reason: <span style="color:red"> <?php echo $tbUReason; ?></span></h3>
    </div>
    
  </div>
</div>

<br><br><br>

<div class="row">
	<div class="col-md-12">
		<div class="overview-wrap">
			<h2 class="title-1">User</h2>
			
		</div>
	</div>
</div>
<br>

<div class="table-responsive">
	<table class="table table-striped " >
		<tr scope="row">
			<th colspan="1">Username: </th><td colspan="2"><?php echo $tbUUsername; ?></td>
		</tr>    
		<tr>
			<th colspan="1">Email: </th><td colspan="2"><?php echo $tbUEmail; ?></td>
		</tr>
		<!-- <tr>
			<th colspan="1">Balance: </th><td colspan="2"><?php// echo $tbUAccountCurrency; ?> <?php //echo $tbUBalance; ?></td>
		</tr> -->
		<tr>
			<th colspan="1">Address: </th><td colspan="2"><?php echo $tbUAddress; ?></td>
		</tr>
		<tr>
			<th colspan="1">Phone: </th><td colspan="2"><?php echo $tbUPhone; ?></td>
		</tr>
		<tr>
			<th colspan="1">City: </th><td colspan="2"><?php echo $tbUCity; ?></td>
		</tr> 
        <tr>
			<th colspan="1">State: </th><td colspan="2"><?php echo $tbUState; ?></td>
		</tr>
        <tr>
			<th colspan="1">Country: </th><td colspan="2"><?php echo $tbUCountry; ?></td>
		</tr>
        <tr>
			<th colspan="1">Status: </th><td colspan="2">  <span style="color:<?php if($tbUStatus == 'Active') echo 'green'; else echo 'red'; ?>;"><?php echo $tbUStatus; ?></td>
		</tr>
		<tr>
			<th colspan="1">Account Type: </th><td colspan="2"><?php echo $tbUAccountType; ?></td>
		</tr>
		
		<tr>
			<th colspan="1"> Upload Documents : </th> <td colspan="2">

			<a href="index.php?cat=user-module&subcat=add-users" class="content-link">
				<button class="btn btn-primary">
				<i class="fa fa-upload"></i> &nbsp Upload Documents </button>
			</a>
			</td>
		</tr>
	


		<tr>
			<th colspan="1">Transfer Form: </th> <td colspan="2">

				<?php if($tbUStatus == 'Active') {
				?>
					<a href="index.php?cat=user-module&subcat=add-users&edit=<?php echo $tbUUID ?>" class="content-link">
						<button class="btn btn-primary">
						<i class="fa fa-credit-card"></i> &nbsp Transfer Amount </button>
					</a>
					</td>


				<?php 

				} else {
					echo  '<span style="color:red;font-weight: bold;"> *Sorry, Your account is not Active to transfer the amount </span>' ; 
				}

				 ?>
			
		</tr>

		
		<tr>
			<th rowspan="4">Uploaded Documents :- </th>  <hr>
		
		</tr>
         <tr>
            <th>Proof of address : </th>
			 <td>
				<a href="<?php echo Config::webURL . Config::storageDocument . $tbUPaddress; ?>" target="_blank" ><?php echo $tbUPaddress; ?></a>
				  
				<a href="index.php?cat=user-module&subcat=add-users&edit=<?php echo $tbUUID; ?>&doc_number=1">
				<button class="btn btn-primary"> Delete </button>
				</a>
				
			</td>
		</tr>

         <tr>
		 <th>Proof of Identification : </th>
			 <td>
				<a href="<?php echo Config::webURL . Config::storageDocument . $tbUPidentification; ?>" target="_blank" ><?php echo $tbUPidentification; ?></a>
				<a href="index.php?cat=user-module&subcat=add-users&edit=<?php echo $tbUUID; ?>&doc_number=2">
				<button class="btn btn-primary"> Delete </button>
				</a>
			</td>
			
		</tr>

         <tr>
		 <th>Proof of finance : </th>
			 <td>
				<a href="<?php echo Config::webURL . Config::storageDocument . $tbUPfinance; ?>" target="_blank" ><?php echo $tbUPfinance; ?></a>
			 
				<a href="index.php?cat=user-module&subcat=add-users&edit=<?php echo $tbUUID; ?>&doc_number=3">
				<button class="btn btn-primary"> Delete </button>
				</a>
			</td>
	
	
		</tr>
	</table>
</div>
<?php

}

?>