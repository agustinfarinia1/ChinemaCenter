<?php
  if(!$_SESSION["loggedUser"]->getRol() == 1)
    header("Location: " . FRONT_ROOT ); 
?>