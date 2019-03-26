<?php
	session_start();

	$placeName = $_POST['placeName'];									
	$region = $_POST['region'];							
	$city = $_POST['location'];							
	$street = $_POST['street'];							
	$parking = $_POST['parking'];							
	$publictrans = $_POST['publictrans'];							
	$hangout = $_POST['hangout'];							
	$restaurants = $_POST['restaurants'];							
	$seatquality = $_POST['seatquality'];

	include("connection.php");
	$getregionquery = "SELECT region_id FROM regions WHERE region_name = '$city'";
	$result = mysqli_query($link, $getregionquery);
	while ($row = $result->fetch_array(MYSQLI_ASSOC))   {
                
		$region_id = $row['region_id'];
	}

//	$addData = "INSERT INTO locations (location_name,region,city,street,parking,publictrans,hangout,restaurants,seatquality) VALUES ("$placeName",9,"$city",'$street',$parking,$publictrans,$hangout,$restaurants,$seatquality)";

    $addData = "INSERT INTO locations (location_name, region, city, street, parking, publictrans,hangout, restaurants, seatquality) VALUES 
	('".mysqli_real_escape_string($link, $_POST['placeName'])."',
	'".mysqli_real_escape_string($link, $region_id)."',
    '".mysqli_real_escape_string($link, $_POST['location'])."',
    '".mysqli_real_escape_string($link, $_POST['street'])."',
    '".mysqli_real_escape_string($link, $_POST['parking'])."',
    '".mysqli_real_escape_string($link, $_POST['publictrans'])."',
	'".mysqli_real_escape_string($link, $_POST['hangout'])."',
	'".mysqli_real_escape_string($link, $_POST['restaurants'])."',
    '".mysqli_real_escape_string($link, $_POST['seatquality'])."')"; 

    if (!mysqli_query($link, $addData)) {

        echo("Error description: " . mysqli_error($link));
        $error = "<p> Could not sign you up - please try again later.</p>";

    } else {
        

        mysqli_query($link, $query);

    }
?>
