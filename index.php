<html>
<head>
<title>Ads</title>
</head>

<h3>Advertisement Portal</h3>

<form action="lib/upload.php" method="post" enctype="multipart/form-data">
	Enter Ad name: <input type="text" name="ad_name"></input><br><br>
	Enter Content of Ad: <input type="text" name="ad_content"></input><br><br>
	Upload image of Ad: <input type="file" name="ad_image" accept="image/*"><br><br>
	Offer price: <input type="text" name="ad_price"></input><br><br>
	<input type="submit" name="submit" value="Submit">
</form>


<h4>List of all available ads</h4>
<!-- Display all ads -->

<table border=1>
	<tr><td>Ad Title</td>
	<td>Ad Image</td>
	</tr>

<!-- retrive Ad Name & Ad Image of all present ads from mySQL database-->
<?php

$servername = 'localhost';
$username = 'admin';
$password = 'admin';
$dbname = 'ad';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ad_name, ad_image FROM ad_data";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td><a href=seeDetails.php> " . $row["ad_name"]. "</a></td><td>
		<img src=data:image/jpg;base64,".base64_encode($row["ad_image"])."/></td>
		</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</table>
Click on Ad Title to see details
<body>
</body>
</html>