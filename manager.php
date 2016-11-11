<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
session_start();
if (isset($_SESSION['username'])) {
  $time = new DateTime();
  $curtime = $time->getTimestamp();
  $t10 = $_SESSION['logintime'] + 600;
  if ($curtime > $t10) {
    $diff = $curtime - $_SESSION['lastactive'];
    if ($diff > 180) {
      session_destroy();
    } else {
      $_SESSION['lastactive'] = $curtime;
    }
  } else {
    $_SESSION['lastactive'] = $curtime;
  }
} else {
  session_destroy();
}
?>
