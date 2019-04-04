<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$ad_name = $_POST["ad_name"];
	$ad_content = $_POST["ad_content"];
	$ad_img = $_FILES["ad_image"]["name"];
	$ad_price = $_POST["ad_price"];

	
	
	// Database Access
	$servername = 'localhost';
	$username = 'admin';
	$password = 'admin';
	$dbname = 'ad';


	//Get the content of the image and then add slashes to it 
	$imagetmp=addslashes (file_get_contents($_FILES['ad_image']['tmp_name']));
	
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	

	$sql = "INSERT INTO `ad_data`(`ad_name`, `ad_content`, `ad_image`, `ad_price`) VALUES ( '".$ad_name."', '".$ad_content."' ,'".$imagetmp."', ".$ad_price." );";
	if ($result = $conn->query($sql) == TRUE)
	{
		//successful
	}
	else
	{
		echo "Error: " . $conn->error;
	}
	
	
	
	//finally, send the success msg after all records are inserted
	if($result)
	{
		echo "Upload Successful!";
		$conn->close();
		header('Location: ../index.php');
	}
	
}
?>