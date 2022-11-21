<?php
     $num = 0;
     try {
         echo 1/$num;

     } catch (Exception $e){
         echo $e->getMessage();
     }
 ?>