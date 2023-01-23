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
    ?>


    <div class="container">

        <div class="mainmenu">
                <button style="margin-bottom:20px;" id="back" type="submit" class="button6" name="button">< Назад</button>
            <form class="buttons" action="orders.php" method="GET">
                <div class="buttons">
                    <div class="otstupinput">
                        <input style="margin-bottom: 20px;" type="send" class="yourname3" name="name" placeholder="Имя пользователя"
                               autocomplete="off">
                    </div>
                    <?php
                    $sockets = $mysql->query("SELECT * FROM `sockets`");
                    $memory = $mysql->query("SELECT * FROM `memory`");
                    $famcpu = $mysql->query("SELECT * FROM `famcpu`");
                    $mancpu = $mysql->query("SELECT * FROM `cpuman`");
                    function getCheck($column)
                    {

                        if (strlen($_GET[$column] > 0)) {
                            return 'checked';
                        }
                        return NULL;
                    }
                    $get_data = false;
                    ?>
                    <button type="submit" class="btn-new" >Найти</button>
                </div>
            </form>
                <div class="addm">
                    <form class="" action="insert.php" method="post">
                        <button type="submit" class="btn-new2" name="button">Добавить товар</button>
                    </form>
                </div>
                <div class="addm">
                    <form class="" action="register.php" method="post">
                        <button type="submit" class="btn-new2" name="button">Добавить пользователя</button>
                    </form>
                </div>
        </div>
        <div class="maininfo">
            <?php
            function getProducts($table,$column,$query,$columnid)
            {
                $firstquery = true;
                foreach ($table as $row) {
                    if (strlen($_GET[preg_replace('/\s+/', '', $row[$column])]) > 0) {
                        if ($firstquery == true) {
                            $firstquery = false;
                            $query = $query . ' and (';
                        } else {
                            $query = $query . " or ";
                        }
                        $query = $query . "`".$columnid."` = '" . $_GET[preg_replace('/\s+/', '', $row[$column])] . "'";
                    }
                }
                if ($firstquery == false) {
                    $query = $query . ")";
                }
                return $query;
            }
            function getColumnName($table,$foreign_incpu,$id_table,$title_table)
            {
                foreach ($table as $row) {
                    if($row[$id_table] == $foreign_incpu)
                        return $row[$title_table];
                }
            }
            $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $link = $url;
            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
                if(strpos($url,'?')){
                    if(strpos($url,'&pageno')) {
                        $link = strstr($url, '&pageno', true).'&pageno=';
                    }
                    else {
                        $link = strstr($url, 'pageno', true) . '&pageno=';
                    }
                }
                else{
                    $link = '?pageno=';
                }
            } else {
                $pageno = 1;
                if(strpos($url,'?')) {
                    $link = $url . '&pageno=';
                }
                else{
                    $link = $url . '?pageno=';
                }
            }
            function getOrder($result,$query,$name)
            {
                $bufer = true;
                foreach ($result as $row) {
                    if($bufer)
                    {
                        $bufer = false;
                        $query = $query." WHERE (";
                        $userid = $row['id'];
                        $query = $query."`userid` = '$userid'";
                    }
                    else {
                        $userid = $row['id'];
                        $query = $query . " or `userid` = '$userid'";
                    }
                }
                if($bufer == false)
                {
                    $query = $query.")";
                }
                if ($bufer && (strlen($name) >= 1))
                {
                    return 'no found';
                }
                return $query;
            }
            function getUser($user_id,$result)
            {
            foreach ($result as $row) {
                if($row['id'] == $user_id)
                {
                 return $row['name'];
                }
            }
            }
            $size_page = 5;
            $offset = ($pageno-1) * $size_page;
            $pages_sql = "SELECT COUNT(*) FROM `orders` ";
            $users = $mysql->query("SELECT * FROM `user` WHERE `name` like '%$name%'");
            $pages_sql = getOrder($users,$pages_sql,$name);
            if ($pages_sql != 'no found')
            {
                $result = $mysql->query($pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $size_page);
                $query = "SELECT * FROM `orders`";
                $query = getOrder($users, $query,$name);
                $query = $query . ' LIMIT ' . $offset . ', ' . $size_page;
                $result = $mysql->query($query);
                foreach ($result as $row) {
                    $vari = "<div class='order_block'>
          <div class='order_otstup'>
            <form class='buttons' action='currentorder.php' method='POST'>
            <input type='text' name='username' style='display: none;' value=".getUser($row['userid'], $users) .">
           <button type='submit' value=".$row['id']." name='someid' class='order_button'>
          Номер заказа:" . $row['id'] . "<br />
            Имя пользователя:" . getUser($row['userid'], $users) . "<br /> Дата:" . $row['date'] . "
             </button>
             </form>
            </div>
           </div>
          ";
                    echo $vari;
                    }
            }
            ?>
            <ul style=" margin-left: 35%;" class="pagination">
                <li><a href="<?php echo $link.'1' ?>">First</a></li>
                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo $link.($pageno - 1); } ?>">Prev</a>
                </li>
                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo $link.($pageno + 1); } ?>">Next</a>
                </li>
                <li><a href=<?php echo $link.$total_pages; ?>>Last</a></li>
            </ul>
        </div>
    </div>
<?php endif; ?>
</body>
</html>
<script type="text/javascript">
    $('#back').on('click', function () {
        location.href = "/admin.php";

    });
</script>
