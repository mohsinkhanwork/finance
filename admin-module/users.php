
<?php

    if ( !isset($_SESSION['level']) || $_SESSION['level'] == 0)
    {
		echo '<script> document.location.href = "../index.php?cat=admin-module&subcat=users"; </script>';
		return;
    }
?>

<?php

	if( $_GET['subcat'] == 'add-users' && isset($_GET['action']) && $_GET['action'] == 'reason' )
	{
		
		if( !empty( $_GET['edit'] ) )
		{
			$editId= $_GET['edit'];
			$idAttr = "updateForm";
		}
        
?>

<div class="row">
	<div class="col-md-12">
		<div class="overview-wrap">
			<h2 class="title-1">
				<?php
					if(!empty($_GET['edit']))
						echo 'Edit User';
					elseif(!empty($_GET['view']))
						echo 'View User';
				?>
			</h2>
			<a href="index.php?cat=admin-module&subcat=users" class="content-link">
				<button class="au-btn au-btn-icon au-btn--blue">
				<i class="fas fa-long-arrow-alt-left"></i>Back</button>
			</a>
		</div>
	</div>
</div>

<br>

<div class="card">
	<div class="card-body card-block">
	
		<form id="<?php echo $idAttr; ?>" rel="<?php echo $editId; ?>" name="action_reason">
			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Reason: </label>
				<input type="text" name="tbUReason" placeholder="Enter you reason.." class="form-control" value="">
			</div>
		</form>
    </div>
    
	<div class="card-footer">
		<button type="submit" class="btn btn-primary btn-sm" form="<?php echo $idAttr; ?>">
			<i class="fa fa-dot-circle-o"></i> Save
		</button>
	</div>
</div>



<?php }
    
	else if( $_GET['subcat'] == 'add-users' )
	{
		
		if( !empty( $_GET['edit'] ) )
		{
			$editId= $_GET['edit'];

			$query = "SELECT * FROM ".Config::tbU." WHERE ".Config::tbUUID."=:".Config::tbUUID."";
			$result = $db->Select( $query,	[
												Config::tbUUID => $editId
											] );
			if ( $result )
			{
				$tbUUsername = $result[0][Config::tbUUsername];
				$tbUPass = $result[0][Config::tbUPass];
				$tbUEmail = $result[0][Config::tbUEmail];
				$tbUBalance = $result[0][Config::tbUBalance];
				$tbUAddress = $result[0][Config::tbUAddress];
				$tbUCity = $result[0][Config::tbUCity];
				$tbUCountry = $result[0][Config::tbUCountry];
				$tbUState = $result[0][Config::tbUState];
				$tbUStatus = $result[0][Config::tbUStatus];
				$tbUPhone = $result[0][Config::tbUPhone];
				$tbUReason = $result[0][Config::tbUReason];
				$tbUAccountCurrency = $result[0][Config::tbUAccountCurrency];
			
            
            
			}
			else
			{
				echo '<script> document.location.href = "index.php?cat=admin-module&subcat=users"; </script>';
       			 return;
				
			}

			$idAttr = "updateForm";
		}
		else
		{
			$tbUUsername = "";
			$tbUPass = "";
			$tbUEmail = "";
			$tbUBalance = "";
			$tbUAccountCurrency = "";
			$tbUAddress = "";
			$tbUCity = "";
			$tbUPhone = "";
			$tbUCountry = "";
            $tbUState = "";    
			$tbUReason = "";
			$tbUStatus  = "";
			$tbUDatejoined = "";
			$editId = '';
			$idAttr = "insertForm";
		}
        
        
        
?>

<div class="row">
	<div class="col-md-12">
		<div class="overview-wrap">
			<h2 class="title-1">
				<?php
					if(!empty($_GET['edit']))
						echo 'Edit User';
					elseif(!empty($_GET['view']))
						echo 'View User';
				?>
			</h2>
			<a href="index.php?cat=admin-module&subcat=users" class="content-link">
				<button class="au-btn au-btn-icon au-btn--blue">
				<i class="fas fa-long-arrow-alt-left"></i>Back</button>
			</a>
		</div>
	</div>
</div>

<br>

<div class="card">
	<div class="card-body card-block">
	
		<form id="<?php echo $idAttr; ?>" onsubmit="process(event)" rel="<?php echo $editId; ?>" name="<?php echo Config::tbU; ?>">
			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Username: </label>
				<input type="text" name="tbUUsername" placeholder="Enter username.." class="form-control" value="<?php echo $tbUUsername; ?>">
			</div>
			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Password: </label>
				<input type="password" name="tbUPass" placeholder="Enter your password.." class="form-control" value="<?php echo $tbUPass; ?>">
			</div>
			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Email: </label>
				<input type="email" name="tbUEmail" placeholder="Enter your email.." class="form-control" value="<?php echo $tbUEmail; ?>">
			</div>
		<!--working-->

			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Balance: </label>
				<input type="number" name="tbUBalance" placeholder="Enter balance.." class="form-control" value="<?php echo $tbUBalance; ?>">
				</div>

		<div class="form-group">
			<select name="tbUAccountCurrency" style="padding:5px;">

			    <option >Please Select Your Account Currency</option>

			    <option value="USD" label="US dollar">USD</option>
			    <option value="AUD" label="Australian dollar">AUD</option>
			    <option value="EUR" label="Euro">EUR</option>
			    <option value="JPY" label="Japanese yen">JPY</option>
			    <option value="GBP" label="Pound sterling">GBP</option>
			    <option value="PKR" label="Pakistani rupee">PKR</option>
			    <option disabled>─────────────────</option>
			    <option value="AED" label="United Arab Emirates dirham">AED</option>
			    <option value="AFN" label="Afghan afghani">AFN</option>
			    <option value="ALL" label="Albanian lek">ALL</option>
			    <option value="AMD" label="Armenian dram">AMD</option>
			    <option value="ANG" label="Netherlands Antillean guilder">ANG</option>
			    <option value="AOA" label="Angolan kwanza">AOA</option>
			    <option value="ARS" label="Argentine peso">ARS</option>
			    <option value="AWG" label="Aruban florin">AWG</option>
			    <option value="AZN" label="Azerbaijani manat">AZN</option>
			    <option value="BAM" label="Bosnia and Herzegovina convertible mark">BAM</option>
			    <option value="BBD" label="Barbadian dollar">BBD</option>
			    <option value="BDT" label="Bangladeshi taka">BDT</option>
			    <option value="BGN" label="Bulgarian lev">BGN</option>
			    <option value="BHD" label="Bahraini dinar">BHD</option>
			    <option value="BIF" label="Burundian franc">BIF</option>
			    <option value="BMD" label="Bermudian dollar">BMD</option>
			    <option value="BND" label="Brunei dollar">BND</option>
			    <option value="BOB" label="Bolivian boliviano">BOB</option>
			    <option value="BRL" label="Brazilian real">BRL</option>
			    <option value="BSD" label="Bahamian dollar">BSD</option>
			    <option value="BTN" label="Bhutanese ngultrum">BTN</option>
			    <option value="BWP" label="Botswana pula">BWP</option>
			    <option value="BYN" label="Belarusian ruble">BYN</option>
			    <option value="BZD" label="Belize dollar">BZD</option>
			    <option value="CAD" label="Canadian dollar">CAD</option>
			    <option value="CDF" label="Congolese franc">CDF</option>
			    <option value="CHF" label="Swiss franc">CHF</option>
			    <option value="CLP" label="Chilean peso">CLP</option>
			    <option value="CNY" label="Chinese yuan">CNY</option>
			    <option value="COP" label="Colombian peso">COP</option>
			    <option value="CRC" label="Costa Rican colón">CRC</option>
			    <option value="CUC" label="Cuban convertible peso">CUC</option>
			    <option value="CUP" label="Cuban peso">CUP</option>
			    <option value="CVE" label="Cape Verdean escudo">CVE</option>
			    <option value="CZK" label="Czech koruna">CZK</option>
			    <option value="DJF" label="Djiboutian franc">DJF</option>
			    <option value="DKK" label="Danish krone">DKK</option>
			    <option value="DOP" label="Dominican peso">DOP</option>
			    <option value="DZD" label="Algerian dinar">DZD</option>
			    <option value="EGP" label="Egyptian pound">EGP</option>
			    <option value="ERN" label="Eritrean nakfa">ERN</option>
			    <option value="ETB" label="Ethiopian birr">ETB</option>
			    <option value="EUR" label="EURO">EUR</option>
			    <option value="FJD" label="Fijian dollar">FJD</option>
			    <option value="FKP" label="Falkland Islands pound">FKP</option>
			    <option value="GBP" label="British pound">GBP</option>
			    <option value="GEL" label="Georgian lari">GEL</option>
			    <option value="GGP" label="Guernsey pound">GGP</option>
			    <option value="GHS" label="Ghanaian cedi">GHS</option>
			    <option value="GIP" label="Gibraltar pound">GIP</option>
			    <option value="GMD" label="Gambian dalasi">GMD</option>
			    <option value="GNF" label="Guinean franc">GNF</option>
			    <option value="GTQ" label="Guatemalan quetzal">GTQ</option>
			    <option value="GYD" label="Guyanese dollar">GYD</option>
			    <option value="HKD" label="Hong Kong dollar">HKD</option>
			    <option value="HNL" label="Honduran lempira">HNL</option>
			    <option value="HKD" label="Hong Kong dollar">HKD</option>
			    <option value="HRK" label="Croatian kuna">HRK</option>
			    <option value="HTG" label="Haitian gourde">HTG</option>
			    <option value="HUF" label="Hungarian forint">HUF</option>
			    <option value="IDR" label="Indonesian rupiah">IDR</option>
			    <option value="ILS" label="Israeli new shekel">ILS</option>
			    <option value="IMP" label="Manx pound">IMP</option>
			    <option value="INR" label="Indian rupee">INR</option>
			    <option value="IQD" label="Iraqi dinar">IQD</option>
			    <option value="IRR" label="Iranian rial">IRR</option>
			    <option value="ISK" label="Icelandic króna">ISK</option>
			    <option value="JEP" label="Jersey pound">JEP</option>
			    <option value="JMD" label="Jamaican dollar">JMD</option>
			    <option value="JOD" label="Jordanian dinar">JOD</option>
			    <option value="JPY" label="Japanese yen">JPY</option>
			    <option value="KES" label="Kenyan shilling">KES</option>
			    <option value="KGS" label="Kyrgyzstani som">KGS</option>
			    <option value="KHR" label="Cambodian riel">KHR</option>
			    <option value="KID" label="Kiribati dollar">KID</option>
			    <option value="KMF" label="Comorian franc">KMF</option>
			    <option value="KPW" label="North Korean won">KPW</option>
			    <option value="KRW" label="South Korean won">KRW</option>
			    <option value="KWD" label="Kuwaiti dinar">KWD</option>
			    <option value="KYD" label="Cayman Islands dollar">KYD</option>
			    <option value="KZT" label="Kazakhstani tenge">KZT</option>
			    <option value="LAK" label="Lao kip">LAK</option>
			    <option value="LBP" label="Lebanese pound">LBP</option>
			    <option value="LKR" label="Sri Lankan rupee">LKR</option>
			    <option value="LRD" label="Liberian dollar">LRD</option>
			    <option value="LSL" label="Lesotho loti">LSL</option>
			    <option value="LYD" label="Libyan dinar">LYD</option>
			    <option value="MAD" label="Moroccan dirham">MAD</option>
			    <option value="MDL" label="Moldovan leu">MDL</option>
			    <option value="MGA" label="Malagasy ariary">MGA</option>
			    <option value="MKD" label="Macedonian denar">MKD</option>
			    <option value="MMK" label="Burmese kyat">MMK</option>
			    <option value="MNT" label="Mongolian tögrög">MNT</option>
			    <option value="MOP" label="Macanese pataca">MOP</option>
			    <option value="MRU" label="Mauritanian ouguiya">MRU</option>
			    <option value="MUR" label="Mauritian rupee">MUR</option>
			    <option value="MVR" label="Maldivian rufiyaa">MVR</option>
			    <option value="MWK" label="Malawian kwacha">MWK</option>
			    <option value="MXN" label="Mexican peso">MXN</option>
			    <option value="MYR" label="Malaysian ringgit">MYR</option>
			    <option value="MZN" label="Mozambican metical">MZN</option>
			    <option value="NAD" label="Namibian dollar">NAD</option>
			    <option value="NGN" label="Nigerian naira">NGN</option>
			    <option value="NIO" label="Nicaraguan córdoba">NIO</option>
			    <option value="NOK" label="Norwegian krone">NOK</option>
			    <option value="NPR" label="Nepalese rupee">NPR</option>
			    <option value="NZD" label="New Zealand dollar">NZD</option>
			    <option value="OMR" label="Omani rial">OMR</option>
			    <option value="PAB" label="Panamanian balboa">PAB</option>
			    <option value="PEN" label="Peruvian sol">PEN</option>
			    <option value="PGK" label="Papua New Guinean kina">PGK</option>
			    <option value="PHP" label="Philippine peso">PHP</option>
			    <option value="PLN" label="Polish złoty">PLN</option>
			    <option value="PRB" label="Transnistrian ruble">PRB</option>
			    <option value="PYG" label="Paraguayan guaraní">PYG</option>
			    <option value="QAR" label="Qatari riyal">QAR</option>
			    <option value="RON" label="Romanian leu">RON</option>
			    <option value="RON" label="Romanian leu">RON</option>
			    <option value="RSD" label="Serbian dinar">RSD</option>
			    <option value="RUB" label="Russian ruble">RUB</option>
			    <option value="RWF" label="Rwandan franc">RWF</option>
			    <option value="SAR" label="Saudi riyal">SAR</option>
			    <option value="SEK" label="Swedish krona">SEK</option>
			    <option value="SGD" label="Singapore dollar">SGD</option>
			    <option value="SHP" label="Saint Helena pound">SHP</option>
			    <option value="SLL" label="Sierra Leonean leone">SLL</option>
			    <option value="SLS" label="Somaliland shilling">SLS</option>
			    <option value="SOS" label="Somali shilling">SOS</option>
			    <option value="SRD" label="Surinamese dollar">SRD</option>
			    <option value="SSP" label="South Sudanese pound">SSP</option>
			    <option value="STN" label="São Tomé and Príncipe dobra">STN</option>
			    <option value="SYP" label="Syrian pound">SYP</option>
			    <option value="SZL" label="Swazi lilangeni">SZL</option>
			    <option value="THB" label="Thai baht">THB</option>
			    <option value="TJS" label="Tajikistani somoni">TJS</option>
			    <option value="TMT" label="Turkmenistan manat">TMT</option>
			    <option value="TND" label="Tunisian dinar">TND</option>
			    <option value="TOP" label="Tongan paʻanga">TOP</option>
			    <option value="TRY" label="Turkish lira">TRY</option>
			    <option value="TTD" label="Trinidad and Tobago dollar">TTD</option>
			    <option value="TVD" label="Tuvaluan dollar">TVD</option>
			    <option value="TWD" label="New Taiwan dollar">TWD</option>
			    <option value="TZS" label="Tanzanian shilling">TZS</option>
			    <option value="UAH" label="Ukrainian hryvnia">UAH</option>
			    <option value="UGX" label="Ugandan shilling">UGX</option>
			    <option value="USD" label="United States dollar">USD</option>
			    <option value="UYU" label="Uruguayan peso">UYU</option>
			    <option value="UZS" label="Uzbekistani soʻm">UZS</option>
			    <option value="VES" label="Venezuelan bolívar soberano">VES</option>
			    <option value="VND" label="Vietnamese đồng">VND</option>
			    <option value="VUV" label="Vanuatu vatu">VUV</option>
			    <option value="WST" label="Samoan tālā">WST</option>
			    <option value="XAF" label="Central African CFA franc">XAF</option>
			    <option value="XCD" label="Eastern Caribbean dollar">XCD</option>
			    <option value="XOF" label="West African CFA franc">XOF</option>
			    <option value="XPF" label="CFP franc">XPF</option>
			    <option value="ZAR" label="South African rand">ZAR</option>
			    <option value="ZMW" label="Zambian kwacha">ZMW</option>
			    <option value="ZWB" label="Zimbabwean bonds">ZWB</option>
			</select>
				
		</div>
			
<!-- till here -->


			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Phone:  </label> <br />
				<input type="tel" id="phone"  name="tbUPhone" class="form-control" value="<?php echo $tbUPhone; ?>">
			</div>



			<div class="form-group">
				<label for="nf-email" class=" form-control-label">Complete Address : </label>
				<input type="text" name="tbUAddress" placeholder="Enter address.." class="form-control" value="<?php echo $tbUAddress; ?>">
			</div>
			
			<div class="form-group">
				<label for="nf-email" class=" form-control-label">City: </label>
				<input type="text" name="tbUCity" placeholder="Enter city name.." class="form-control" value="<?php echo $tbUCity; ?>">
			</div>
            <div class="form-group">
				<label for="nf-email" class=" form-control-label">State: </label>
				<input type="text" name="tbUState" placeholder="Enter state.." class="form-control" value="<?php echo $tbUState; ?>">
			</div>	

            <div class="form-group">
				<label for="nf-email" class=" form-control-label">Country: </label>
				<input type="text" name="tbUCountry" placeholder="Enter country.." class="form-control" value="<?php echo $tbUCountry; ?>">
			</div>




		
		</form>
		<div class="alert alert-info" style="display: none;"></div>
    </div>
	<div class="card-footer">
		<button type="submit" class="btn btn-primary btn-sm" form="<?php echo $idAttr; ?>">
			<i class="fa fa-dot-circle-o"></i> Save
		</button>
	</div>
</div>



<?php } else if ( !empty( $_GET['view'] ) ) 
    
    { 

           $id= $_GET['view'];

            $query="SELECT * FROM ".Config::tbU." WHERE ".Config::tbUUID."=:".Config::tbUUID."";
            $result = $db->Select( $query,	[
                                                Config::tbUUID => $id
                                            ] );
	   if ( $result )
            {
                        $tbUUsername = $result[0][Config::tbUUsername];
                        $tbUPass = $result[0][Config::tbUPass];
                        $tbUEmail = $result[0][Config::tbUEmail];
                        $tbUBalance = $result[0][Config::tbUBalance];
                        $tbUAddress = $result[0][Config::tbUAddress];
                        $tbUCity = $result[0][Config::tbUCity];
                        $tbUCountry = $result[0][Config::tbUCountry];
                        $tbUState = $result[0][Config::tbUState];
                        $tbUStatus = $result[0][Config::tbUStatus];
						$tbUPhone = $result[0][Config::tbUPhone];   
                        $tbCreated = $result[0][Config::tbCreated];
                        $tbModified = $result[0][Config::tbModified];
                        $tbUPaddress = $result[0][Config::tbUPaddress];
						$tbUPidentification = $result[0][Config::tbUPidentification];
						$tbUPfinance = $result[0][Config::tbUPfinance];
						$tbUReason = $result[0][Config::tbUReason];
						$tbUStatus = $result[0][Config::tbUStatus];
						$tbUAccountType = $result[0][Config::tbUAccountType];
						$tbUAccountCurrency = $result[0][Config::tbUAccountCurrency];
						
						
					

            }
	else
	{
		echo '<script> document.location.href = "index.php?cat=admin-module&subcat=users"; </script>';
		return;
	}
            $idAttr = "updateForm";
?>

<div class="row">
	<div class="col-md-12">
		<div class="overview-wrap">
			<h2 class="title-1">User</h2>
			<a href="index.php?cat=admin-module&subcat=users" class="content-link">
				<button class="au-btn au-btn-icon au-btn--blue">
				<i class="fas fa-long-arrow-alt-left"></i>Back</button>
			</a>
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
		<tr>
			<th colspan="1">Balance: </th><td colspan="2"><?php echo $tbUAccountCurrency; ?> <?php echo $tbUBalance; ?> </td>
		</tr>
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
			<th colspan="1">Status: </th><td colspan="2"><span style="color:<?php if ($tbUStatus=='Active') echo 'green'; else echo 'red'; ?>;"> <?php echo $tbUStatus; ?></span> </td>
		</tr>
		<tr>
			<th colspan="1">Reason : </th> <td colspan="2"><span style="color:red"; ><?php echo $tbUReason; ?> </span></td>
		
		</tr>

		<tr>
			<th colspan="1">Account Type: </th><td colspan="2"><?php echo $tbUAccountType; ?></td>
		</tr>
		<tr>
			<th rowspan="4">Uploaded Documents :- </th>  <hr>
		
		</tr>
         <tr>
            <th>Proof of address : </th>
			 <td>
				<a href="<?php echo Config::webURL . Config::storageDocument . $tbUPaddress; ?>" target="_blank" ><?php echo $tbUPaddress; ?></a>
				  
				
				
			</td>
		</tr>

         <tr>
		 <th>Proof of Identification : </th>
			 <td>
				<a href="<?php echo Config::webURL . Config::storageDocument . $tbUPidentification; ?>" target="_blank" ><?php echo $tbUPidentification; ?></a>
				
			</td>
			
		</tr>

         <tr>
		 <th>Proof of finance : </th>
			 <td>
				<a href="<?php echo Config::webURL . Config::storageDocument . $tbUPfinance; ?>" target="_blank" ><?php echo $tbUPfinance; ?></a>
			 
				
			</td>
	
	
		</tr>
	</table>
</div>



<?php } else { ?>






<div class="row">
	<div class="col-md-12">
		<div class="overview-wrap" style="margin-bottom: 40px;">
			<h2 class="title-1">Users</h2>
			<a href="index.php?cat=admin-module&subcat=add-users" class="content-link">
				<button class="au-btn au-btn-icon au-btn--blue">
				<i class="zmdi zmdi-plus"></i> Add New User</button>
			</a>
		</div>
	</div>
</div>

<?php
	$query = "SELECT * FROM ".Config::tbU." WHERE ".Config::tbUType."<:".Config::tbUType." ORDER BY ".Config::tbUUsername." ASC";

	$result = $db->Select( $query,	[
	Config::tbUType => 3
	] );
	if ( $result )
	{

	$i=1;
	foreach ( $result as $key => $data )
	{

	if($data[Config::tbUStatus] == ''){

	echo "<span style='color:red;'>* Please Change the Status to Active for New user(s)</span>";
	} 
	} } ?>
<div class="accordion" id="accordion">
	<div class="card" style="margin: unset;background-color: lightblue;">
	    <div class="card-header" id="#">
			<div class="container">
				<div class="row">
					<div class="col-md-1">
						SR.
					</div>
					<div class="col-md-2">
						Users
					</div>
					<div class="col-md-2">
						Date Joined
					</div>
					<div class="col-md-2">
						Status
					</div>
					<div class="col-md-2">
						Account Type
					</div>

					<div class="col-md-1">
						Pending transfer
					</div>
					
					<div class="col-md-1">
						Actions
					</div>
					<div class="col-md-1">
						Collapse
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php
		$query = "SELECT * FROM ".Config::tbU." WHERE ".Config::tbUType."<:".Config::tbUType." ORDER BY ".Config::tbUUsername." ASC";

		$result = $db->Select( $query,	[
											Config::tbUType => 3
										] );
		if ( $result )
		{

			$i=1;
			foreach ( $result as $key => $data )
			{
	?>
<div class="accordion" id="accordion<?php echo $data[Config::tbUUID]; ?>">
	<div class="card" style="margin: unset;">
	    <div class="card-header" id="heading<?php echo $data[Config::tbUUID]; ?>">
			<div class="container">
			  <div class="row">

			  	<div class="col-md-1">
			  		<?php echo $i; ?>
			  	</div>

			  	<div class="col-md-2">
			  		<span>
			  			<?php if($data[Config::tbUStatus] == '') { ?>
						<button type="button" class="btn btn-primary">
						<span class="badge bg-danger ms-2"> New </span>
						</button>
						<?php }
							else if ($data[Config::tbUStatus] != '')
							{
								echo '<?php echo $data[Config::tbUUsername]; ?> ';
							} 
						?>
						<?php echo $data[Config::tbUUsername]; ?>
					</span>
			  	</div>
			  	<div class="col-md-2">
			  		<?php echo $data[Config::tbUDatejoined]; ?>
			  	</div>

			  	<div class="col-md-2" id="value_status_<?php echo $data[Config::tbUUID]; ?>">
			  		<span style="color:<?php if($data[Config::tbUStatus] == 'Active') echo 'green'; else echo 'red'; ?>">   <?php echo $data[Config::tbUStatus]; ?> </span>
			  	</div>

				<div class="col-md-2" id="value_type_<?php echo $data[Config::tbUUID]; ?>">
			  		<?php echo $data[Config::tbUAccountType]; ?> 
			  	</div>

				<!--NEW PENDING TRANSFER-->	
			  	<div class="col-md-1" id="pending_value_<?php echo $data[Config::tbUUID]; ?>">
			  		<?php
			  			$query = "SELECT * FROM ".Config::tbT." WHERE ".Config::tbU."=:".Config::tbU. " ORDER BY ".Config::tbTUID." DESC LIMIT 1";

						$result2 = $db->Select( $query,	[
															Config::tbU => $data[Config::tbUUID]
														] );
						if ( $result2 )
						{
			  				echo $result2[0][Config::tbTPendingTransfer];
						}
						else
						{
							echo 'No Transfer made';
						}
			  		?>
			  	</div>
				  


			  	<div class="col-md-1">
			  		<a href="index.php?cat=admin-module&subcat=users&view=<?php echo $data[Config::tbUUID]; ?>" class="text-secondary content-link"><i class='fas fa-eye'></i></a>

					<a href="index.php?cat=admin-module&subcat=add-users&edit=<?php echo $data[Config::tbUUID]; ?>" class="text-success content-link"><i class=' far fa-edit'></i></a>

					<a href="javascript:void(0)" class="text-danger delete"  name="<?php echo Config::tbU; ?>" id="<?php echo $data[Config::tbUUID]; ?>"><i class='far fa-trash-alt'></i></a>
			  	</div>

			  	<div class="col-md-1">
			  		<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $data[Config::tbUUID]; ?>" aria-expanded="false" aria-controls="collapse<?php echo $data[Config::tbUUID]; ?>">
			          <i class='fas fa-angle-double-down'></i>
			        </button>
			  	</div>
			  </div>
			</div>
	    </div>

		<div id="collapse<?php echo $data[Config::tbUUID]; ?>" class="collapse" aria-labelledby="heading<?php echo $data[Config::tbUUID]; ?>" data-parent="#accordion<?php echo $data[Config::tbUUID]; ?>">
		    <div class="card-body">
		        



				<div class="container">

				   <div class="row mb-4">

				  		<div class="col-md-3">
				  			<label for="nf-email" class=" form-control-label">Action: </label>
				  		</div>
				  		<div class="col-md-9">
				  			<select class="form-control" id="action_status_<?php echo $data[Config::tbUUID]; ?>" >

								<option value="<?php echo $data[Config::tbUStatus]; ?>"> <?php echo$data[Config::tbUStatus]; ?> </option>
								<option  value="Active" >Active</option>
								<option  value="Stopped"  >Stopped</option>
								<option   value="Documents Required"  > Documents Required </option>
								<option  value="Suspended"  >Suspended</option>

							</select>	
							<script>

								document.addEventListener("DOMContentLoaded", function(event) {
								// var current = $('#action_status_<?php echo $data[Config::tbUUID]; ?>').val();
								$(document).on('change','#action_status_<?php echo $data[Config::tbUUID]; ?>',function(e) {
								e.preventDefault();

								var value = $(this).val();

								$.ajax( {
								method:"POST",
								url: "includes/scripts.inc.php?name=action_status&id=<?php echo $data[Config::tbUUID]; ?>&value="+value,
								data:'',
								processData: false,
								contentType: false,
								success: function(data){
								$('#value_status_<?php echo $data[Config::tbUUID]; ?>').html(value);
								}
								}); 
								});
								});

							</script>
				  		</div>

		  			</div>

				   <div class="row mb-4">
				  		<div class="col-md-3">
				  			<label for="nf-email" class=" form-control-label">Reason (Action): </label>
				  		</div>
				  		<div class="col-md-9">
				  			<a href="index.php?cat=admin-module&subcat=add-users&edit=<?php echo $data[Config::tbUUID]; ?>&action=reason" class="text-success content-link"><i class=' fa fa-plus'></i></a>
				  		</div>
		  			</div>

				   <div class="row mb-4">
				  		<div class="col-md-3">
				  			<label for="nf-email" class=" form-control-label">Activate: </label>
				  		</div>
				  		<div class="col-md-9">
				  			
							<?php
							if( $data[Config::tbUActivate] == 0 ) {
							?>
							<a href="javascript:void(0)" name="<?php echo Config::tbU; ?>" class=" text-success userActivate"  rel="<?php echo $data[Config::tbUUID]; ?>">
							<i class='fas fa-toggle-off fa-2x iconRole'></i>
							</a>
							<?php } else { ?>
							<a href="javascript:void(0)" name="<?php echo Config::tbU; ?>" class=" text-success userActivate"  rel="<?php echo $data[Config::tbUUID]; ?>">
							<i class='fas fa-toggle-on fa-2x iconRole'></i>
							</a>
							<?php } ?>

				  		</div>
		  			</div>
		  				<!--new pending transfer-->
		  			<div class="row mb-4">

				  		<div class="col-md-3">
				  			<label for="nf-email" class=" form-control-label">Authorize transfer: </label>
				  		</div>
				  		<div class="col-md-9">
				  			


				  			<?php
					  			$query = "SELECT * FROM ".Config::tbT." WHERE ".Config::tbU."=:".Config::tbU." ORDER BY ".Config::tbTUID." DESC LIMIT 1";

								$result2 = $db->Select( $query,	[
																	Config::tbU => $data[Config::tbUUID]
																] );
								if ( $result2 )
								{
									?>
										<a href="javascript:void(0)" name="<?php echo Config::tbT; ?>" class=" text-success transferApproval"  rel="<?php echo $result2[0][Config::tbTUID]; ?>" alt="1">
											<i class='fas fa-plus fa-2x'></i>
										</a>
										<a href="javascript:void(0)" name="<?php echo Config::tbT; ?>" class=" text-success transferApproval"  rel="<?php echo $result2[0][Config::tbTUID]; ?>" alt="2">
											<i class='fas fa-minus fa-2x'></i>
										</a>
			  				<?php
								}
								else
								{
									echo 'No Transfer made';
								}
					  		?>
					  		
				  		</div>
		  			</div>

		  	 <div class="row mb-4">

						<div class="col-md-3">
				  			<label for="nf-email" class=" form-control-label">Acount Type: </label>
				  		</div>
				  		<div class="col-md-9">

				<select class="form-control" id="action_account_<?php echo $data[Config::tbUUID]; ?>" >

					<option value="<?php echo $data[Config::tbUAccountType]; ?>"> <?php echo$data[Config::tbUAccountType]; ?> </option>
					<option  value="Personal"> Perosnal</option>
					<option  value="Business"> Business</option>
					<option   value="Non residential"> Non residential </option>
					<option  value="Corporate"> Corporate</option>

				</select>	
				<script type="text/javascript">

								document.addEventListener("DOMContentLoaded", function(event) {
								// var current = $('#action_account_<?php echo $data[Config::tbUUID]; ?>').val();
								$(document).on('change','#action_account_<?php echo $data[Config::tbUUID]; ?>',function(e) {
								e.preventDefault();

								var value = $(this).val();

								// console.log(1);
								$.ajax( {
								method:"POST",
								url: "includes/scripts.inc.php?name=action_account&id=<?php echo $data[Config::tbUUID]; ?>&value="+value,
								data:'',
								processData: false,
								contentType: false,
								success: function(data){
								$('#value_type_<?php echo $data[Config::tbUUID]; ?>').html(value);
								}
								}); 
								});
								});

							</script>
				  		</div>

		  			</div>

			  	</div>

					
			</div>



		</div>
	</div>
</div>
		<?php
		$i++;
		}
		}
		?>

<?php }  ?>