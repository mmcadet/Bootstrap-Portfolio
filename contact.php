 <?php 
        // if($_POST['formSubmit'] == "Submit")
        // {
        //   $varName = $_POST['formMovie'];
        //   $varEmail = $_POST['email'];
        // }
    ?>
      <?php
// if($errorMessage != "") 
// {
//   echo("<p>There was an error:</p>\n");
//   echo("<ul>" . $errorMessage . "</ul>\n");
// } 
// else 
// {
//   $fs = fopen("mydata.csv","a");
//   fwrite($fs,$varName . ", " . $varName2 . "\n");
//   fclose($fs);

//   header("Location: contact.html");
//   exit;
// }
// ?> 


<?php
if($_POST['formSubmit'] == "Submit")
{
	$errorMessage = "";
	
	if(empty($_POST['formName']))
	{
		$errorMessage .= "<li>Please enter name</li>";
	}
	if(empty($_POST['formEmail']))
	{
		$errorMessage .= "<li>Please enter email</li>";
	}
	if(empty($_POST['formMessage']))
	{
		$errorMessage .= "<li>Please enter your message</li>";
	}
	
	$varName = $_POST['formName'];
	$varEmail = $_POST['formEmail'];
	$varMessage = $_POST['formMessage'];

	if(empty($errorMessage)) 
	{
		$fs = fopen("mydata.csv","a");
		fwrite($fs,$varName . ", " . $varEmail . ", " . $varMessage . "\n");
		fclose($fs);
		
		header("Location: contact.html");
		exit;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact</title>
</head>

<body>
	<?php
		if(!empty($errorMessage)) 
		{
			echo("<p>There was an error with your form:</p>\n");
			echo("<ul>" . $errorMessage . "</ul>\n");
		} 
	?>
	<!-- <form action="contact.php" method="post"> -->
		<!-- <p>
			What is your favorite movie?<br>
			<input type="text" name="formMovie" maxlength="50" value="<?=$varName2;?>" />
		</p>
		<p>
			What is your name?<br>
			<input type="text" name="formName" maxlength="50" value="<?=$varName;?>" />
		</p>				
		<input type="submit" name="formSubmit" value="Submit" />
	</form> -->

	<form id="contact-form" action="contact.php" method="post">
        <ul>
          <li>
            <label for="name">Name</label>
            <input type="text" id="name" name="formName" placeholder="John Smith" required="required" maxlength="50" value="<?=$varName;?>"/>
          </li>
          <li>
            <label for="email">Email</label>
            <input type="email" id="email" name="formEmail" placeholder="example@gmail.com" required="required" maxlength="50" value="<?=$varEmail;?>"/>
          </li>
          <li>
            <label for="message">Message</label>
            <textarea id="message" name="formMessage" required="required" value="<?=$varMessage;?>"></textarea>
          </li>
        </ul>
        <input type="submit" name="formSubmit" value="Submit">
      </form>


</body>
</html>