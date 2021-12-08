<?php

// Change this connection setting to your preference.

try {
  $pdo = new PDO("mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME", $DATABASE_USER, $DATABASE_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $err) {
  die($err->getMessage());
}
