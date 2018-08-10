<?php
  require_once 'DBManager.php';
  class System{
    public static function add($obj)
    {
      $result = false ;
      $sql = "insert into aot_system(name) values(?)";
      try {
        $db = DBManager::getConnection();
        $stmn = $db->prepare($sql);
        $stmn->bindParam(1,$obj["name"],PDO::PARAM_STR);
        if($stmn->execute()){
          $result = true ;
        }
      } catch (PDOException $e) {
        print_r($e);
      }
      return $result ;
    }

    public static function update($obj)
    {
      $result = false ;
      $sql = "update aot_system set name = ? where id_system = ?";
      try {
        $db = DBManager::getConnection();
        $stmn = $db->prepare($sql);
        $stmn->bindParam(1,$obj["name"],PDO::PARAM_STR);
        $stmn->bindParam(2,$obj["id_system"],PDO::PARAM_INT);
        if($stmn->execute()){
          $result = true ;
        }
      } catch (PDOException $e) {
        print_r($e);
      }
      return $result ;
    }

    public static function delete($obj)
    {
      $result = false ;
      $sql = "delete from aot_system where id_system = ?";
      try {
        $db = DBManager::getConnection();
        $stmn = $db->prepare($sql);
        $stmn->bindParam(1,$obj["id_system"],PDO::PARAM_INT);
        if($stmn->execute()){
          $result = true ;
        }
      } catch (PDOException $e) {
        print_r($e);
      }
      return $result ;
    }

    public static function get($id)
    {
      $result = null ;
      $sql = "select * from aot_system where id_system = ?";
      try {
        $db = DBManager::getConnection();
        $stmn = $db->prepare($sql);
        $stmn->bindParam(1,$id,PDO::PARAM_INT);
        $stmn->execute();
        if($row=$stmn->fetch(PDO::FETCH_ASSOC))
        {
          $result = $row;
        }
      } catch (PDOException $e) {
        print_r($e);
      }
      return $result ;
    }

    public static function getAll()
    {
      $result = array() ;
      $sql = "select * from aot_system";
      try {
        $db = DBManager::getConnection();
        $stmn = $db->prepare($sql);
        $stmn->execute();
        while($row=$stmn->fetch(PDO::FETCH_ASSOC))
        {
          $result[] = $row;
        }
      } catch (PDOException $e) {
        print_r($e);
      }
      return $result ;
    }
  }
?>
