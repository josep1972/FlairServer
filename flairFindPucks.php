<?php

   // TODO: setup a database to find them?

   $data = '{
      "0": {"id": "id1", "name": "Family Room Puck"}, 
      "1": {"id": "id2", "name": "Bonus Room Puck"},
      "2": {"id": "id3", "name": "Office Puck"},
      "3": {"id": "id4", "name": "Mstr Bdrm Puck"}
   }';

   header("content-type: application/json");
   echo $data;

?>
