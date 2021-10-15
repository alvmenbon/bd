<?php

$curl = curl_init();  //ABRE SESION cURL

curl_setopt_array($curl, [        //CONFIGURA OPCIONES ARRAY
	CURLOPT_URL => "https://car-data.p.rapidapi.com/cars?limit=10&page=0",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: car-data.p.rapidapi.com",
		"x-rapidapi-key: 0de0767cf1msh755ef23bd2eaa4fp1d6889jsn5b7a1b7648d7"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} //else {
	//echo $response;
//}


$resultados = json_decode($response, true);
$carIds = array_unique(array_column($resultados, 'id'));
$carMakes = array_unique(array_column($resultados, 'make'));
$carModels = array_unique(array_column($resultados, 'model'));
$carTypes = array_unique(array_column($resultados, 'type'));
$carYears = array_unique(array_column($resultados, 'year'));




//var_dump($resultados);


/*var_dump($carIds);
var_dump($carMakes);
var_dump($carModels);
var_dump($carTypes);
var_dump($carYears);*/


?>
