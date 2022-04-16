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
$optionErr = "";
 $option = "";


  if (empty($_POST["option"])) {
    $optionErr = "Gender is required";
  } else {
    $option = test_input($_POST["option"]);
  }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  

  <input type="radio" name="option" <?php if (isset($option) && $option=="feedback") echo "checked";?> value="feedback">Feedback
  <input type="radio" name="option" <?php if (isset($option) && $option=="solution") echo "checked";?> value="solution">Solution
  <input type="radio" name="option" <?php if (isset($option) && $option=="problem") echo "checked";?> value="problem">Problem  
  <span class="error">* <?php echo $optionErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo $option;
?>

</body>
</html>