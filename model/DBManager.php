<?php
  class DBManager {
    private static $db = null;
    public static function getConnection()
        {
          $HOST_NAME = "localhost";
        	$DB_NAME = "aotdb";
        	$CHAR_SET = "charset=utf8"; // เช็ตให้อ่านภาษาไทยได้

        	$USERNAME = "root";     // ตั้งค่าตามการใช้งานจริง
        	$PASSWORD = "";  // ตั้งค่าตามการใช้งานจริง
        	try {
        		$db = new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USERNAME,$PASSWORD);
        	} catch (PDOException $e) {
        		echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage();
        	}
          return $db ;
        }
  }
 ?>
