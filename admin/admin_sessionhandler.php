<?php
  session_start();
  if(!empty($_SESSION) and array_key_exists('admin_user_id', $_SESSION)){
    $is_admin_logged_in =1;
    //$name = $_SESSION['name'];
    //$name_arr = explode(' ', $name);
  }else{
    $is_admin_logged_in =0;
    //header('Location:index.php');
    //exit();
  }
?>