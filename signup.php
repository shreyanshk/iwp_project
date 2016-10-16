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
    <div id='signupform'>
      <form action="dosignup.php" method="POST">
        <p>
          First name<br>
          <input type='text' id='fname'>
        </p>
        <p>
          Last name<br>
          <input type='text' id='lname'>
        </p>
        <p>
          Preferred username<br>
          <input type='text' id='username'>
        </p>
        <p>
          Password<br>
          <input type='password' id='password'>
        </p>
        <p>
          Retype password<br>
          <input type='text' id='cnfpassword'>
        </p>
        <p>
          E-Mail address<br>
          <input type='text' id='email'>
        </p>
        <p>
          Your occupation<br>
          <select id='occupation'>
            <option value='student'>Student</option>
            <option value='teacher'>Teacher</option>
          </select>
        </p>
        <br>
        <input type='submit' value='Sign Up'>
      </form>
    </div>
  </body>
</html>
