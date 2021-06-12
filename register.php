<?php session_start(); ?>

<?php include 'includes/autoload.inc.php'; ?>

<?php include('scripts/user_register.php'); ?>


<?php


$username= !empty($_SESSION['username'])?$_SESSION['username']:'';

if(!empty($username))
{
  echo '<script> document.location.href = "dashboard.php"; </script>';
  return;
  
}

//include('config/database.php');
// include('user_register.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo Config::webTitle; ?> - UAC Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--bootstrap4 library linked-->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<style type="text/css">


body {
    background: #1bbcef;
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzFiYmNlZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjIwJSIgc3RvcC1jb2xvcj0iIzIzYjBlNiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjcwJSIgc3RvcC1jb2xvcj0iIzBiNjdiMiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMxNjQ4ODMiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
    background: -moz-linear-gradient(top, #1bbcef 0%, #23b0e6 20%, #0b67b2 70%, #164883 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #1bbcef), color-stop(20%, #23b0e6), color-stop(70%, #0b67b2), color-stop(100%, #164883));
    background: -webkit-linear-gradient(top, #1bbcef 0%, #23b0e6 20%, #0b67b2 70%, #164883 100%);
    background: -o-linear-gradient(top, #1bbcef 0%, #23b0e6 20%, #0b67b2 70%, #164883 100%);
    background: -ms-linear-gradient(top, #1bbcef 0%, #23b0e6 20%, #0b67b2 70%, #164883 100%);
    background: linear-gradient(to bottom, #1bbcef 0%, #23b0e6 20%, #0b67b2 70%, #164883 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#1bbcef', endColorstr='#164883', GradientType=0);

}

.form-box {
    width: 50%;
    margin: auto;
    padding-top:20px;
}

.form-box h1 {
    text-align: center;
    font-weight: bold;
    text-transform: uppercase;
    color: tomato;
}
.err-msg{
      color:red;
    }
.form-box h1 span {
    font-weight: lighter;
}
.link {
    color:white;
}

</style>
</head>

<div class="container">
	<div class="row">
		<div class="form-box">
        <h1><span>Registration</span> Form</h1>
     <br />
     <a type="submit" href="login.php" class="link">Already have an account? Click Here to Login!</a>
     
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 

   <div class="form-group">

                <div id="nameError" class="alert" role="alert"></div>
                <label for="form-name-field" class="sr-only">Name</label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="text" name="username" class="form-control" value="<?php echo $set_username; ?>" placeholder="Enter your Name">
                    </div>
                    <p class="err-msg">
                        <?php if($usernameErr!=1){ echo $usernameErr; } ?>
                    </p>
      </div>


      <div class="form-group">
                <div id="nameError" class="alert" role="alert"></div>
                <label for="form-name-field" class="sr-only">Password: </label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-certificate"></span></div>
                        <input type="password" name="password" class="form-control" value="<?php echo $set_password; ?>" placeholder="Enter your password">                
                    </div>
                    <p class="err-msg">
                        <?php if($passwordErr!=1){ echo $passwordErr; } ?>
                        </p>
      </div>

		<div class="form-group">
                <div id="emailError" class="alert" role="alert"></div>
                <label for="form-email-field" class="sr-only">Email: </label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                        <input type="email" name="email" class="form-control" value="<?php echo $set_email; ?>" placeholder="Enter your email">  
                    </div>
                    <p class="err-msg">
                        <?php if($emailErr!=1){ echo $emailErr; } ?>
                        </p>

        </div>

     <div class="form-group">
                <div id="phoneError" class="alert" role="alert"></div>
                <label for="form-phone-field" class="sr-only">Phone: (with country code)</label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></div>
                        <input type="number" name="phone" class="form-control" value="<?php echo $set_phone; ?>" placeholder="Please Enter your Phone Number">
                    </div>
                    <p class="err-msg">
                        <?php if($phoneErr!=1){ echo $phoneErr; } ?>
                        </p>
     </div>

      <div class="form-group">
                <div id="nameError" class="alert" role="alert"></div>
                <label for="form-name-field" class="sr-only">Address: </label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></div>
                        <input type="text" name="address" class="form-control" value="<?php echo $set_address; ?>" placeholder="Enter your address">                      
                    </div>
                    <p class="err-msg">
                <?php if($addressErr!=1){ echo $addressErr; } ?>
                </p>
      </div>
			<div class="form-group">
                <div id="nameError" class="alert" role="alert"></div>
                <label for="form-name-field" class="sr-only">City: </label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></div>
                        <input type="text" name="city" class="form-control" value="<?php echo $set_city; ?>" placeholder="Enter your City">

                    </div>
                    <p class="err-msg">
                        <?php if($cityErr!=1){ echo $cityErr; } ?>
                        </p>
      </div>

      <div class="form-group">
                <div id="nameError" class="alert" role="alert"></div>
                <label for="form-name-field" class="sr-only">State: </label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></div>
                        <input type="text" name="state" class="form-control" value="<?php echo $set_state; ?>" placeholder="Enter your state">
                    </div>
                    <p class="err-msg">
                        <?php if($stateErr!=1){ echo $stateErr; } ?>
                        </p>
      </div>

      <div class="form-group">
                <div id="nameError" class="alert" role="alert"></div>
                <label for="form-name-field" class="sr-only">Country: </label>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></div>
                        <input type="text" name="country" class="form-control" value="<?php echo $set_country; ?>" placeholder="Enter your country">
                    </div>
                    <p class="err-msg">
                        <?php if($countryErr!=1){ echo $countryErr; } ?>
                        </p>
      </div>

       <div class="form-group">
                <div id="nameError" class="alert" role="alert"></div>

                        <select class="form-control" name="AccountType" value="<?php echo $set_account; ?>">


                            <option  name="">Please select your account type</option>
                            <option  name="Personal" value="Personal"> Perosnal</option>
                            <option  name="Business" value="Business"> Business</option>
                            <option  name="Non residential" value="Non residential"> Non residential </option>
                            <option  name="Corporate" value="Corporate"> Corporate</option>

                        </select>

                        <p class="err-msg">
                        <?php if($AccountErr!=1){ echo $AccountErr; } ?>
                        </p>
      </div>


<br />
      <button type="submit" style="margin-bottom:10%;" class="btn btn-default" name="reg" >Submit</button>
		</form>
      
    </div>
   </div>
   <div class="col-sm-4">
   </div>
 </div>
</div>
</body>
</html>