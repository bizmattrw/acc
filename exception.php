<?php


try {
  throw new Exception("Devision by zero");
    $divident=5;
    $diviser=2;
 
    echo $divident/$diviser;
    
} catch(Exception $e) {
  echo "Unable to divide.";

}

?>