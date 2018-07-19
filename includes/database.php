<?php
/*
  *Get the database connection.
  *@return object connection to MYSQL server.
*/
  function get_DB() {
    $db_host = "localhost";
    $db_user = "cms.www";
    $db_pass = "oSrcLMFA97leNzbk";
    $db_name = "cms";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_error()) {
      echo mysqli_connect_error();
      exit;
    }
    return $conn;
  }
?>
