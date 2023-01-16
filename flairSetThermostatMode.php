<?php

   $token       = $_GET['token'];
   $structureId = $_GET['structureId'];
   $mode        = $_GET['mode'];

   $apiEndpoint = "https://api.flair.co";
   $url = $apiEndpoint."/api/structures/".$structureId;

   $data = '{"data": {"type": "structures", "attributes": { "structure-heat-cool-mode": "'.$mode.'" } } }';

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
