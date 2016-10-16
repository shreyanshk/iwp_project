<?php
session_start();
if (isset($_SESSION['username'])) {
  header('Location: home.php');
} else {
  session_destroy();
}
?>

<html>
  <head>
    <title>CodeDev SignUp</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
  </head>
  <body>
    <div id='topbar'>
      <p id='topbarmid'>CodeDev SignUp</p>
    </div>
    <div>
      <form action="dosignup.php" method="POST">
        
  </body>
</html>
