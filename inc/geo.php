<?php


// initiate curl and set options
$ipin = $_SERVER['REMOTE_ADDR']; // India //'58.2.255.255';
$ch = curl_init();
$ver = 'v1/';
$method = 'ipinfo/';
$apikey = '100.gxk9rexbja74huaj7uhk';  
$secret = 'u5WV39eU';  
$timestamp = gmdate('U'); // 1200603038
// echo $timestamp;   
$sig = md5($apikey . $secret . $timestamp);
$service = 'http://api.quova.com/';
curl_setopt($ch, CURLOPT_URL, $service . $ver. $method. $ipin . '?apikey=' .
             $apikey . '&sig='.$sig . '&format=xml');
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
$headers = curl_getinfo($ch);

// close curl
curl_close($ch);

// return XML data
if ($headers['http_code'] != '200') {
   echo "An error has occurred accessing this IP";
  return false;
} else {
   //print_r ($data);
}

//gettype($data);
$data = simplexml_load_string($data);
print_r ($data);

echo $data->Location->CountryData->country . ' : country <br>'; //united states
echo $data->Location->CityData->city . ' : city <br>';  // san francisco

echo 'lat' . $data->Location->latitude . ' <br>'; 
echo 'long' . $data->Location->longitude . '<br>'; 


function distance($lat1, $lon1, $lat2, $lon2, $unit) { 

  $theta = $lon1 - $lon2; 
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
  $dist = acos($dist); 
  $dist = rad2deg($dist); 
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344); 
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

// 256 sutter st
// lat 37.789756 long -122.404792
//echo distance(37.789756, -122.404792, 29.46786, -98.53506, "m") . " miles<br>";


echo '<br>' . distance(37.789756, -122.404792, 20, 77, 'm') . " miles<br>";


?>