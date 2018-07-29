<?php
  require_once 'DBManager.php';
  class Authorize{
    public static function login($email,$password)
    {
      $result = null ;
      $sql = "select * from aot_user where email = ? and password = ?";
      try {
        $db = DBManager::getConnection();
        $stmn = $db->prepare($sql);
        $stmn->bindParam(1,$email,PDO::PARAM_STR);
        $stmn->bindParam(2,$password,PDO::PARAM_STR);
        $stmn->execute();
        if($row=$stmn->fetch(PDO::FETCH_ASSOC))
        {
          $result = $row ;
        }
      } catch (PDOException $e) {
        print_r($e);
      }
      return $result ;
    }


  }
?>
