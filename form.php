<?php
require_once(__DIR__.'/query_runner.php');

session_start();
$queryRunner = new QueryRunner();

$nameError = "";
$emailError = "";

if(!empty($_POST['submit']))
	{
		if(empty($_POST["name"]))
		{
			$nameError = "Name is required";
		}
		if(empty($_POST["email"]))
		{
			$emailError = "Email is required";
		}
	}	



if(isset($_POST["submit"]) && isset($_POST["email"]) && isset($_POST["name"])
        && isset($_POST["phone_number"]) && isset($_POST["surname"]) && isset($_POST["message"])) {
         
            $_SESSION["name"] = $_POST["name"];
            $_SESSION["surname"] = $_POST["surname"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["phone_number"] = $_POST["phone_number"];
            $_SESSION["message"] = $_POST["message"];

            $register_result = $queryRunner->cform();
          
        }
?>
<html>
<head>
<title>Contact Form</title>
<style>
* {
  box-sizing: 100px ;
   
}
h1 {
    text-align:center;
    color:firebrick;
    background-color: aquamarine;
    margin-left: 200px;
    margin-right: 200px;
    
}
form {
    text-align:center;
    background-color: aqua;
    margin-left: 300px;
    margin-right: 300px;
    margin-top: 50px;
    
}
input[type=submit] {
    background-color:firebrick;
    border-radius: 1px;
    color: black;
    
    margin: 30px;
    font-weight: bold;
    font-size: 40px;
    
}
</style>
</head>
<body>
<h1>Contact Form</h1>
<form method = "POST" action = "form.php">
Name: <br/> <input type = "text" name = "name" value = "<?php if(isset($_POST['name'])) echo $_POST['name'];?>">
<span style="color:red"><?php if(isset($nameError)) echo $nameError;?></span>
<br/>
<br/>
Surname: <br/> <input type = "text" name = "surname" value = "<?php if(isset($_POST['surname'])) echo $_POST['surname'];?>">
<br/>
<br/>
Email:<br/> <input type = "email" name = "email" value = "<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
<span style="color:red"><?php if(isset($emailError)) echo $emailError;?></span>
<br/>
<br/>
Phone number: <br/> <input type = "tel" name = "phone_number" pattern = "+[0-9]{3}-[0-9]{2}-[0-9]{6}" value ="<?php if(isset($_POST['phone_number'])) echo $_POST['phone_number'];?>">
<br/>
<br/>
Message: <br/> <textarea name = "message" rows = "5" cols = "30"><?php if(isset($_POST['message'])) echo $_POST['message'];?></textarea>
<br/>
<br/>
<input type = "submit" name = "submit" value = "Submit">


</form>
</body>
</html>

<?php

session_unset();
session_destroy();
?>