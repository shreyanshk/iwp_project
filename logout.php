<?php
  session_start();
  if (isset($_SESSION['username'])) {
    echo "You have been logged out";
  } else {
    header('Location: login.php');
  }
  session_destroy();
 ?>
