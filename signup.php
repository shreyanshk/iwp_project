<?php
 include 'manager.php';
?>
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
    <script>
      function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
      }

      function getusername() {
        un = getParameterByName('username');
        if (un != null) {
          (document.getElementsByName("username"))[0].setAttribute("value", un);
        }
      }
    </script>
  </head>
  <body onload="getusername()">
    <div id='topbar'>
      <p id='topbarmid'>CodeDev SignUp</p>
    </div>
    <div id='signupform'>
      <form action="dosignup.php" method="POST">
        <p>
          First name<br>
          <input type='text' name='fname'>
        </p>
        <p>
          Last name<br>
          <input type='text' name='lname'>
        </p>
        <p>
          Preferred username<br>
          <input type='text' name='username'>
        </p>
        <p>
          Password<br>
          <input type='password' name='password'>
        </p>
        <p>
          Retype password<br>
          <input type='password' name='cnfpassword'>
        </p>
        <p>
          E-Mail address<br>
          <input type='text' name='email'>
        </p>
        <p>
          Your occupation<br>
          <select name='occupation'>
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
