<?php


  /*
  * @return an object of the database;
  */
  class Database
  {
    protected $db_host;
    protected $db_user;
    protected $db_pass;
    protected $db_name;


    public function __construct($host, $name, $user, $pass) {
      $this->db_host = $host;
      $this->db_name = $name;
      $this->db_user = $user;
      $this->db_pass = $pass;
    }


    public function getCon() {

      $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=utf8';

      try {
        $db = new  PDO($dsn, $this->db_user, $this->db_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
      } catch(PDOexception $e) {
        echo $e->getMessage();
        exit;
      }
    }
  }
