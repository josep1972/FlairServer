<?php

   // TODO: setup a database to find them?

   $data = '{
      "0": {"id": "id1", "name": "Family Room Vent"}, 
      "1": {"id": "id2", "name": "Bonus Vent"},
      "2": {"id": "id3", "name": "Office Vent"},
      "3": {"id": "id5", "name": "Mstr Bdrm Vent"}
   }';

   header("content-type: application/json");
   echo $data;

?>
