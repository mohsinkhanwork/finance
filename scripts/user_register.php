<?php
$set_username=$usernameErr=$set_password=$passwordErr=$set_email=$emailErr=$set_phone=$phoneErr=$set_address=$addressErr=$set_city=$cityErr=$set_state=$stateErr=$set_country=$countryErr=$set_account=$AccountErr='';

extract($_POST);

if (isset($reg)) 
{



        if(empty($username))
        {
          $usernameErr="Username is Required"; 
        }
        else{
          $usernameErr=true;
        }

        if(empty($password))
        {
          $passwordErr="passowrd is Required"; 
        }
        else{
          $passwordErr=true;
        }

        if(empty($email))
        {
          $emailErr="email is Required"; 
        }
        else{
          $emailErr=true;
        }

        if(empty($phone))
        {
          $phoneErr="phone is Required"; 
        }
        else{
          $phoneErr=true;
        }

        if(empty($address))
        {
          $addressErr="address is Required"; 
        }
        else{
          $addressErr=true;
        }

        if(empty($city))
        {
          $cityErr="city is Required"; 
        }
        else{
          $cityErr=true;
        }

        if(empty($state))
        {
          $stateErr="state is Required"; 
        }
        else{
          $stateErr=true;
        }

        if(empty($country))
        {
          $countryErr="country is Required"; 
        }
        else{
          $countryErr=true;
        } 
        if(empty($AccountType))
        {
          $AccountErr="Account Type is Required"; 
        }
        else{
          $AccountErr=true;
        }


if( $usernameErr==1 && $passwordErr==1 && $emailErr==1 && $phoneErr==1 && $addressErr==1 && $cityErr==1 && $stateErr==1 && $countryErr==1 && $AccountErr==1)

{
   //legal input values
        $username = legal_input($username);
        $password = legal_input(md5($password));
        $email = legal_input($email);
        $address = legal_input($address);
        $phone = legal_input($phone);
        $city = legal_input($city);
        $state = legal_input($state);
        $country = legal_input($country);
        $AccountType = legal_input($AccountType);

        $query = "SELECT ".Config::tbUEmail." FROM ".Config::tbU." WHERE ".Config::tbUEmail."=:".Config::tbUEmail."";
        $result = $db->Select($query, 
                          [ Config::tbUEmail => $email ]);

        if($result) {

          echo '<script> alert("Sorry..! Email is already registered, Try another"); document.location.href = "register.php"; </script>';
					return;
        }
         else {
                $query = "INSERT INTO ".Config::tbU." (".Config::tbUUsername.", ".Config::tbUPass.",".Config::tbUEmail.", ".Config::tbUAddress.",".Config::tbUPhone.",".Config::tbUCity.",".Config::tbUCountry.",".Config::tbUState.",".Config::tbUAccountType.")
                 VALUES (:".Config::tbUUsername.", :".Config::tbUPass.", :".Config::tbUEmail.", :".Config::tbUAddress.", :".Config::tbUPhone.", :".Config::tbUCity.", :".Config::tbUCountry.", :".Config::tbUState.", :".Config::tbUAccountType."  )";
                $result = $db->Insert($query, [
                                                  Config::tbUUsername => $username,
                                                  Config::tbUPass => $password,
                                                  Config::tbUEmail => $email,
                                                  Config::tbUAddress => $address,
                                                  Config::tbUPhone => $phone,
                                                  Config::tbUCity => $city,
                                                  Config::tbUState => $state,
                                                  Config::tbUCountry => $country,
                                                  Config::tbUAccountType => $AccountType
                                                ]);
                  if($result)
                  {
                    
                      echo '<script> document.location.href = "thanks.php"; </script>';
                      return;
                    
                  }                 
                    else
                    {
                    echo " check query";
                    return;
                    }
              }

                  
} 

}

// convert illegal input value to ligal value formate
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}

?>