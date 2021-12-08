<?php

include '../private/config.php';
include '../controller/database.php';

$cdSlug = $_POST['slug'];
$cdName = $_POST['name'];
$cdDay = $_POST['day'];
$cdMonth = $_POST['month'];

$sql = "SELECT * FROM tu_countdowns WHERE slug = '$cdSlug'  LIMIT 1";
$result = $pdo->query($sql);

if ($result->rowCount() <= 0) {
  $sql = "INSERT INTO tu_countdowns (slug, name, day, month) VALUES ('$cdSlug', '$cdName', '$cdDay', '$cdMonth')";
  $pdo->exec($sql);
  header('Location: /' . $cdSlug);
  exit;
} else {
  header('Location: /add');
}
