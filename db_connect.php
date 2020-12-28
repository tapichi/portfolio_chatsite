<?php
try {
  $db = new PDO('mysql:dbname=portfolio_chatsite; host=127.0.0.1; charset=utf8', 'root', '');
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch(PDOException $e) {
  print('DB接続エラー：'. $e->getMessage());
}
?>