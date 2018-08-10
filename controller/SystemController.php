<?php
  require_once '../Model/System.php';
  require_once '../utils/Util.php';
  $result = array();
  $result["success"] = 0 ;
  $cmd = Util::getStr($_REQUEST["cmd"]);
  if($cmd=="add")
  {
    $obj = array();
    $obj["name"] = Util::getStr($_REQUEST["name"]);
    if(System::add($obj)){
      $result["success"] = 1 ;
    }
  }
  else if($cmd=="update")
  {
    $obj = array();
    $obj["id_system"] = Util::getInt($_REQUEST["id_system"]);
    $obj["name"] = Util::getStr($_REQUEST["name"]);
    if(System::update($obj)){
      $result["success"] = 1 ;
    }
  }
  else if($cmd=="delete")
  {
    $obj = array();
    $obj["id_system"] = Util::getInt($_REQUEST["id_system"]);
    if(System::delete($obj)){
      $result["success"] = 1 ;
    }
  }

  echo json_encode($result);
?>
