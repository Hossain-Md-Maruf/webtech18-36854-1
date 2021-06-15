<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
    <style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php
$name=$pass=$email=$uname=$cuPass=$rnewPass=$newPass=$rcpass=$rpass= $dd = $mm = $yyyy = $gender=$proName=$rname='';
$nameErr=$passErr=$emailErr=$cuPassErr=$rnewPassErr=$newPassErr=$rcpassErr=$rpass=$unameErr=$dobErr=$mmErr=$yyyyErr=$genderErr=$proNameErr=$misPassErr=$rnameErr=$rpassErr=''; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (preg_match("/^[0-9]/",$name)) {
      $nameErr = "Must start with a letter";
    }
    else if(!preg_match("/^[a-zA-Z-._ ?!]{2,}$/",$name))
    {
      $nameErr ="At least two words and only contain letters,dash";
    }
  }

  if (empty($_POST["pass"])) {
    $passErr = "Password is required";
  } else {
    $pass = test_input($_POST["pass"]);
    
    // check if name only contains letters and whitespace
   if(!preg_match("/^(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/",$pass))
    {
      $passErr ="Password must not be less than eight (8) characters and must contain at least one of the special characters (@, #, $,
      %)";
    }
  }
}

if(!isset($_POST["reset"]))
	{
		$rname='';
    $email='';
    $uname='';
    $rpass='';
    $rcpass='';	
    $gender='';
    $dd='';
    $mm='';
    $yyyy='';	
	}
  


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["cuPass"])) {
    $passErr = "Password is required";
  } else {
    $cuPass = test_input($_POST["cuPass"]);
    // check if name only contains letters and whitespace
   if(!preg_match("/^(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/",$cuPass))
    {
      $cuPassErr ="Password must not be less than eight (8) characters and must contain at least one of the special characters (@, #, $,
      %)";
    }
  }



//if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["newPass"])) {
    $newPassErr = "Password is required";
  } else {
    $newPass = test_input($_POST["newPass"]);
    //echo $newPass;
    //echo $cuPass;
    // check if name only contains letters and whitespace
   if(!preg_match("/^(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/",$newPass))
    {
      $newPassErr ="Password must not be less than eight (8) characters and must contain at least one of the special characters (@, #, $,
      %)";
    }
    if($newPass==$cuPass)
            {
              $newPassErr="New Password should not be same as the Current Password";
            }
          }
        

    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["rnewPass"])) {
        $rnewPassErr = "Password is required";
      } else {
        $rnewPass = test_input($_POST["rnewPass"]);
        // check if name only contains letters and whitespace
       if(!preg_match("/^(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/",$rnewPass))
        {
          $rnewPassErr ="Password must not be less than eight (8) characters and must contain at least one of the special characters (@, #, $,
          %)";
        }
        if($rnewPass!=$newPass)
            {
              $rnewPassErr="New Password must match with the Retyped Password";
            }
      }
    
        
       /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["rnewPass"])) {
            $rnewPassErr = "Password is required";
          } else {
            $rnewPass = test_input($_POST["rnewPass"]);
            // check if name only contains letters and whitespace
           if(!preg_match("/^(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/",$rnewPass))
            {
              $rnewPassErr ="Password must not be less than eight (8) characters and must contain at least one of the special characters (@, #, $,
              %)";
            }*/ 

      
}



/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["rpass"])) {
    $rpassErr = "Password is required";
  } else {
    $rpass = test_input($_POST["rpass"]);
    // check if name only contains letters and whitespace
   if(!preg_match("/^(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/",$rpass))
    {
      $rpassErr ="Password must not be less than eight (8) characters and must contain at least one of the special characters (@, #, $,
      %)";
    }
  }



//if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["rcpass"])) {
    $rcpassErr = "Password is required";
  } else {
    $rcpass = test_input($_POST["rcpass"]);
    //echo $newPass;
    //echo $cuPass;
    // check if name only contains letters and whitespace
   if(!preg_match("/^(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/",$rcpass))
    {
      $rcpassErr ="Password must not be less than eight (8) characters and must contain at least one of the special characters (@, #, $,
      %)";
    }
    if($rpass!=$rcpass)
            {
              $rcpassErr="password does not match";
            }
            }
          //}


*/





  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }?>
  
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="padding-top: 10px">
<fieldset style="width: 330px;">
<legend><b>LOGIN</b></legend>
User Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br>
  Password: <input type="password" name="pass" value="<?php echo $pass;?>">
  <span class="error">* <?php echo $passErr;?></span> <br>
  <input type="checkbox" name="check" id="check">
  <label for="">Remind Me</label>
  <hr style="border: 1px solid;color:#cccccc;">
  <input type="submit" name="submit" value="submit" style="width: 100px">
</fieldset>  
<br>
<fieldset style="width: 330px;">
<legend><b>CHANGE PASSWORD</b></legend>
Current Password:<input type="password" name="cuPass" value="<?php echo $cuPass;?>">
  <span class="error" style="display:inline">* <?php echo $cuPassErr;?></span>
  
  New Password:<input type="password" name="newPass" value="<?php echo $newPass;?>">
  <span class="error">* <?php echo $newPassErr;?></span>
  Retype New Password:<input type="password" name="rnewPass"  value="<?php echo $rnewPass;?>">
  <span class="error" style="display:inline;">* <?php echo $rnewPassErr;?></span>
  <hr style="border: 1px solid;color:#cccccc;">
  <input type="submit" name="submit1" value="submit" style="width: 100px">
  </form>
</fieldset>  
<br>
<fieldset style="width: 330px;">
<form action="upload.php" method="post" enctype="multipart/form-data">
<legend><b>PROFILE PICTURE</b></legend>
<input type="file" name="proName" id="proName" value="<?php echo $proName;?>">
  <span class="error">* <?php echo $proNameErr ?></span>
  <br>
  <hr style="border: 1px solid;color:#cccccc;">
  <input type="submit" name="submit2" value="submit" style="width: 100px">
  </form>
</fieldset>  
<br>
<form action="" style="padding-top: 10px">
<fieldset style="width: 300px;">
<legend><b>REGISTRATION</b></legend>
Name:<input type="text" name="rname" value="<?php echo $rname;?>">
  <span class="error">* <?php echo $rnameErr;?></span>
  <br>
  <hr style="border: 1px solid;color:#cccccc;">
  Email:<input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br>
  <hr style="border: 1px solid;color:#cccccc;">
  User Name:<input type="text" name="uname" value="<?php echo $uname;?>">
  <span class="error">* <?php echo $unameErr;?></span>
  <br>
  <hr style="border: 1px solid;color:#cccccc;">
  Password:<input type="password" name="rpass" value="<?php echo $rpass;?>">
  <span class="error">* <?php echo $rpassErr;?></span>
  <br>
  <hr style="border: 1px solid;color:#cccccc;">
  Confirm Password:<input type="password" name="rcpass" value="<?php echo $rcpass;?>">
  <span class="error">* <?php echo $rcpassErr;?></span>
  <br>
  <hr style="border: 1px solid;color:#cccccc;">
  <fieldset style="width: 300px;">
  <legend><b>GENDER </b></legend>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <span class="error">* <?php echo $genderErr; ?></span>
  <hr style="border: 0.1px solid;color:#cccccc;">
  <input type="submit" name="submit3" value="Submit" style="width: 100px">  
  </fieldset>
  <br>
  <fieldset style="width: 300px;">
  <legend><b>DATE OF BIRTH</b></legend>
  <table>
  <tr style="text-align: center;">
         <th style="font-weight: normal;"><label for="dd">dd</label></th>
         <th style="font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="mm">mm</label></th>
         <th style="font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="yyyy">yyyy</label></th>
         
  </tr>
  <tr>
  <td><input type="text" name="dd" style="width: 30px" value="<?php echo $dd;?>"></td>
  <td>&nbsp;&nbsp;/</td>
  <td><input type="text" name="mm" style="width: 30px;margin-left:-50%" value="<?php echo $mm;?>">
  &nbsp;&nbsp;/</td>
  <td><input type="text" name="yyyy" style="width: 30px;margin-left:-100%" value="<?php echo $yyyy;?>"></td>
  <td style="padding-left: 10px"><span class="error">*<?php echo $dobErr;?></span></td>
  </tr>
  </table>
  <hr style="border: 1px solid;color:#cccccc;">
  <input type="submit" name="submit4" value="submit" style="width:100px">
  </fieldset>
  <br>
  <input type="submit" name="submit5" value="submit" style="width: 100px">
  <input type="submit" name="reset" value="reset"style="width: 100px">
</fieldset>  

<br>
</form>


</body>
</html>