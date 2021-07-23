<?php
  session_start();
  if(!empty($_SESSION) and array_key_exists('user_id', $_SESSION)){
    $is_logged_in =1;
    $name = $_SESSION['name'];
    $name_arr = explode(' ', $name);
  }else{
    $is_logged_in =0;
  }
?>