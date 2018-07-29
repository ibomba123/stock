<?php
  require_once '../Model/Authorize.php';
  require_once '../utils/Util.php';
  session_start() ;
  $result = array();
  $cmd = Util::getStr($_REQUEST["cmd"]);

  if($cmd=="login")
  {
    $email = Util::getStr($_REQUEST["email"]);
    $password = Util::getStr($_REQUEST["password"]);
    $login = Authorize::login($email,$password) ;
    if($login!=null)
    {
      $result["result"] = 1 ;
      $_SESSION["user"] = $login;
    }
    else{
      $result["result"] = 0 ;
    }
  }
  else if($cmd=="logout")
  {
    $result["result"] = 1 ;
    $_SESSION["user"] = null ;
  }

  echo json_encode($result);
?>
