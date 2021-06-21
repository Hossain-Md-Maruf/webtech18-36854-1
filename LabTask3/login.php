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
$name=$pass='';
$nameErr=$passErr=''; 

if(isset($_POST["submit"])){
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

 
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){

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
  &nbsp;Password:&nbsp;&nbsp;&nbsp;<input type="password" name="pass" value="<?php echo $pass;?>">
  <span class="error">* <?php echo $passErr;?></span> <br>
  <input type="checkbox" name="check" id="check">
  <label for="">Remind Me</label>
  <hr style="border: 1px solid;color:#cccccc;">
  <input type="submit" name="submit" value="submit" style="width: 100px">
</fieldset>  
<br>
</form>

</form>


</body>
</html>