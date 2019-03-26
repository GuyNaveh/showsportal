<?php 

$str = '';
$text = "default text";
if (isset($_POST)) {
    
    include("connection.php");

    if ($_POST['data'] == 1) {
        $query = "SELECT u_id,email,firstname,lastname,area,phone,type FROM user";
        $str .= '<tr class="table-primary"><td>User ID</td><td>Email</td><td>First Name</td><td>Last Name</td><td>City</td><td>Phone Number</td><td>Admin</td></tr>';
        $result = $link->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC))   {
                $u_id = $row["u_id"];
                $email = $row["email"];
                $firstname = $row["firstname"];
                $lastname = $row["lastname"];
                $region_name = $row["area"];
                $phone = $row["phone"];
                $type = $row["type"];
                

                $str.= "<tr><td>$u_id</td><td>$email</td><td>$firstname</td><td>$lastname</td><td>$region_name</td><td>$phone</td><td>$type</td></tr>";        
            }
        }
    } else if ($_POST['data'] == 2) {
        $query = "SELECT DISTINCT * FROM locations";
//SELECT DISTINCT locations.code, locations.location_name,locations.city,regions.region_id,locations.street FROM shows,performance,locations,regions WHERE shows.location_id=locations.code AND regions.region_id = locations.region
        $str .= '<tr class="table-primary"><td>ID</td><td>Location</td><td>Region</td><td>City</td><td>Street</td>';
        $result = $link->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC))   {
                
                $location_id = $row["code"];
                $location_name = $row["location_name"];
                $region = $row["region"];
                $city = $row["city"];
                $street = $row["street"];
                $str.= "<tr><td>$location_id</td><td>$location_name</td><td>$region</td><td>$city</td><td>$street</td></tr>";
            }
        }
    } else if ($_POST['data'] == 3) {

        $query = "SELECT * FROM shows,performance,locations WHERE shows.performance_id=performance.performance_id AND shows.location_id=locations.code ";	
    	$str .= '<tr class="table-primary"><td>Show Name</td><td>Location</td><td>Price</td><td>Date</td><td>Time</td>';
        $result = $link->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC))   {
                $name = $row["name"];
                $location_id = $row["location_id"];
                $location_name = $row["location_name"];
                $price = $row["price"];
                $date = $row["date"];
                $time = $row["time"];
                $str.= "<tr><td>$name</td><td>$location_name</td><td>$price</td><td>$date</td><td>$time</td>";
            }
        }

    }
} 

$result->free();		// for select only!
$link->close();
?>

<table id="data" class="table table-bordered table-hover bg-light rounded"><?= $str; ?></table>