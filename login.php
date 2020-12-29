<?php
session_start();
require('db_connect.php');

function h($str){
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

if(!empty($_SESSION)){
  
}

if(!empty($_POST)){
  if($_POST['email'] !== '' && $_POST['password'] !== ''){
    $sql = 'select * from users where email=? and password=?';
    $login = $db->prepare($sql);

    $login->execute(array(
      $_POST['email'],
      sha1($_POST['password'])
    ));

    $user = $login->fetch();
  
    if($user){
      $_SESSION['join'] = $user;
      $_SESSION['time'] = time();
  
      header('Location: index_logined.php');
      exit();
    } else {
      $error['login'] = 'failed';
    }
  } else {
    $error['login'] = 'blank';
  }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="reset.css" />
  <link rel="stylesheet" href="style_login.css" />

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
  <!-- <div class="link">
    <a href="" class="btn btn-border">Let's join !</a>
  </div> -->

  <!-- マイページボタン -->
  <!-- <div class="link">
    <a href="" class="btn btn-border">My page</a>
  </div> -->

  <!-- ログアウトボタン -->
  <!-- <div class="link">
    <a href="" class="btn btn-border">logout</a>
  </div> -->

  <!-- 戻るボタン -->
  <div class="link link_back">
    <a href="index.php" class="btn btn-border">back</a>
  </div>

</div>


<!-- ログインフォーム -->
<div class="container_right">
<div class="top_index">
    <p>ログイン Let's signup !</p>
  </div>

  <form action="" method="post" class="registration_form login" id="form">

      <div class="form_group email">
        <label for="email">email</label>
        <input type="email" id="email" name="email" size="35" maxlength="255" class="form-control" value="<?php echo h($_POST['email']); ?>">
      </div>
      <div class="form_group password">
        <label for="password">password</label>
        <input type="password" id="password" name="password" size="10" maxlength="20" class="form-control" value="<?php echo h($_POST['password']); ?>">
        <?php if($error['login'] == 'blank'): ?>
          <p class="error">メールアドレスとパスワードを入力してください。</p>
        <?php endif; ?>
        <?php if($error['login'] == 'failed'): ?>
          <p class="error">ログイン失敗！正しく入力してください。</p>
        <?php endif; ?>
        
      </div>

     
  </form>
    <div class="login_submit">
      <input type="submit" form="form" value="Login!" />
    </div>




</form>





  

</div>
</body>
</html>