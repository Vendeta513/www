<?php

/*
* Get the article record according to ID
* @param object $conn connect to the database
* @param integer $id the article ID
*
* @return mixed An associative array containing the article with that ID, or null if not found
*/
  function getArticle($conn, $id)
  {
    $sql = "SELECT *
            FROM article
            WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if($stmt === false)
    {
      echo mysqli_error($conn);
    }else
    {
      mysqli_stmt_bind_param($stmt, "i", $id);
      if(mysqli_execute($stmt))
      {
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
      }
    }
  }
?>


<?php
/*
  * @param string $title, required;
  * @param string $content, required;
  * @param string $published, validates error;
  *
  * return error if not supplied with any required param;
*/
  function validateArticle($title, $content, $published_at)
  {
    $errors = [];

    if($title == ''){
      $errors[] = "Title is required";
    }

    if($content == ''){
      $errors[] = "Content is  required";
    }

    if($published_at != '') {
      $date_time = date_create_from_format('Y-m-d H:i:s', $published_at);

      if($date_time === false){
        $errors[] = "Invalid date and time.";
      }else{
        $date_errors = date_get_last_errors();

        if($date_errors['warning_count'] > 0){
          $errors[] = "Invalid date and time.";
        }
      }
    }
    return $errors;
  }
?>
