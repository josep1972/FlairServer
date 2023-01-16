<?php

   $token  = $_GET['token'];
   $ventId = $_GET['ventId'];
   $state  = $_GET['state'];

   $apiEndpoint = "https://api.flair.co";
   $url = $apiEndpoint."/api/vents/".$ventId;

   $percentOpen = 0;
   if($state == "open") {
      $percentOpen = 100;
   
   } 

   $data = '{"data": {"type": "vents", "attributes": { "percent-open": "'.$percentOpen.'" } } }';

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $token", "Content-type: application/json") );
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $result = curl_exec($ch);
   curl_close($ch);

   header("content-type: application/json");
   echo $result;

?>
