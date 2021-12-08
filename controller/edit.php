<?php

include '../private/config.php';
include '../controller/database.php';

$cdId = $_POST['id'];
$cdSlug = $_POST['slug'];
$cdName = $_POST['name'];
$cdDay = $_POST['day'];
$cdMonth = $_POST['month'];

$sql = "SELECT * FROM tu_countdowns WHERE slug = '$cdSlug'  LIMIT 1";
$result = $pdo->query($sql);

if ($result->rowCount() > 0) {
  $data = [
    'name' => $cdName,
    'slug' => $cdSlug,
    'day' => $cdDay,
    'month' => $cdMonth,
    'id' => $cdId
  ];
  $sql = "UPDATE tu_countdowns SET name=:name, slug=:slug, day=:day, month=:month WHERE id=:id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute($data);
  header('Location: /' . $cdSlug);
  exit;
} else {
  header('Location: /edit');
}
