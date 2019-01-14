<?php

$hasSession=false;

if(!empty($_SESSION ['user']['id'])){
  $hasSession=true;
}

if($hasSession===false){
  $goto = $_SERVER['PHP_SELF'];
  header('Location: /login.php:goto='. $goto);
}
