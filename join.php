<?php
session_start();

require('db_connect.php');

  function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }

  if(!empty($_POST)){
    //入力チェック
    if (strlen($_POST['password']) < 4){
      $error['password'] = 'length';
    }
    
    //重複チェック
    if(empty($error)){
      $user = $db->prepare('SELECT COUNT(*) AS cnt FROM users WHERE email=?');
      $user->execute(array($_POST['email']));
      $record = $user->fetch();
      if($record['cnt'] > 0){
        $error['email'] = 'duplicate';
      }
    }

    //エラーチェック後にページ遷移
    if(empty($error)){
      $_SESSION['join'] = $_POST;
      header('Location: check.php');
      exit();
    }
  }

  //check画面から戻ってきたとき
  if($_REQUEST['action'] == 'rewrite' && isset($_SESSION['join'])){
    $_POST = $_SESSION['join'];
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="reset.css" />
  <link rel="stylesheet" href="style_join.css" />

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
    <a href="index.php" class="btn btn-border">back</a>
  </div>

</div>


<!-- 入力フォーム -->
<div class="container_right">
  <div class="top_index">
    <p>会員登録 sign up to became a member !</p>
  </div>

    <form action="" method="post" id="form">
      <div class="registration_form">
        <div class="name form_group">
          <label for="name">name</label>
          <input type="text" id="name" name="name" size="35" maxlength="255" class="form-control" value="<?php echo h($_POST['name']); ?>" required>
        </div>
        <div class="email form_group">
          <label for="email">email</label>
          <input type="email" id="email" name="email" size="35" maxlength="255" class="form-control" value="<?php echo h($_POST['email']); ?>" required>
          <?php if($error['email'] === 'duplicate'): ?>
				  	<p class="error">既に登録されています!</p>
					<?php endif; ?>
        </div>
        <div class="password form_group">
          <label for="password">password</label>
          <input type="password" id="password" name="password" size="10" maxlength="20" class="form-control" value="<?php echo h($_POST['password']); ?>" required>
          <?php if($error['password'] === 'length'): ?>
					  <p class="error">パスワードは４文字以上で入力してください</p>
					<?php endif; ?>
        </div>
        <div class="re_password form_group">
          <label for="re_password">再入力</label>
          <input type="password" id="re_password" name="re_password" size="10" maxlength="20" class="form-control" required>
          <?php if($_POST['password'] !== $_POST['re_password']): ?>
            <p class="error">パスワードが一致しません</p>
          <?php endif; ?>
        </div>

      </div>         
    </form>
    
    <div class="select_character">
      <div class="choose_index">
        <p>Choose your character !</p>
      </div>

      <div class="view_characters">
        <img id="chara_img" src="./img/chara_1_1.svg" alt="">
        <div class="character_stage"></div>
        <div class="character_stage_shadow shadow"></div>
        <div class="radio">
          <input id="type" name="type" type="radio" value="1" form="form"><label for="type">this !</label>
        </div>
          <input class="back" type="button" value="◀" onclick="go_back()">
          <input class="go" type="button" value="▶" onclick="go_forward()">
        <script>
          var img_src = new Array("./img/chara_1_1.svg", "./img/chara_2_1.svg", "./img/chara_3_1.svg");
          var i = 1;

          function go_forward(){
            if(i == 3) {
              i == 1;
            } else {
              i++;
            }
            document.getElementById("chara_img").src=img_src[i-1];
            document.getElementById("type").value=i;
          }
          function go_back(){
            if(i == 1) {
              i == 3;
            } else {
              i--;
            }
            document.getElementById("chara_img").src=img_src[i-1];
            document.getElementById("type").value=i;
          }
        </script>
      </div>
          
      <div class="form_group character_name">
        <label for="character_name">What's his name ?</label>
        <input type="text" id="character_name" name="character_name" class="form-control" form="form" value="<?php echo h($_POST['character_name']); ?>" required>
      </div>      
    </div>
        
    <div class="regist_submit">
      <input type="submit" value="CHECK!" form="form" />
    </div>

</div>
</body>
</html>