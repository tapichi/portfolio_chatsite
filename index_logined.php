<?php
session_start();
require(('db_connect.php'));

function h($str){
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//セッションチェック
if(!isset($_SESSION['join'])){
  header('Location: index.php');
  exit();
} else {
  $_SESSION['time'] = time();

  // $sql = 'select * from users where user_id=?';
  $users = $db->prepare('SELECT * FROM users WHERE user_id=?');
  $users->execute(array($_SESSION['join']['user_id']));
  $user = $users->fetch();

  $characters = $db->prepare('SELECT * FROM characters WHERE user_id=?');
  $characters->execute(array($_SESSION['join']['user_id']));
  $character = $characters->fetch();

  // require('style_logined_bar.php');
}

// echo('<pre>');
// var_dump($_POST);
// var_dump($_SESSION);
// var_dump($user);
// var_dump($character);
// var_dump($posts);
// echo('</pre>');

if(!empty($_POST['form_id'])){
  if($_POST['form_id'] === "1" && $_POST['message'] !== ''){
    $sql = 'insert into posts (user_id, message, created_at) values (:user_id, :message, now())';
    $stmt = $db->prepare($sql);
    $params = array(
      ':user_id' => $user['user_id'],
      ':message' => $_POST['message']
    );
    $stmt->execute($params);

    // $post = $stmt->fetch();

    if($user['post_count'] !== 0 || $user['post_count'] <= 0) {
      $sql = 'update users set post_count = post_count - 1 where user_id=?';
      $stmt = $db->prepare($sql);
      $stmt->execute(array($user['user_id']));
    } 

    header('Location: index_logined.php');
    exit();
  }

}


$allPosts = $db->prepare('SELECT u.name, p.* FROM users u, posts p WHERE u.user_id=p.user_id ORDER BY p.created_at DESC');
$allPosts->execute();

if(!empty($_POST['form_id'])){
  // var_dump($_POST['actions']);

  if($_POST['form_id'] === "2" && $_POST['actions'] !== ''){
    $sql = 'update users set post_count = post_count + 1 where user_id=?';
    $stmt = $db->prepare($sql);
    $stmt->execute(array($user['user_id']));

    if($_POST['actions'] === 'food_1'){
      // $sql = 'update status set count_status_soda = count_status_soda + 1 where user_id=?';
      // $stmt = $db->prepare($sql);
      // $stmt->execute(array($user['user_id']));

      $sql = 'update status set count_status_soda = count_status_soda + 1 where user_id=?';
      $stmt = $db->prepare($sql);
      $stmt->execute(array($_POST['user_id']));

    } elseif($_POST['actions'] === 'food_2'){
      // $sql = 'update status set count_status_hotdog = count_status_hotdog + 1 where user_id=?';
      // $stmt = $db->prepare($sql);
      // $stmt->execute(array($user['user_id']));

      $sql = 'update status set count_status_hotdog = count_status_hotdog + 1 where user_id=?';
      $stmt = $db->prepare($sql);
      $stmt->execute(array($_POST['user_id']));

    } elseif($_POST['actions'] === 'food_3'){
      // $sql = 'update status set count_status_cake = count_status_cake + 1 where user_id=?';
      // $stmt = $db->prepare($sql);
      // $stmt->execute(array($user['user_id']));

      $sql = 'update status set count_status_cake = count_status_cake + 1 where user_id=?';
      $stmt = $db->prepare($sql);
      $stmt->execute(array($_POST['user_id']));
    }

    
    
    header('Location: index_logined.php');
    exit();
  }
}

$status = $db->prepare('SELECT * FROM status WHERE user_id=?');
$status->execute(array($user['user_id']));
$login_user_status = $status->fetch();

$sum_status = intval($login_user_status['count_status_soda']) + intval($login_user_status['count_status_hotdog']) + intval($login_user_status['count_status_cake']);

if( $sum_status >= 10 ){
  $sql = 'update users set level = 2 where user_id=?';
  $stmt = $db->prepare($sql);
  $stmt->execute(array($user['user_id']));
} elseif( $sum_status >= 20){
  $sql = 'update users set level = 3 where user_id=?';
  $stmt = $db->prepare($sql);
  $stmt->execute(array($user['user_id']));
}
// } elseif( $sum_status >= 30){
//   $sql = 'update users set level = 4 where user_id=?';
//   $stmt = $db->prepare($sql);
//   $stmt->execute(array($user['user_id']));
// }

$status = $db->prepare('SELECT * FROM status WHERE user_id=?');
$status->execute(array($_SESSION['join']['user_id']));
$status_bar = $status->fetch();

// var_dump($status_bar);


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="reset.css" />
  <link rel="stylesheet" href="style_logined.php" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Noto+Sans+JP&display=swap" rel="stylesheet">

  <title>Praise us!</title>
</head>
<body>
<div id="wrap">



<!-- 共通バー -->
<div class="container_left">
  <div class="top_logo">
    <img src="./img/logo.png" alt="">
    <p>Three<br>Good<br>Things!</p>
  </div>

  <!-- 会員登録ボタン -->
  <!-- <div class="link">
    <a href="" class="btn btn-border">Let's join !</a>
  </div> -->

  <!-- マイページボタン -->
  <!-- <div class="link">
    <a href="" class="btn btn-border">My page</a>
  </div> -->

  <!-- ログアウトボタン -->
  <div class="link">
    <a href="logout.php" class="btn btn-border">logout</a>
  </div>

  <!-- 戻るボタン -->
  <!-- <div class="link link_back">
    <a href="" class="btn btn-border">back</a>
  </div> -->

</div>

<!-- ログイン時キャラクター画面 -->
<div class="container_center">
  <div class="top_lead">
    <p>Write Today's Good Things !</p>
  </div>
  <div class="character_container">

  </div>
  <div class="character">
    <div class="msg_form">
      <div class="msg_form_area">
        <form action="" method="post">
          <textarea class="msg_form_input" name="message" id="message" cols="30" rows="10" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
            <input type="hidden" name="form_id" value="1">
            <input type="submit" id="submit" name="submit" value="done">
            <div class="msg_time_count">
              <p>★×<?php print(h($user['post_count'])); ?></p>
            </div>
        </form>
      </div>
    </div>
    <div class="character_view">
      <img src="./img/chara_<?php print(h($character['type'])); ?>_<?php print(h($user['level'])); ?>.svg" alt="">
      <div class="character_stage"></div>
      <div class="character_stage_shadow shadow"></div>
    </div>
  </div>

  <div class="character_level">
    <p>Lv.<?php print(h($user['level'])); ?></p>
  </div>

  <div class="character_status">
      <?php for( $i=1; $i<=3; $i++): ?>
        <div class="status_img_<?php print($i); ?>">
          <img src="./img/food_<?php print($i); ?>.svg" alt="">
        </div>
      <?php endfor; ?>

      <div class="bar_1">
        <span class="status_bar bar_1_color"><?php print(h($status_bar['count_status_soda'])*10); ?>%</span>
      </div>
      <div class="bar_2">
        <span class="status_bar bar_2_color"><?php print(h($status_bar['count_status_hotdog'])*10); ?>%</span>
      </div>
      <div class="bar_3">
        <span class="status_bar bar_3_color"><?php print(h($status_bar['count_status_cake'])*10); ?>%</span>
      </div>

  </div>
</div>

<!-- 投稿一覧画面 -->
<div class="container_right">

  <div class="msg_list">

  <?php while($post = $allPosts->fetch(PDO::FETCH_ASSOC) ):
        if($user['user_id'] === $post['user_id'] ): ?>
  <div class="user_msg my_msg">
    <div class="msg">
      <div class="says">
        <p><?php print(h($post['message'])); ?></p>
      </div>
    </div>
  </div>
  <?php else: ?>
  <div class="user_msg other_msg">
    <div class="action_contents">
      <?php for( $i=1; $i<=3; $i++): ?>
        <form method="post" name="action_form" id="action_form" action="">
          <input type="hidden" name="form_id" value="2">
          <input type="hidden" name="user_id" value="<?php print($post['user_id']); ?>">
          <input type="hidden" name="actions" value="food_<?php print($i); ?>">
          <a href="javascript:action_form[<?php print($i-1); ?>].submit()">
            <img src="./img/food_<?php print($i); ?>.svg" alt="">
          </a>
        </form>
      <?php endfor; ?>
    </div>
    <div class="msg">
      <div class="says">
        <p><?php print(h($post['message'])); ?></p>
      </div>
    </div>
      <div class="msg_icon">
        <?php
          $other_user_types = $db->prepare('SELECT type FROM characters WHERE user_id=?');
          $other_user_types->execute(array($post['user_id']));
          $other_user_type = $other_user_types->fetch();

          $other_user_levels = $db->prepare('SELECT level FROM users WHERE user_id=?');
          $other_user_levels->execute(array($post['user_id']));
          $other_user_level = $other_user_levels->fetch();

          // var_dump($other_user_type);
          // var_dump($other_user_level);
        ?>
        <img src="./img/chara_<?php print(h($other_user_type['type'])); ?>_<?php print(h($other_user_level['level'])); ?>.svg" alt="">
      </div>
  </div>
  <?php endif; ?>
  <?php endwhile; ?>




  </div>


</div>

  

</div>
</body>
</html>