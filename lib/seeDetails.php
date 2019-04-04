<html>
<head>
<title>Advertisement</title>
</head>
<h3> Ad Details </h3>

<!-- Display all ads -->
<table border=1>
	<tr><td>Ad Title</td>
	<td>Ad Content</td>
	<td>Ad Image</td>
	<td>Ad Price</td>
	</tr>



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

$sql = "SELECT ad_name, ad_content, ad_image, ad_price FROM ad_data";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td><a href=seedetails.php> " . $row["ad_name"]. "</a></td><td>" 
		. $row["ad_content"]. "</td><td>" 
		. $row["ad_price"]. " </td><td>
		<img src=data:image/jpg;base64,".base64_encode($row["ad_image"])."/></td>
		</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</table>

<a href="../index.php"><h3>Click here to go back</h3></a>

<body>
</body>
</html>