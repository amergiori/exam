<?php

  class DB extends PDO{

    public function __construct(){
      include_once('config.php');

      try{
        parent::__construct('mysql:host='. DBHOST .';dbname='.DBNAME, DBUSER, DBPASS);
      } catch(PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
      }
    }
  }