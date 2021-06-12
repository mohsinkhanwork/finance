<?php include 'includes/autoload.inc.php'; 

    if( !isset($_SESSION) )
        session_start();

  



$username= !empty($_SESSION['username'])?$_SESSION['username']:'';
if(empty($username))
{
  echo '<script> document.location.href = "dashboard.php"; </script>';
  return;
  
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
<script src="js/sweetalert.min.js"></script>
<link href="css/setting.css" rel="stylesheet" type="text/css">

 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Finance Adm</title>

</head>
<body>
    
<div class="bs-example one">
    <nav class="navbar navbar-expand-md navbar-light">
        <a href="index.php?cat=admin-module&subcat=users" style="color:white;" class="navbar-brand"><?php echo Config::webTitle; ?></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php?cat=admin-module&subcat=users" style="color:white;" class="nav-item nav-link active">Home</a>
                <!-- <a href="#" class="nav-item nav-link">Profile</a>
                <a href="#" class="nav-item nav-link">Messages</a>
                <a href="#" class="nav-item nav-link disabled" tabindex="-1">Reports</a> -->
            </div>
            <div class="navbar-nav ml-auto">
                <a href="logout.php" style="color:white; padding:30px;" class="nav-item nav-link">Logout</a>
            </div>
        </div>
    </nav>
</div>
 

<div class="sidenav one ">
         <div class="login-main-text">
            <h2>Finance Administration<br> Settings</h2>
            <p>Account.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" >
                  <div class="form-group">
                     <label>Change Username: </label>
                     <input type="text" name="username" class="form-control" placeholder="Enter New Username">
                  </div>
                  <div class="form-group">
                     <label>Change Password:</label>
                     <input type="password"  name="password" class="form-control" placeholder="Enter New Password">
                  </div>
                 
                  <button type="submit" class="btn btn-secondary one" name="save">Save</button>
               </form>
            </div>
         </div>
      </div>
         
</body>
</html>

<?php

extract($_POST);
if (isset($save)) {

  
         $username = legal_input($username);
         $password = legal_input(md5($password));
 
            $query = "UPDATE ".Config::tbU." SET ".Config::tbUUsername."=:".Config::tbUUsername.", ".Config::tbUPass."=:".Config::tbUPass." WHERE ".Config::tbUUID."=".$_SESSION['uid']."";
                       
                $result = $db->Update($query, [
                                                        Config::tbUUsername => $username,
                                                        Config::tbUPass => $password,
                                                        ]);
            if($result)
            {
                ?>
                            <script>
                            swal({
                            title: "Successfull ",
                            text: "Changed Username and Psssword!",
                            icon: "success",
                            button: "Back!",
                            });
                            
                            </script>
                            <?php
                            return;
                
            }                 
                else
                {
                echo " check query...";
                return;
                }




 } 
 function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
  }

?>