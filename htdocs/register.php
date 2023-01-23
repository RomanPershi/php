<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Сайт для менеджера по продажам</title>
  <link rel="stylesheet" href="style2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<script src="https://kit.fontawesome.com/89705fe93f.js" crossorigin="anonymous"></script>
<body class="admin">
<div class="back">
  <button id = "back" type="submit" class="button6" name="button">< Назад</button>
</div>
  <?php
  //12
    $mysql = new mysqli('localhost','root','root','somebase');
      $username = $_COOKIE['user'];
      $result=$mysql->query("SELECT * FROM `user` WHERE `name` = '$username'");
      $mode = 0;
      foreach ($result as $row) {
    $mode = $row['mode'];
      }
  if ($_COOKIE['user'] == '')://13
  ?>
<div>  <?php
  $someerror = "У Вас нет доступа к странице главного администратора";
echo $someerror;
Header("Location: /admin.php?get=$someerror");
   ?></div><!-- 14 -->
<?php elseif($mode == 1)://15
  ?>
  <div class="container">
    <div style="color:#c0301c;margin-top:50px;" class="titleheader2">
      Добавление информации о пользователе
    </div>
    <form class="buttons" action="adduser.php" method="POST">
    <div class="buttons">
    <div class="regform">
      <?php
      $get = $_GET['get'];
      $vivod="<span style='color:#22bb33;' class='errorclass'>".$get."</span>";
      echo $vivod; ?>
    <input type="send" class="inputuser" name="login"  placeholder="Логин пользователя" autocomplete="off">
    <input style ="margin-top:50px;" type="send" class="inputpass" name="pass"  placeholder="Пароль пользователя" autocomplete="off">
    <input style ="margin-top:50px;" type="send" class="inputuser" name="name"  placeholder="Имя пользователя" autocomplete="off">
  <button type="submit"  class="btn-new" name="button">Добавить пользователя</button></div>
</div>
</form>
</div>
</div>
<?php elseif ($mode == 0)://17

  ?>
  <div class="titleheader">
    Ваш уровень доступа недостаточен для использования данных функций
  </div>
<?php endif;?>
</body>
</html>
<script type="text/javascript">
$('#back').on('click',function(){
location.href = "/admin.php";

});
$('.checklist').on('click',function(){
$('input',this).attr("checked", function () {
  return !$(this).attr("checked");
});
});
$("#sortpicture").change(function() {
  var fileName = $(this).val().split('/').pop().split('\\').pop();
    $('[name=photo]').val(fileName);
});
$('[name=countplus]').on('click', function() {
  var countplus = $(this)[0].value;
  var element = $(this).parent();
  var element = element.parent();
  var element = element.parent();
  var element = element.parent();
  element = $('.stock',element);
  element.html(Number(element.html())+1)
var countplus = $(this)[0].value
  $.ajax({
              url: 'countplus.php',
              dataType: 'text',
              cache: false,
              contentType: false,
              processData: false,
              data: ({countplus:countplus}),
              type: 'post',
              success: function(php_script_response){

              }
   });
});
$('[name=countminus]').on('click', function() {
var countplus = $(this)[0].value;
var element = $(this).parent();
var element = element.parent();
var element = element.parent();
var element = element.parent();
element = $('.stock',element);
if (Number(element.html()) > 0)
{
element.html(Number(element.html())-1)
}
  $.ajax({
              url: 'countminus.php',
    type:"POST",
    data:({countplus:countplus}),
    dataType:"html",
              success: function(php_script_response){

              }
   });
});
$('#upload').on('click', function() {
    var file_data = $('#sortpicture').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);

    $.ajax({
                url: 'upload.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(php_script_response){

                }
     });
});
</script>
