<?php
session_start();
require('db_connect.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="reset.css" />
  <link rel="stylesheet" href="style.css" />

  <title>Praise us!</title>
</head>
<body>
<div id="wrap">

<!-- 共通バー -->
<div class="container_left">
  <div class="top_logo">
    <img src="./img/logo.png" alt="">
    <p>Praise<br><br>us !</p>
  </div>

  <!-- 会員登録ボタン -->
  <div class="link">
    <a href="join.php" class="btn btn-border">Let's join !</a>
  </div>

  <!-- ログインボタン -->
  <div class="link">
    <a href="login.php" class="btn btn-border">login</a>
  </div>

  <!-- ログアウトボタン -->
  <!-- <div class="link">
    <a href="" class="btn btn-border">logout</a>
  </div> -->

  <!-- 戻るボタン -->
  <!-- <div class="link link_back">
    <a href="" class="btn btn-border">back</a>
  </div> -->

</div>

<!-- 非ログイン時キャラクター画面 -->
<div class="container_center">
  <div class="top_lead">
    <p>Write today's Good Things !</p>
  </div>
    <?php for( $i=1; $i<=3; $i++): ?>
    <div class="character_<?php print($i); ?>">
      <img class="character_img" src="./img/chara_<?php print($i); ?>_1.svg" alt="">
      <div class="character_stage"></div>
      <div class="character_stage_shadow shadow"></div>
    </div>
    <div class="flying_<?php print($i); ?>">
      <img class="flying_animation" src="./img/food_<?php print($i); ?>.svg" alt="">
    </div>
    <?php endfor; ?>

</div>


<!-- 投稿一覧画面 -->
<div class="container_right">

  <div class="msg_list">
    

  <div class="user_msg other_msg">
    <div class="action_contents">
      <?php for( $i=1; $i<=3; $i++): ?>
      <img src="./img/food_<?php print($i); ?>.svg" alt="">
      <?php endfor; ?>
    </div>
    <div class="msg">
      <div class="says">
        <p>早起きしてゆっくり朝ご飯をたべれた！</p>
      </div>
    </div>
      <div class="msg_icon">
        <img src="./img/chara_2.svg" alt="">
      </div>
  </div>
  <div class="user_msg other_msg">
    <div class="action_contents">
      <?php for( $i=1; $i<=3; $i++): ?>
      <img src="./img/food_<?php print($i); ?>.svg" alt="">
      <?php endfor; ?>
    </div>
    <div class="msg">
      <div class="says">
        <p>仕事で頑張った！アイスを買って帰ろう～</p>
      </div>
    </div>
      <div class="msg_icon">
        <img src="./img/chara_3.svg" alt="">
      </div>
  </div>
  <div class="user_msg my_msg">
    <div class="msg">
      <div class="says">
        <p class="says_center">今日あったよかったことを呟いてみよう：）</p>
      </div>
    </div>
  </div>
  <div class="user_msg other_msg">
    <div class="action_contents">
      <?php for( $i=1; $i<=3; $i++): ?>
      <img src="./img/food_<?php print($i); ?>.svg" alt="">
      <?php endfor; ?>
    </div>
    <div class="msg">
      <div class="says">
        <p>テストの点数が上がった！</p>
      </div>
    </div>
      <div class="msg_icon">
        <img src="./img/chara_1.svg" alt="">
      </div>
  </div>
  <div class="user_msg other_msg">
    <div class="action_contents">
      <?php for( $i=1; $i<=3; $i++): ?>
      <img src="./img/food_<?php print($i); ?>.svg" alt="">
      <?php endfor; ?>
    </div>
    <div class="msg">
      <div class="says">
        <p>筋トレ継続５日目です。</p>
      </div>
    </div>
      <div class="msg_icon">
        <img src="./img/chara_2.svg" alt="">
      </div>
  </div>
  <div class="user_msg other_msg">
    <div class="action_contents">
      <?php for( $i=1; $i<=3; $i++): ?>
      <img src="./img/food_<?php print($i); ?>.svg" alt="">
      <?php endfor; ?>
    </div>
    <div class="msg">
      <div class="says">
        <p>スパイスカレーのテンパリングがうまくいった！！</p>
      </div>
    </div>
      <div class="msg_icon">
        <img src="./img/chara_3.svg" alt="">
      </div>
  </div>



  </div>


</div>

  

</div>
</body>
</html>