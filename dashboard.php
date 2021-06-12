<?php include 'includes/autoload.inc.php'; ?>
<?php
	$username = !empty( $_SESSION['username'] ) ? $_SESSION['username'] : '';
	
	if( empty( $username ) )
	{
		echo '<script>  document.location.href = "login.php"; </script>';
        return;
		
	}

	$cat = !empty( $_GET['cat'] ) ? $_GET['cat'] : '';
    $subcat = !empty( $_GET['subcat'] ) ? $_GET['subcat'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>


<script src="js/sweetalert.min.js"></script>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="au theme template">
	<meta name="author" content="Hau Nguyen">
	<meta name="keywords" content="au theme template">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Title Page-->
	<title><?php echo Config::webTitle; ?> - Dashboard</title>

	<!-- Fontfaces CSS-->
	<link href="css/font-face.css" rel="stylesheet" media="all">
	<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
	<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
	

	<!-- Bootstrap CSS-->
	<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
	<link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
	<link href="vendor/wow/animate.css" rel="stylesheet" media="all">
	<link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
	<link href="vendor/slick/slick.css" rel="stylesheet" media="all">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<link href="css/theme.css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="styles.css" />
   <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
 </head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



 <style type="text/css">








 
</style>
 <body>
 
 </body>
</html>

</head>

<body class="animsition">
	<div class="page-wrapper">

		<?php // include 'nav.php'; ?>

		<!-- PAGE CONTAINER-->
		<!-- <div class="page-container"> -->

			<?php include 'header.php'; ?>

			<!-- MAIN CONTENT-->
			<div style="background-image: url('css images/bg.jpg');">

				<div class="main-content" >
					<div class="section__content section__content--p30">
						<div class="container-fluid" style="background-color: rgb(255 255 255 / 80%);box-shadow: 0 0 10px 3px #000000;padding: 15px; margin-bottom: 20px;">
	                        
							<div id="confirmBox">
							<p>Are You Sure to Delete ?</p>
							<button value="1" >Yes</button><button value="0">No</button>
							</div>
	                        
							<div id="alertBox"></div>

							<?php include 'main.php'; ?>
							

						</div>
					</div>
				</div>
<?php include 'footer.php'; ?>
			</div>
			<!-- END MAIN CONTENT-->
			<!-- END PAGE CONTAINER-->
		<!-- </div> -->


	</div>

	<!-- Jquery JS-->
	<script src="vendor/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JS-->
	<script src="vendor/bootstrap-4.1/popper.min.js"></script>
	<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
	<!-- Vendor JS	   -->
	<script src="vendor/slick/slick.min.js">
	</script>
	<script src="vendor/wow/wow.min.js"></script>
	<script src="vendor/animsition/animsition.min.js"></script>
	<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
	</script>
	<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendor/counter-up/jquery.counterup.min.js">
	</script>
	<script src="vendor/circle-progress/circle-progress.min.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="vendor/chartjs/Chart.bundle.min.js"></script>
	<script src="vendor/select2/select2.min.js">
	</script>

	<!-- Main JS-->
	<script src="js/main.js"></script>
	
	<!-- Custom JS-->
	<script src="scripts/ajax.js"></script>

</body>

<script>
	function getIp(callback) {
 fetch('https://ipinfo.io/json?token=954cd44cb0c145', { headers: { 'Accept': 'application/json' }})
   .then((resp) => resp.json())
   .catch(() => {
     return {
       country: 'us',
     };
   })
   .then((resp) => callback(resp.country));
}
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
	initialCountry: "auto",
 	geoIpLookup: getIp,

     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });


const info = document.querySelector(".alert-info");

function process(event) {
 event.preventDefault();

 const phoneNumber = phoneInput.getNumber();

 info.style.display = "";
 info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
}
 </script>

</html>
<!-- end document-->
