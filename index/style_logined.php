<?php header('Content-Type: text/css; charset=utf-8'); ?>
@charset "UTF-8";

<?php
session_start();
require('index_logined.php');

$status_bar_soda = $status_bar['count_status_soda'] * 10;
$status_bar_hotdog = $status_bar['count_status_hotdog'] * 10;
$status_bar_cake = $status_bar['count_status_cake'] * 10;

?>

html body {
  height: 100%;
}

#wrap {
  display: grid;
  width: 100vw;
  height: 100vh;
  min-height: 100%;
  grid-template-rows: auto;
  grid-template-columns: 15% 35% 1fr;
}

/* グリッド */

.container_left {
  grid-column: 1 / 2 ;
  background-color: #6bc1e1;
  position: relative;
}
.container_center {
  grid-column: 2 / 3 ;
  display: grid;
  grid-template-rows: 10% 65% 5% 20%;
  grid-template-columns: 100%;
  background-color: #fff5ee;
}
.container_right {
  grid-column: 3 / 4 ;
  background-image:url(../../img/center_back_img.jpg);
  background-color:rgba(255,255,255,0.3);
  background-blend-mode:lighten;
  background-size:cover;
  overflow: auto;
}

/* 共通バー */
/* トップロゴ */
.top_logo {
  position: relative;
}

.top_logo p {
  position: absolute;
  color: #6bc1e1;
  font-weight: bold;
  font-size: 3rem;
  font-family: 'Indie Flower', cursive;
  top: 50%;
  left: 60%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  margin: 0;
  padding: 0;
}

.top_logo img {
 display: block;
 width: 80%;
 max-width: 150px;
 height: auto;
 margin: 2em auto;
}

/* リンク */
.link {
  width: 80%;
  margin: 1em auto;
  padding-top: 2em;
}

.link_back {
  position: absolute;
  bottom: 1rem;
  left: 50%;
  transform: translate(-50%);
  -ms-transform: translate(-50%);
  -webkit-transform: translate(-50%);
}

a.btn-border {
  display: block;
  padding: 1rem;
  border: .2em dashed #f6e5e4;
  border-radius: .5rem .5rem .5rem .5rem;
  text-decoration: none;
  text-align: center;
  color: #f6e5e4;
  font-size: 2em;
  font-family: 'Indie Flower', cursive;
  letter-spacing: 0.2em;
}

/* キャラクター画面  */
.top_lead {
  grid-column: 1 /3;
  grid-row: 1/ 2;
  text-align: center;
  margin: auto;
  font-weight: bold;
  font-size: 3em;
  font-family: 'Indie Flower', cursive;
  line-height: 2em;
  color: #6bc1e1;
  width: 100%;
  height: auto;
  overflow: hidden;
}

.character {
  grid-row: 2/ 3;
  width: 100%;
  height: auto;
}

.msg_form {
  padding-top: 2em;
}

.msg_form_input {
  display: block;
  border: 1px solid transparent;
  border-radius: 5%;
  padding: 0.5em;
  margin: auto;
  width: 80%;
  min-height: 6em;
  max-height: 6em;
  font-size: 2em;
  font-family: 'Noto Sans JP', sans-serif;
  color: #5e5e5e;
}

.msg_form_area {
  position: relative;
}

.msg_form_area::before {
  content: "";
  display: inline-block;
  position: absolute;
  bottom: -0.9em;
  left: 50%;
  transform: translate(-50%);
  -ms-transform: translate(-50%);
  -webkit-transform: translate(-50%);
  height: 0px;
  width: 0px;
  border-style: solid;
  border-color: #ffffff transparent transparent transparent;
  border-width:3em 3em 0 3em;
}
.msg_form_area input {
  position: absolute;
  bottom: -1.5em;
  right: 25%;
  transform: translate(-25%);
  -ms-transform: translate(-25%);
  -webkit-transform: translate(-25%);
  font-size: 1em;
  font-family: 'Indie Flower', cursive;
  border:none;
  display: inline-block;
  background: #6bc1e1;
  color: #5e5e5e;
  font-weight:bold;
  margin:0.5em;
  padding: 0.5em;
  border-radius: 25%;
  box-shadow: 0 0 0.2em #6bc1e1;
  z-index: 100;
}
.msg_time_count {
  display: inline-block;
  position: absolute;
  bottom: -1.1em;
  right: 10%;
  transform: translate(-10%);
  -ms-transform: translate(-10%);
  -webkit-transform: translate(-10%);
  font-size: 2em;
  font-family: 'Indie Flower', cursive;
  color:#5e5e5e;
}

.character {
  position: relative;
  width: 100%;
  height: auto;
  /* max-height: 400px; */
}
.character_view img{
  display: block;
  position: absolute;
  margin: auto;
  width: 80%;
  height: auto;
  max-width: 40em;
  min-width: 20em;
  top: 35%;
  left: 50%;
  transform: translate(-50%);
  -ms-transform: translate(-50%);
  -webkit-transform: translate(-50%);
  z-index: 30;
}

.character_stage {
  width: 80%;
  margin: 0 auto;
  height: 8em;
  min-height: 2em;
  background-color: #ffffff;
  border-radius: 50%;
  position: absolute;
  top: 75%;
  left: 50%;
  transform: translate(-50%);
  -ms-transform: translate(-50%);
  -webkit-transform: translate(-50%);
  z-index: 20;
}

.character_stage_shadow {
  height: 7em;
  min-height: 1.5em;
  border-radius: 50%;
  top: 80%;
  background-color: rgba(77, 72, 70, 0.842);
  width: 80%;
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  -ms-transform: translate(-50%);
  -webkit-transform: translate(-50%);
  z-index: 10;
}

.character_level {
  grid-row: 3/ 4;
  width: 100%;
  height: auto;
  min-height: 4em;
  font-size: 2em;
  font-family: 'Indie Flower', cursive;
  text-align: center;
}

.character_status {
  grid-row: 4/ 5;
  display: grid;
  margin: 0 auto;
  grid-template-columns: 20% 80%;
  grid-template-rows: 33% 33% 1fr;
  grid-template-areas: 
    "status_img_1 status_bar_1"
    "status_img_2 status_bar_2"
    "status_img_3 status_bar_3";
  width: 80%;
  height: 100%;
  padding-bottom: 1em;
  overflow: hidden;
  font-family: 'Indie Flower', cursive;
}

.status_img_1 {
  grid-area: status_img_1;
  width: 50%;
  min-width: 4em;
  height: auto;
  margin: auto;
  padding: 1em;
}
.status_img_2 {
  grid-area: status_img_2;
  width: 50%;
  min-width: 4em;
  height: auto;
  margin: auto;
  padding: 1em;
}
.status_img_3 {
  grid-area: status_img_3;
  width: 50%;
  min-width: 4em;
  height: auto;
  margin: auto;
  padding: 1em;
}

.bar_1 {
  grid-area: status_bar_1;
  padding: 1em 0;
  max-width: 80%;
}
.bar_2 {
  grid-area: status_bar_2;
  padding: 1em 0;
  max-width: 80%;

}
.bar_3 {
  grid-area: status_bar_3;
  padding-top: 1em;
  max-width: 80%;

}

.status_bar {
  display: block;
  text-align: center;
  color: #ffffff;
  height: 2em;
  line-height: 2em;
  letter-spacing: 0.1em;
}

.bar_1_color {
  background: #C03658;
  width: <?php echo $status_bar_soda; ?>% ;
  height: auto;
}
.bar_2_color {
  background: #6DC096;
  width: <?php echo $status_bar_hotdog; ?>% ;
  height: auto;
}
.bar_3_color {
  background: #ECB25B;
  width: <?php echo $status_bar_cake; ?>% ;
  height: auto;
}

.flying_1 {
  grid-column: 2 /3;
  grid-row: 2 /3;
  position: relative;
}
.flying_2 {
  grid-column: 1 /2;
  grid-row: 3 /4;
  position: relative;
}
.flying_3 {
  grid-column: 2 /3;
  grid-row: 4 /5;
  position: relative;
}

/* 回転アニメーション */
@keyframes rotate_food {
  0% {
    transform: rotate(0deg);
  } 100% {
    transform: rotate(360deg);
  }
}

.flying_animation {
  width: 15%;
  animation: rotate_food 2s infinite;
  position: absolute;
  top:4em;
  left:5em;
}

/* 投稿画面 */
.user_msg {
  position: relative;
  display: flex;
  padding: 3em;
}

.msg {
  width: 90%;
  height: auto;
}

.action_contents {
  width: 3%;
  min-width: 10px;
  margin-left: 2em;
}

.action_contents img {
  padding: 0.5em;
}

.my_msg {
  overflow: hidden;
  width: 90%;
}

.my_msg .msg {
  width: 95%;
  min-height: 8em;
  text-align: left;
}

.says {
  display: inline-block;
  position: relative;
  margin: auto 0;
  padding: 1em;
  width: 95%;
  height: 100%;
  min-width: 90%;
  min-height: 5em;
  border-radius: 12px;
  background: #fff5ee;
}

.my_msg .says::after {
  content: "";
  display: inline-block;
  position: absolute;
  top: 3px;
  left: -19px;
  border: 8px solid transparent;
  border-right: 18px solid #fff5ee;
  -webkit-transform: rotate(35deg);
  transform: rotate(35deg);
}

.says p {
  margin: 0;
  padding: 0;
  font-size: 2em;
  font-family: 'Indie Flower', cursive,'Noto Sans JP', sans-serif,;
  color: #5e5e5e;
}

.other_msg .says::after {
  content: "";
  display: inline-block;
  position: absolute;
  top: 3px;
  right: -19px;
  border: 8px solid transparent;
  border-right: 18px solid #fff5ee;
  -webkit-transform: rotate(140deg);
  transform: rotate(140deg);
}

.other_msg .msg_icon {
  width: 10%;
}

.other_msg .msg_icon img {
  width: 100%;
}

.other_msg .msg {
  min-height: 8em;
  padding-left: 2em;
}