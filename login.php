<?php
 include 'manager.php';
?>
<?php
  session_start();
  if (isset($_SESSION['username'])) {
    echo "Please wait while we redirect you";
    header('Location: home.php');
  }
?>

<html>
  <head>
    <title>
      CodeDev
    </title>
      <link rel="stylesheet" type="text/css" href="login.css">
      <link rel="stylesheet" type="text/css" href="login_dropdown.css">
      <link rel="stylesheet" type="text/css" href="test.css">
      <script src="login.js"></script>
  </head>
  <body>
    <div id='topbar'> <!--TODO: apply fadein/fadeout-->
      <div id='topbarleft'>
        <p style="font-size: 42px;">VITCC's CodeDev</p>
      </div>
      <div id='topbarright'>
        <div class="dropdown">
          <button class="lang">Language</button>
            <div class="lang-select">
              <a href="#">English</a>
              <a href="#">Tamil</a>
              <a href="#">Hindi</a>
            </div>
          </div>
      </div>
    </div>
    <div id='loginsquare'>
      <div>
        <img src="vitlogo.png" id='vitlogo'>
          <div>
            <form id='loginform' action='dologin.php' method='POST' onsubmit="return verify()">
              <h2>
                Sign in:
              </h2>
              <hr style='width: 195px; position: relative; left: -150px; bottom: 6px;'>
              Username or email address:
              <br>
              <input type='text' id='username' name='username' class='form-control'></input>
              <br>
              <br>
              Password:
              <br>
              <input type='password' id='password' name='password' class="form-control"></input>
              <br>
              <input type='submit' id='submitbutton' value='Sign in / Sign up'></input>
            </form>
          </div>
      </div>
    </div>
    <div id='bottombar'>
      <div id='bottombarleft'>
        Made @ <a href="http://vit.ac.in"> VITCC <a>
      </div>
      <div id='bottombarright'>
        <img src='square-github.png' class='reachout'>
        <img src='square-facebook.png' class='reachout'>
        <img src='square-twitter.png' class='reachout'>
      </div>
  </body>
</html>
