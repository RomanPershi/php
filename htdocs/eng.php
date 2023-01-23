<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Сайт для изучения языка</title>

    <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="nav.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext'>

      <link rel="stylesheet" href="css/style.css">


</head>

<body>
  <?php
  if ($_COOKIE['user'] == ''):

  ?>

  <article>
     <div class="menu">
       <input id="menu--toggle"
              type="checkbox" />
       <label class="menu--toggle__trigger"
              for="menu--toggle"></label>
       <label class="menu--toggle__burger"
              for="menu--toggle"></label>


       <ul class="menu__body">
         <li class="menu__body-element">
           <a class="menu__body-link"
              href=".."
              target="_blank">
             Домой
           </a>
         </li>
         <li class="menu__body-element">
           <a class="menu__body-link"
              href="#"
              target="_blank">
            Инструкция
           </a>
         </li>
       </ul>
     </div>
   </article>

  <div class="materialContainer">

   <div class="box">

      <div class="title">ВХОД</div>
<form id="myform" class="" action="checker.php" method="post">
      <div class="input">

         <input type="text" name="login" id="name" placeholder="Имя пользователя">
         <span class="spin"></span>
      </div>


      <div class="input">

         <input type="password" placeholder="Пароль" name="pass" id="pass" >
         <span class="spin"></span>
      </div>

      <?php
    $get = $_GET['get'];
    $vivod="<span class='errorclass'>".$get."</span>";
    echo $vivod;
         ?>
      <div class="button login">
         <button id ="actionbutton"><span>ВОЙТИ</span></button>
      </div>

</form>

   </div>
<form class="" action="reg.php" method="post">
   <div class="overbox">
      <div class="material-button alt-2"><span class="shape"></span></div>

      <div class="title">РЕГИСТРАЦИЯ</div>

      <div class="input">
         <label for="regname">Логин</label>
         <input type="text" name="reglogin" id="regname" >
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="regpass">Пароль</label>
         <input type="password" name="regpass" id="regpass" >
         <span class="spin"></span>
      </div>

      <div class="button">
         <button><span>ЗАРЕГИСТРИРОВАТЬСЯ</span></button>
      </div>


   </div>
</form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
  <?php else:

  Header("Location: /english.php");
   ?>

   <?php endif;?>
</body>

</html>
