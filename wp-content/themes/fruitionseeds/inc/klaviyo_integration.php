<?php

//
// registerUsersToNewsletter
//
function registerUsersToNewsletter($email, $firstname = '', $lastname = ''){

	$curl = curl_init();

	curl_setopt_array($curl, [
	  CURLOPT_URL => "https://a.klaviyo.com/api/v2/list/XHSH4g/subscribe?api_key=pk_4e1b5724d44b64449e1cedb66087e43360",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "{\"profiles\":[{\"email\":\"" . $email . "\",\"first_name\":\"" . $firstname . "\",\"last_name\":\"" . $lastname . "\"}]}",
	  CURLOPT_HTTPHEADER => [
	    "Accept: application/json",
	    "Content-Type: application/json"
	  ],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}

}

//
// updateUserCoursesInKlaviyo
//
function updateUserCoursesInKlaviyo($email, $courses){

	$curl = curl_init();

	$object = '{
    "token": "S2jhaG",
    "properties": {
      "$email": "'.$email.'",
      "$courses": "'.$courses.'"
    }
	}';

	curl_setopt_array($curl, [
	  CURLOPT_URL => "https://a.klaviyo.com/api/identify?data=" . base64_encode($object). "&",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => [
	    "Accept: text/html"
	  ],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	// if ($err) {
	//   //echo "Error #: " . $err;
	// } else {
	//   //echo "Success: " . $response;
	// }
}

?>
