<?php
session_start();
require(('../db_connect.php'));

function h($str){
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//セッションチェック
if(!isset($_SESSION['join'])){
  header('Location: ../index/index.php');
  exit();
}

if(!empty($_POST)){
  header('Location: ../index/index_logined.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/common/reset.css" />
  <link rel="stylesheet" href="../css/join/style_thanks.css" />

  <title>Praise us!</title>
</head>
<body>
<div id="wrap">

<!-- 共通バー -->
<div class="container_left">
  <div class="top_logo">
    <img src="../img/logo.png" alt="">
    <p>Three<br>Good<br>Things!</p>
  </div>

  <!-- 戻るボタン -->
  <div class="link link_back">
    <a href="" class="btn btn-border">back</a>
  </div>

</div>


<!-- ありがとうフォーム -->
<div class="container_right">
  <div class="thanks">
     <img src="../img/thanks.svg" alt="">
  </div>      
      <div class="chara_area">
          <div class="view_characters">
            <img src="../img/chara_<?php print($_SESSION['join']['type']); ?>_1.svg" alt="">
            <div class="character_stage"></div>
            <div class="character_stage_shadow shadow"></div>
          </div>
        </div>
      <div class="level">
        <p>Lv. 1</p>
      </div>  
      <form class="start" action="" method="post">
      <input type="hidden" name="action" value="submit">
        <input type="submit" value="START!" />
      </form>

</div>

</div>
</body>
</html>