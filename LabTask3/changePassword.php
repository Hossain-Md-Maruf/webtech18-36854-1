<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.error {color: #FF0000;}
</style>
</head>
<body>
   <?php 
   $newPass=$rnewPass=$cuPass='';
   $newPassErr=$rnewPassErr=$cuPassErr='';
   if(isset($_POST["submit1"])){
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        
            
           
    
          
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;}
   
   ?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="padding-top: 10px">
<fieldset style="width: 360px;">
<legend><b>CHANGE PASSWORD</b></legend>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <p>Current Password:</p> <input type="password" name="cuPass" value="<?php echo $cuPass;?>">
  <span class="error" style="display:inline">* <?php echo $cuPassErr;?></span>
  
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <p style="color:green;">New Password:</p> <input type="password" name="newPass" value="<?php echo $newPass;?>">
  <span class="error">* <?php echo $newPassErr;?></span>
 <p style="color:red;">Retype New Password:</p> <input type="password" name="rnewPass"  value="<?php echo $rnewPass;?>">
  <span class="error" style="display:inline;">* <?php echo $rnewPassErr;?></span>
  <hr style="border: 1px solid;color:#cccccc;">
  <input type="submit" name="submit1" value="submit" style="width: 100px">
  </form>
</fieldset>  
<br>
</body>
</html>