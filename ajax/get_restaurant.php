<?php
	if (isset($_POST["restaurant"])) {
		try {
			session_start();
			include_once('../classes/Resto.class.php');
			$r = new Resto();
			$check = $r->GetRestaurantDetails($_POST["restaurant"]);
			
			$_SESSION['currentRestaurantId'] = $_POST["restaurant"];

			foreach($check as $field)
            {
                $response["restaurant_name"] = $field['name'];
                $response["restaurant_street"] = $field['street'];
                $response["restaurant_number"] = $field['number'];
                $response["restaurant_city"] = $field['city'];
                $response["restaurant_id"] = $field['id'];
            }
		} catch (Exception $e) {
			$response["restaurant_name"] = $e->getMessage();
		}
			
			
			

		echo json_encode($response);
	}
?>