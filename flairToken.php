<?php


   $myClientId = "";
   $mySecret = "";
   

   $apiEndpoint = "https://api.flair.co";
   $scope       = "scope=pucks.view+pucks.edit+structures.view+structures.edit+vents.view+vents.edit";
   $clientId    = "client_id=".$myClientId;
   $secret      = "client_secret=".$mySecret;
   $url         = $apiEndpoint."/oauth/token?".$clientId."&".$secret."&".$scope."&grant_type=client_credentials";
   $headers     = "--header 'content-type: application/x-www-form-urlencoded' ";

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $result = curl_exec($ch);
   $rc = curl_getinfo($ch, CURLINFO_HTTP_CODE);
   curl_close($ch);

   // http_response($rc);
   header("content-type: application/json");
   echo $result;

?>
