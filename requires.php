<?php
function Query($pdo, $query, $err) {

  try {
    return $pdo->query($query);
  } catch (PDOException $ex) {
    $err .= $ex->getMessage();
    include 'error.html.php';
    throw $ex;
  }

}
function sanitize($type, $field) {
  if($type == INPUT_POST) {
    if(isset($_POST[$field])) {
      return htmlspecialchars(strip_tags($_POST[$field]));
    } else {
      return null; 
    }
  } else if ($type == INPUT_GET) {
    if(isset($_GET[$field])) {
      return htmlspecialchars(strip_tags($_GET[$field]));
    } else {
      return null; 
    }
  } else { 
    if(isset($_SERVER[$field])) {
      return htmlspecialchars(strip_tags($_SERVER[$field]));
    } else {
      return null; 
    }
  }
}
