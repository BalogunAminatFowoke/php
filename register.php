<?php
//quiz.html
if(isset($_POST['fullname']) && isset($_POST['email']))
{
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$host = "localhost";
$dbname = "app";
$dbuser = "app";
$password = "Swiftspee1";

////establish connection to database;

$conn = new mysqli($host,$dbuser,$password,$dbname); // host, dbuser,password,dbname 

if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	else
    {
    //check if user exist before
    $sql = "SELECT email FROM Users WHERE email = '$email' ";
	$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // user exist;
 		echo "User already exist...choose another email";
		} else {
 		 //end check
		$sql = "INSERT INTO Users (fullname, email) VALUES ('$fullname', '$email')";
		if ($conn->query($sql) === TRUE) {
 			 echo "New record created successfully";
        header("Location: https://app.treesidentifier.org.ng/quiz.html");
		exit();
			} else {
 			 echo "Error: " . $sql . "<br>" . $conn->error;
			}
}
    

	}

}

else
{
	die("All fields are required to get started");
}
?>