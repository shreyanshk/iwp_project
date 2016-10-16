<?php
session_start();
if (isset($_SESSION['username'])) {
  header('Location: home.php');
} else if (
  !empty($_POST['fname'])
  && !empty($_POST['lname'])
  && !empty($_POST['username'])
  && !empty($_POST['password'])
  && !empty($_POST['cnfpassword'])
  && !empty($_POST['email'])
  && !empty($_POST['occupation'])
) {
  $userdb = new PDO('sqlite:/srv/http/iwp_project/users.sqlite');
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cnfpassword = $_POST['cnfpassword'];
  $email = $_POST['email'];
  $occupation = $_POST['occupation'];
  $queryun = "select * from users where username = '".$username."'";
  $queryem = "select * from users where email = '".$email."'";
  $resun = ($userdb->query($queryun))->rowCount();
  $resem = ($userdb->query($queryem))->rowCount();
  echo $resun;
  /*if (empty($resem)) {
    echo "This email address is already registered";
  } else if (empty($resun)) {
    echo "This username already exist";
  } else {
    echo "I'm here";
  }*/
}
?>
