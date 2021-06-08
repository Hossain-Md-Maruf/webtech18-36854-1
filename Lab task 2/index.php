<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bgErr ="";
$name = $email = $dd = $mm = $yyyy = $gender = $degree= $bg="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (preg_match("/^[0-9]/",$name)) {
      $nameErr = "Must start with a letter";
    }
    else if(!preg_match("/^[a-zA-Z-. ?!]{2,}$/",$name))
    {
      $nameErr ="At least two words and only contain letters,dash";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format. Format: example@anything.com";
      
    }
    if(empty($_POST["dd"]) or empty($_POST["mm"]) or empty($_POST["yyyy"])){
      $dobErr="Full Date of birth input is requied";
      $dd = test_input($_POST["dd"]);
      $mm = test_input($_POST["mm"]);
      $yyyy = test_input($_POST["yyyy"]);
  
    }
    else
    {
      $dd = test_input($_POST["dd"]);
      $mm = test_input($_POST["mm"]);
      $yyyy = test_input($_POST["yyyy"]);
  
      if( !filter_var($dd,FILTER_VALIDATE_INT,array('options' => array(
              'min_range' => 1, 
              'max_range' => 31
          )))|!filter_var($mm,FILTER_VALIDATE_INT,array('options' => array(
              'min_range' => 1, 
              'max_range' => 12
          )))|!filter_var($yyyy,FILTER_VALIDATE_INT,array('options' => array(
              'min_range' => 1953, 
              'max_range' => 1998
          ))))
        {$dobErr="Must be valid numbers(dd:1-31,mm: 1-12,yyyy: 1953-1998)";}
    }
  }
    
 

  if(!isset($_POST["gender"]))
	{
		$genderErr="At least one of them must be selected";
	}


	if(!isset($_POST["degree"]))
	{
		$degreeErr="Must be selected";		
	}
	else if (sizeof($_POST["degree"])<2)
	{
		$degreeErr="At least two must be selected";
	}

	if(!isset($_POST["bg"]))
	{
		$bgErr="Must be selected";
	}
	else
	{
		if($_POST["bg"]=="blank")
		{
			$bgErr="Must be selected";
		}
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="padding-top: 10px">
<fieldset style="width: 300px;">
<legend><b>NAME</b></legend>
<input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br>
  <hr style="border: 1px solid;color:#cccccc;">
  <input type="submit" name="submit" value="submit" style="width: 100px">
</fieldset>  
<br>
  
  <fieldset style="width: 300px;">
  <legend>EMAIL</legend>
  <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br>
  <hr style="border: 1px solid;color:#cccccc;">
  <input type="submit" name="submit1" value="submit" style="width: 100px">
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
  <input type="submit" name="submit2" value="submit" style="width:100px">
  </fieldset>
  <br>
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
  <fieldset style="width: 300px">
  <legend><b>DEGREE </b></legend>
  <input type="checkbox" id="degree" name="degree[]" value="ssc"> 
  <label for="">SSC</label>
  <input type="checkbox" id="degree" name="degree[]" value="hsc"> 
  <label for="">HSC</label>
  <input type="checkbox" id="degree" name="degree[]" value="bsc">
  <label for="">BSc</label>
  <input type="checkbox" id="degree" name="degree[]" value="msc">
  <label for="">MSc</label>
  <span class="error">* <?php echo $degreeErr;?></span>
  <hr style="border:0.1px solid;color:#cccccc;">
  <input type="submit" name="submit4" value="submit" style="width: 100px"> 


  </fieldset>
  <br>
<fieldset style="width: 300px">
<legend><b>BLOOD GROUP</b></legend>
<select name="bg" id="bg">
<option value="blank"></option>
<option value="A+">A+</option>
<option value="A-">A-</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
<option value="B+">B+</option>
<option value="B-">B-</option>
<option value="O+">O+</option>
<option value="O-">O-</option>
</select>
<span class="error">* <?php echo $bgErr;?></span>
<hr style="border: 1px solid;color:#cccccc;">
<input type="submit" name="submit5" value="submit" style="width: 100px"> 
</fieldset>  
  
</form>



</body>
</html>