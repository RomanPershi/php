<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Сайт для изучения языка</title>

    <link rel="stylesheet" href="style4.css">
      <link rel="stylesheet" href="nav.css">
          <link rel="stylesheet" href="toggle.css">
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
  <?php
  if ($_COOKIE['user'] == ''):
    $someerror="Введите логин и пароль";
  Header("Location: /eng.php?get=$someerror");
  ?>

<?php else:
 ?>
 <div style="opacity:1;" class="buttons2">
 <button type="submit" onclick=" window.location.href = '..';" class="button10" name="somebutton"><span class="padding">Домой</span></button>
 <button type="submit" onclick=" window.location.href = 'exit2.php';" class="button10" name="somebutton"><span class="padding">Выйти</span></button>
 </div>
 <div class="mainphoto">
 <img id="mainphoto" src="" alt="">
 </div>
<div class="centerok">
  <div class="heighrus">
    <div id ="russiaword" class="russiaword"></div>
  </div>
  <div class="engtitle">Введите через какое время хотите повторить слово</div>
 <div class="group">
   <input id="word" type="text" name="word" required autofocus>
   <span class="highlight"></span>
   <span class="bar"></span>
   <label id = 'label'>Введите количество дней</label>
 </div>

  <div href="#" class="btn-flip" data-back="Часы" data-front="Дни"></div>
<div style="display:flex;">
<div class="wrapper2">
  <button class="wrapbut" onclick=" window.location.href = 'english.php';"><span><i type="arrow" style="float:left;padding-left:5px;padding-top:9px;" class="fas fa-arrow-left"></i>Назад</span></button>
</div>
<div class="wrapper">
  <button class="wrapbut" onclick="$('#translate').css('display','none');" id = "upload"><span>Следующее<i type="arrow" style="float:right;padding-right:5px;padding-top:9px;" class="fas fa-arrow-right"></i></span></button>
</div>
</div>
<div class="wrapper3">
  <button onclick="$('#translate').css('display','block');" class="wrapbut"><span>Показать слово<i type="arrow" class="fas fa-eye"></i></span></button>
</div>
  <div id ="translate" class="outputword"></div>
</div>
<?php endif;?>
</body>
</html>
<script type="text/javascript">
var curid = -1;
function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
var smenahtml = false;
$.ajax({

            url: 'setdatadb.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            type: 'post',
            success: function(php_script_response){
              var data = JSON.parse(php_script_response);

                document.querySelector('#mainphoto').src = '/'+getCookie('user')+'/'+data['eng']+data['type'];
                $('#translate').html(data['eng']);
                  $('#russiaword').html(data['trans']);
                  curid = data['id'];
            }
 });

$('#upload').on('click', function() {
    document.getElementById("word").focus();
smenahtml = true;
var fd = new FormData;
fd.append('repeat',curid);

if (document.getElementById("word").value != ''){
fd.append('dat',document.getElementById("word").value);
}
else
{
  fd.append('dat',0);
}
$.ajax({
            url: 'setdatadb.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            type: 'post',
            data:fd,
            success: function(php_script_response){
              var data = JSON.parse(php_script_response);
                $('#translate').html(data['eng']);
                document.querySelector('#mainphoto').src = '/'+getCookie('user')+'/'+data['eng']+data['type'];
                    $('#russiaword').html(data['trans']);
                      curid = data['id'];
            }
 });
 $.ajax({

             url: 'updateday.php',
             dataType: 'text',
             cache: false,
             contentType: false,
             processData: false,
             type: 'post',
             data:fd,
             success: function(php_script_response){

             }
  });
    document.getElementById("word").value = "";
});
document.addEventListener('keydown', function(event) {
if(event.key == 'Enter')
{

  smenahtml = true;
  var fd = new FormData;
  fd.append('repeat',curid);
  if ('dat',document.getElementById("word").value != ''){
  fd.append('dat',document.getElementById("word").value);
  }
  else
  {
    fd.append('dat',0);
  }
  $.ajax({
              url: 'setdatadb.php',
              dataType: 'text',
              cache: false,
              contentType: false,
              processData: false,
              type: 'post',
              data:fd,
              success: function(php_script_response){
                var data = JSON.parse(php_script_response);
                  $('#translate').html(data['eng']);
                  document.querySelector('#mainphoto').src = '/'+getCookie('user')+'/'+data['eng']+data['type'];
                      $('#russiaword').html(data['trans']);
                        curid = data['id'];
              }
   });
   $.ajax({

               url: 'updateday.php',
               dataType: 'text',
               cache: false,
               contentType: false,
               processData: false,
               type: 'post',
               data:fd,
               success: function(php_script_response){

               }
    });
}
});
const nav = document.querySelector('nav')

</script>
