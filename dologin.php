<?php
  session_start();
  if (isset($_POST['username']) && isset($_POST['password']) && (!isset($_SESSION['username']))) {
    $username = $_POST['username'];
    $passhash = md5($_POST['password']);
    $userdb = new PDO('sqlite:/srv/http/iwp_project/users.sqlite');
    $query1 = "select * from users where username = '".$username."'";
    $query2 = "select * from users where email = '".$username."'";
    $res1 = $userdb->query($query1);
    $res2 = $userdb->query($query2);
    $validid = 0;
    foreach ($res1 as $row) {
      if ($row['passhash'] == $passhash) {
        $validid = 1;
        $_SESSION['username'] = $row['username'];
      }
    }
    foreach ($res2 as $row) {
      if ($row['passhash'] == $passhash) {
        $validid = 1;
        $_SESSION['username'] = $row['username'];
      }
    }
    if ($validid) {
      //echo "You have been logged in!";
      header('Location: home.php');
    } else {
      echo "Invalid userid password combo";
      session_destroy();
    }
  } else if (isset($_SESSION['username'])) {
    header('Location: home.php');
  } else {
    header('Location: login.php');
    session_destroy();
  }
?>
