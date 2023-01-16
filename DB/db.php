<?php
class DB
{

 private static $host = "localhost";
 private static $db_name = "lyrics";
 private static $username = "root";
 private static $password = "";

 public static function Connect()
 {
  $con = 'mysql:host=' . self::$host . ';dbname=' . self::$db_name . ';';
  $PDO = new PDO($con, self::$username, self::$password);
  $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  return $PDO;
 }
}