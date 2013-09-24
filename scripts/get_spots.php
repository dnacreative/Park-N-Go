<?php 
	require("connections.php");
	
	// PAID PARKING QUERY AND ARRAY BUILDING
	
	$query_get_markers = "SELECT id, address, lat, lng, rate, rate_half_hour, carpark_type_str, capacity, payment_methods FROM parking_tbl";
	
	$result_get_markers = mysqli_query($spot, $query_get_markers);
	
	$pins = array();
	
	while($pSpots=mysqli_fetch_assoc($result_get_markers)){
		$id = $pSpots["id"];
		$address = $pSpots["address"];
		$lat = $pSpots["lat"];
		$lng = $pSpots["lng"];
		$rateHalf = $pSpots["rate_half_hour"];
		$rateDay = $pSpots["rate"];
		$type = $pSpots["carpark_type_str"];
		$cap = $pSpots["capacity"];
		$payment = $pSpots["payment_methods"];
		$pin = array("ID" => $id, "Address" => $address, "Lat" => $lat,"Long" => $lng, "Rate30" => $rateHalf, "RateDay" => $rateDay, "Type" => $type, "Capacity" => $cap, "Methods" => $payment);
						
		array_push($pins, $pin);
	}
	
	
	$jsonArray = array ("Pins" => $pins);
	
	echo json_encode($jsonArray);

?>