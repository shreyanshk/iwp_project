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
  $passhash = md5($_POST['password']);
  $cnfpasshash = md5($_POST['cnfpassword']);
  if (!($passhash === $cnfpasshash)) {
    echo "Your passwords do not match! Please click back and retype password fields.";
    exit();
  }
  $email = $_POST['email'];
  $group = $_POST['occupation'];
  $queryun = "select count(*) from users where username = '$username'";
  $queryem = "select count(*) from users where email = '$email'";
  $resun = ($userdb->query($queryun))->fetchColumn();
  $resem = ($userdb->query($queryem))->fetchColumn();
  if (!empty($resem)) {
    echo "This email address is already registered";
  } else if (!empty($resun)) {
    echo "This username already exist";
  } else {
    $userdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ins = "insert into users (
      uuid, fname, lname, email, passhash, group, username
      ) values (
      :uuid, :fname, :lname, :email, :passhash, :group, :username
      )";
    $res = $userdb->prepare($ins);
    if ($res == false) {
      echo "This didn't work.";
    }
/*    $res->bindParam(':fname', $fname);
    $res->bindParam(':lname', $lname, PDO::PARAM_STR);
    $res->bindParam(':email', $email, PDO::PARAM_STR);
    $res->bindParam(':passhash', $passhash, PDO::PARAM_STR);
    $res->bindParam(':group', $group, PDO::PARAM_STR);
    $res->bindParam(':username', $username, PDO::PARAM_STR);*/
    $res->execute(array(
      "fname" => $fname,
      "lname" => $lname,
      "email" => $email,
      "passhash" => $passhash,
      "group" => $group,
      "username" => $username
    ));
    echo $res->rowCount();
    echo "Your details have been saved $fname! Now, You can log in.";
  }
} else {
  echo "Invalid Request";
}
?>
