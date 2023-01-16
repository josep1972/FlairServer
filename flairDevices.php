<?php

   $token   = $_GET['token'];
   $verbose = $_GET['verbose'];

   $apiEndpoint = "https://api.flair.co";

   // vents
   $vents=getData($apiEndpoint."/api/vents", $token);
   $pucks=getData($apiEndpoint."/api/pucks", $token);

   if($verbose != "true") { 
      // minimized data
	  $pucks = minimizeData($pucks);
	  $vents = minimizeData($vents);
   }
   $finalResult = "{\"vents\":".$vents.",\"pucks\":".$pucks."}";

   header("content-type: application/json");
   echo $finalResult;

   /* FUNCTIONS */

   function getData($url, $token) { 
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $token") );
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $data = curl_exec($ch);
      curl_close($ch);

      return $data;
   }

   function minimizeData($jsonData) { 
	  $decoded_json = json_decode($jsonData,true);
      $retVal  = "[ ";
      foreach($decoded_json['data'] as $data) { 
         $retVal .= "{";
         $retVal .= "\"id\":\"".$data['id']."\",";
         $retVal .= "\"name\":\"".$data['attributes']['name']."\"";
         $retVal .= "},";
      }
      $retVal  = substr($retVal,0,-1);  // ignore last comma
      $retVal .= "]";
      
      return $retVal;
   }

?>
