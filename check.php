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
}

if(!empty($_POST)){
  //userテーブルにインサート
  $sql = 'insert into users (name, email, password, created_at) values (:name,  :email, :password, now())';
  $stmt = $db->prepare($sql);
  $params = array(
    ':name' => $_SESSION['join']['name'], 
    ':email' => $_SESSION['join']['email'], 
    ':password' => sha1($_SESSION['join']['password']) 
  );
  $stmt->execute($params);

  $user_id = $db->lastInsertId();

  //charactersテーブルにインサート
  $sql = 'insert into characters (user_id, character_name, type, created_at) values (:user_id, :character_name, :type, now())';
  $stmt = $db->prepare($sql);
  $params = array(
    ':user_id' => $user_id,
    ':character_name' => $_SESSION['join']['character_name'], 
    ':type' => $_SESSION['join']['type']
  );
  $stmt->execute($params);

  //statusテーブルにインサート
  $sql = 'insert into status (user_id, created_at) values (:user_id, now())';
  $stmt = $db->prepare($sql);
  $params = array(
    ':user_id' => $user_id
  );
  $stmt->execute($params);

  $_SESSION['join']['user_id'] = $user_id;
  header('Location: thanks.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="reset.css" />
  <link rel="stylesheet" href="style_check.css" />

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

  <!-- 戻るボタン -->
  <div class="link link_back">
    <a href="join.php?action=rewrite" class="btn btn-border">back</a>
  </div>

</div>


<!-- 確認フォーム -->
<div class="container_right">
  <div class="top_index">
    <p>会員登録 sign up to became a member !</p>
  </div>

    <div class="confirm_form">
    <form action="" method="post">
      <input type="hidden" name="action" value="submit">
      <div class="form_container">
        <table>
          <tbody class="form_group">
            <tr>
              <th class="form_index" cellpadding="3">name</th>
              <td><?php print(h($_SESSION['join']['name'])); ?></td>
            </tr>
            <tr>
              <th class="form_index" cellpadding="3">email</th>
              <td><?php print(h($_SESSION['join']['email'])); ?></td>
            </tr>
            <tr>
              <th class="form_index" cellpadding="3">password</th>
              <td>********</td>
            </tr>
            <tr>
              <th class="form_index" cellpadding="3">chara_name</th>
              <td><?php print(h($_SESSION['join']['character_name'])); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
      
    <div class="select_character">
      <div>
        <div class="view_characters">
          <img src="./img/chara_<?php print(h($_SESSION['join']['type'])); ?>_1.svg" alt="">
          <div class="character_stage"></div>
          <div class="character_stage_shadow shadow"></div>
        </div>  
      </div>
    </div>

    <div class="regist_submit">
      <input type="submit" value="CHECK!" />
    </div>
    </form>
</div>
 

</div>
</body>
</html>