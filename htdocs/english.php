<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Сайт для изучения языка</title>
  <link rel="stylesheet" href="style3.css">
      <link rel="stylesheet" href="nav.css">
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
<div class="centerok">
  <div class="engtitle">Добавить слово и ассоциацию</div>
 <div class="group">
   <input id="word" type="text" name="word" required autofocus>
   <span class="highlight"></span>
   <span class="bar"></span>
   <label>Введите слово</label>
 </div>
 <input type="text" id = 'trans' name="trans" placeholder="Перевод слова(Необезательно)">
 <input type="file" id="document_attachment_doc" />

<button id = "upload" class="custom-btn btn-5" name="commit" value="Submit" >Загрузить</button>
<div class="wrapper">
  <button onclick=" window.location.href = 'testing.php';" href="#"><span>Перейти к запоминанию<i style="float:right;padding-right:5px;padding-top:9px;" type="rightarrow" class="fas fa-arrow-right"></i></span></button>
</div>
  <img style="display: none;margin-top: 5px;height:100%;width:100%;" id="blah" src="#" alt="" />

</div>
<?php endif;?>
</body>
</html>
<script type="text/javascript">
var smenahtml = false;
const form = document.getElementById("new_document_attachment");
const fileInput = document.getElementById("document_attachment_doc");
$('#upload').hover( function() {
  if (smenahtml){
    $(this).html('Загрузить');
smenahtml = false;
  }
});
$('#upload').on('click', function() {
  $(this).html('<i class="far fa-thumbs-up"></i>');
smenahtml = true;
    var file_data = $('#document_attachment_doc').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    form_data.append("sometext",document.getElementById('word').value);
    var fd = new FormData;
fd.append('file', file_data);
fd.append('someField', document.getElementById('word').value);
fd.append('trans', document.getElementById('trans').value);
$.ajax({
            url: 'load.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: fd,
            type: 'post',
            success: function(php_script_response){
            }
 });

});
const nav = document.querySelector('nav')

document_attachment_doc.onchange = evt => {
  const [file] = document_attachment_doc.files
  if (file) {
    blah.src = URL.createObjectURL(file);
    $('#blah').css('display','block');
  }
}


window.addEventListener('paste', e => {
  fileInput.files = e.clipboardData.files;
  const [file] = document_attachment_doc.files
  if (file) {
    blah.src = URL.createObjectURL(file);
          $('#blah').css('display','block');
  }
});
</script>
