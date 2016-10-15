<?php
  session_start();
  $uname = $_POST['uname'];
  $passhash = md5($_POST['password']);
  //check username or email
  $userdb = new PDO('sqlite:/srv/http/iwp_project/users.sqlite');
  $query1 = "select * from users where username = '".$uname."'";
  $query2 = "select * from users where email = '".$uname."'";
  $res1 = $userdb->query($query1);
  $res2 = $userdb->query($query2);
  $validid = 0;
  foreach ($res1 as $row) {
    if ($row['passhash'] == $passhash) {
      $validid = 1;
    }
  }
  foreach ($res2 as $row) {
    if ($row['passhash'] == $passhash) {
      $validid = 1;
    }
  }
  if ($validid) { //check username & pass
    echo "You have been logged in!";
  } else {
    echo "Invalid userid password combo";
    session_destroy();
  }
?>
