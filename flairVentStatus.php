<?php

   $token  = $_GET['token'];
   $ventId = $_GET['ventId'];

   $apiEndpoint = "https://api.flair.co";
   $url = $apiEndpoint."/api/vents/".$ventId;

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $token") );
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $result = curl_exec($ch);
   curl_close($ch);

   header("content-type: application/json");
   echo $result;

?>
