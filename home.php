<html>
  <head>
  </head>
  <body>
    <p> Hi,
      <?php
       include 'manager.php';
      ?>
      <?php
        session_start();
        echo $_SESSION['username'];
      ?>
    </p>
    <a href='logout.php'>Click here to logout</a>
  </body>
</html>
