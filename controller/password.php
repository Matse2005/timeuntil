<?php
include '../private/config.php';

$curr_pass = $_POST['curr_password'];
$new_pass = $_POST['new_password'];
$conf_pass = $_POST['conf_password'];

if ($curr_pass == $PASSWORD && $new_pass == $conf_pass) {
  $file = '../private/config.php';

  //read file
  $content = file_get_contents($file);

  // here goes your update
  $content = preg_replace('/$PASSWORD=\"(.*?)\";/', '$PASSWORD="' . $new_pass . '";', $content);
  echo $content;

  //write file
  file_put_contents($file, $content);
  echo 'Password changed successfully!';
} else {
  echo "password not changed";
}
