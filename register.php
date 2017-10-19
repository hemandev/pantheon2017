<?php

try {
    $servername = "localhost";
$username = "pantheon_user";
$password = "CRDzlSx12Uz}";
$dbname = "pantheon_db2017";
//Create
$conn = new mysqli($servername, $username, $password, $dbname);
//Check
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Yaaay";
    /*$dbh = new PDO("mysql:host=localhost:3306;dbname=pantheon_db2017", "pantheoncet", "4NHdDy52Hs6W");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
} catch (PDOException $e) {
	//header("location: http://yourexternalsupportforum.io");
    die('Failed to connect to database');
}


function NewUser()
{
	global $dbh;
	$name = trim($_POST['name']); //at a minimus clear whitespace.
    $email = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$college = trim($_POST['college']);
	$workshop = $_POST['Event'];
	$year = trim($_POST['year']);
	$accom = trim($_POST['accom']);
	$password =  trim($_POST['pass']);
	$options = [
	    'cost' => 12, //higher = more lower= less. you want it to take around 0.4 seconds for security reasons!
	];
	$password = password_hash($password, PASSWORD_BCRYPT, $options); // hashed password for storage!
	$stmt = $dbh->"INSERT INTO pantheon_db2017(name,email,phone,college,workshop,year,accom) VALUES (?,?,?,?,?,?,?)";
	$stmt->bindValue(1,$name,PDO::PARAM_STR);
	$stmt->bindValue(2,$email,PDO::PARAM_STR);
	$stmt->bindValue(3,$phone,PDO::PARAM_STR);
	$stmt->bindValue(4,$college,PDO::PARAM_STR);
	$stmt->bindValue(5,$workshop,PDO::PARAM_STR);
	$stmt->bindValue(6,$year,PDO::PARAM_STR);
	$stmt->bindValue(7,$year,PDO::PARAM_STR);
	if($stmt->execute())
	{
	echo "<script type='text/javascript'>alert(\"REGISTERED...\");</script>";
	}
}

function SignUp()
{
global $dbh;
if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$user = trim($_POST['user']);
	$pass = trim($_POST['pass']);
	$stmt = $dbh->prepare("SELECT * FROM pantheon_db2017 WHERE name = ?") ;
	$stmt->bindValue(1,$_POST['user'],PDO::PARAM_STR);
	$stmt->execute();
	$selected_row = $stmt->fetch(PDO::FETCH_ASSOC);
	if(!password_verify($pass, $selected_row['pass'])) // check password agaisnt stored hash
	{
		newuser();
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	}
}
}
if(isset($_POST['submit']))
{
	NewUser();
}
?>