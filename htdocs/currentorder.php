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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<script src="https://kit.fontawesome.com/89705fe93f.js" crossorigin="anonymous"></script>
<body class="admin">
<?php

if ($_COOKIE['user'] == ''):
    ?>

    <div class="header">
        <div class="container">

            <div class="titleheader">
                Введите свой логин и пароль
            </div>
            <form class="buttons" action="auth.php" method="POST">
                <div class="buttons">
                    <div class="inputgrid">
                        <div class="nameorsub">
                            <input type="send" class="yourname" name="login" id="login" placeholder="Your Login"
                                   autocomplete="off">
                        </div>
                        <div class="">

                        </div>
                        <div class="nameorsub">
                            <input type="send" class="yourname" name="pass" id="pass" placeholder="Your Password"
                                   autocomplete="off">
                        </div>
                    </div>
                    <div class="biginput">
                    </div>
                    <?php
                    $get = $_GET['get'];
                    $vivod = "<span class='errorclass'>" . $get . "</span>";
                    echo $vivod;
                    ?>
                    <div class="butoniouse5">
                        <button type="submit" class="button9" name="button">Войти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php else:
    $mysql = new mysqli('localhost', 'root', 'root', 'somebase');
    $name = filter_var(trim($_GET['name']), FILTER_SANITIZE_STRING);
    $username = $_COOKIE['user'];
    $result = $mysql->query("SELECT * FROM `user` WHERE `name` = '$username'");
    $mode = 0;
    foreach ($result as $row) {
        $mode = $row['mode'];
    }
    if ($mode == 0) {
        $someerror = "У Вас нет доступа к странице главного администратора";
        echo $someerror;
        Header("Location: /admin.php?get=$someerror");
    }
    ?>
    <div class="container">
        <button style="margin-bottom:20px;" id="back" type="submit" class="button6" name="button">< Назад</button>

        <div class="maininfo">
            <?php
            function getColumnName($table, $foreign_incpu, $id_table, $title_table)
            {
                foreach ($table as $row) {
                    if ($row[$id_table] == $foreign_incpu)
                        return $row[$title_table];
                }
            }
            function getUser($user_id, $result)
            {
                foreach ($result as $row) {
                    if ($row['id'] == $user_id) {
                        return $row['name'];
                    }
                }
            }
            function getProduct($query,$ids)
            {
                $bufer = true;
                foreach ($ids as $row)
                {
                    if($bufer)
                    {
                        $bufer = false;
                        $query = $query." (";
                        $buf_id = $row['productid'];
                        $query=$query."`id` = '$buf_id'";
                    }
                    else{
                        $buf_id = $row['productid'];
                        $query=$query." or `id` = '$buf_id'";
                    }
                }
                $query = $query.')';
                return $query;
            }
            $user = $_POST['username'];
            $orderid = $_POST['someid'];
            $query = "SELECT * FROM `orders` WHERE `id` = '$orderid'";
            $result = $mysql->query($query);
            $query = "SELECT * FROM `products_orders` WHERE `orderid` = '$orderid'";
            $products_id = $mysql->query($query);
            $query = "SELECT * FROM `newcpu` WHERE";
            $query = getProduct($query,$products_id);
            $products = $mysql->query($query);
            foreach ($result as $row) {
                $vari = "<div style='height: 100%;width: 100%;' class='order_block'>
          <div class='order_otstup'>
           <div class='order_button'>
          Номер заказа:" . $row['id'] . "<br />
            Имя пользователя:" . $user . "<br /> Дата:" . $row['date'];
                $count = 0;
                foreach ($products as $products_part)
                {
                    $vari = $vari."<br />".$products_part['name'];
                    $count = $count + $products_part['cost'];
                }
                $vari = $vari."<br /> Прибыль:".$count." Рублей";
                $vari = $vari." </div>
            </div>
           </div>";
                echo $vari;
            }
            ?>
        </div>
    </div>
<?php endif; ?>
</body>
</html>
<script type="text/javascript">
    $('#back').on('click', function () {
        location.href = "/orders.php";
    });
</script>
