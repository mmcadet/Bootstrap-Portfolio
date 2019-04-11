<?php
        if($_POST['formSubmit'] == "Submit")
        {
          $varName = $_POST['formMovie'];
          $varEmail = $_POST['email'];
        }
      ?>
      <?php
if($errorMessage != "") 
{
  echo("<p>There was an error:</p>\n");
  echo("<ul>" . $errorMessage . "</ul>\n");
} 
else 
{
  $fs = fopen("mydata.csv","a");
  fwrite($fs,$varName . ", " . $varMovie . "\n");
  fclose($fs);

  header("Location: contact.html");
  exit;
}
?>


<form id="contact-form" action="contact.php" method="post">
        <ul>
          <li>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="John Smith" required="required">
          </li>
          <li>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="example@gmail.com" required="required">
          </li>
          <li>
            <label for="message">Message</label>
            <textarea id="message" name="message" required="required"></textarea>
          </li>
        </ul>
        <input type="submit" name="formSubmit" value="Submit">
      </form>












<?php
if($_POST['formSubmit'] == "Submit")
{
	$errorMessage = "";
	
	if(empty($_POST['formMovie']))
	{
		$errorMessage .= "<li>You forgot to enter a movie!</li>";
	}
	if(empty($_POST['formName']))
	{
		$errorMessage .= "<li>You forgot to enter a name!</li>";
	}
	
	$varMovie = $_POST['formMovie'];
	$varName = $_POST['formName'];

	if(empty($errorMessage)) 
	{
		$fs = fopen("mydata.csv","a");
		fwrite($fs,$varName . ", " . $varMovie . "\n");
		fclose($fs);
		
		header("Location: thankyou.html");
		exit;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>My Form</title>
</head>

<body>
	<?php
		if(!empty($errorMessage)) 
		{
			echo("<p>There was an error with your form:</p>\n");
			echo("<ul>" . $errorMessage . "</ul>\n");
		} 
	?>
	<form action="myform1.php" method="post">
		<p>
			What is your favorite movie?<br>
			<input type="text" name="formMovie" maxlength="50" value="<?=$varMovie;?>" />
		</p>
		<p>
			What is your name?<br>
			<input type="text" name="formName" maxlength="50" value="<?=$varName;?>" />
		</p>				
		<input type="submit" name="formSubmit" value="Submit" />
	</form>
</body>
</html>