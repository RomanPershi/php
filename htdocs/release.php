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
            <form class="buttons" action="release.php" method="GET">
                <div class="buttons">
                    <div class="otstupinput">
                        <input type="send" class="yourname3" name="name" placeholder="Имя процессора"
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
                    function getFilterForm($menubartitle, $table, $column, $column_id,$get_data)
                    {
                        echo "<div class='menubartitle'>" . $menubartitle . "</div>";
                        echo "<div class='obvod'>";
                        foreach ($table as $row) {
                            echo "<div>";
                            echo '<div class="checklist" type="checklist">';
                            echo '<input '.getCheck(preg_replace('/\s+/', '', $row[$column])).' type="radio" class="checher" name="'  . preg_replace('/\s+/', '', $row[$column]) . '" value="' . $row[$column_id] . '" autocomplete="off">';

                            echo '<span class="checkname">' . $row[$column] . '</span>';
                            echo "</div>";
                            echo "</div>";
                            if (getCheck(preg_replace('/\s+/', '', $row[$column])) == 'checked')
                            {
                                $get_data = true;
                            }
                        }
                        echo "</div>";
                        return $get_data;
                    }
                    $get_data = false;
                    $get_data = getFilterForm('Сокет', $sockets, 'socketname','socketid',$get_data);
                    $get_data = getFilterForm('Тип памяти', $memory, 'memname','memid',$get_data);
                    $get_data = getFilterForm('Семейство процессора', $famcpu, 'famname','famid',$get_data);
                    $get_data = getFilterForm('Производитель', $mancpu, 'mancpuname','cpumanid',$get_data);
                    ?>
                    <button type="submit" class="btn-new" >Найти</button>
                </div>
            </form>
            <?php
            if ($mode == 1):?>
                <div class="addm">
                    <form class="" action="insert.php" method="post">
                        <button type="submit" class="btn-new2" name="button">Добавить товар</button>
                    </form>
                </div>
            <?php else:  ?>
                <div class="addm">
                    <form class="" action="giverelease.php" method="post">
                        <button type="submit" class="btn-new2" name="button">Оформить заказ</button>
                    </form>
                </div>
            <?php endif; ?>
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
            function getOrder($mysql)
            {
                $cooka = $_COOKIE['user'];
                $result = $mysql->query("SELECT * FROM `user` WHERE `name` = '$cooka'");
                $userid = NULL;
                foreach ($result as $row) {
                    $userid = $row['id'];
                }
                $result = $mysql->query("SELECT * FROM `orders` WHERE `userid` = '$userid'");
                $orderid = NULL;
                foreach ($result as $row) {
                    $orderid = $row['id'];
                }
                if ($orderid == NULL) {
                    $mysql->query("INSERT INTO `orders` (`userid`) VALUES ('$userid');");
                    $result = $mysql->query("SELECT * FROM `orders` WHERE `userid` = '$userid'");
                    foreach ($result as $row) {
                        $orderid = $row['id'];
                    }
                }
                $result = "SELECT * FROM `products_orders` WHERE `orderid` = '$orderid'";
                return $result;
            }
            function compareid($order_query, $product_id)
            {
                foreach ($order_query as $row) {
                    if ($row['productid'] == $product_id) {
                        echo "some";
                        return true;
                    }
                }
                return false;
            }
            function addLimitation($mysql,$query)
            {
                $mysql = new mysqli('localhost', 'root', 'root', 'somebase');
                $cooka = $_COOKIE['user'];
                $result = $mysql->query("SELECT * FROM `user` WHERE `name` = '$cooka'");
                $userid = NULL;
                foreach ($result as $row) {
                    $userid = $row['id'];
                }
                $result = $mysql->query("SELECT * FROM `orders` WHERE `userid` = '$userid'");
                $orderid = NULL;
                foreach ($result as $row) {
                    $orderid = $row['id'];
                }
                if ($orderid == NULL) {
                    $mysql->query("INSERT INTO `orders` (`userid`) VALUES ('$userid');");
                    $result = $mysql->query("SELECT * FROM `orders` WHERE `userid` = '$userid'");
                    foreach ($result as $row) {
                        $orderid = $row['id'];
                    }
                }
                $bufer = true;
                $result = $mysql->query("SELECT * FROM `products_orders` WHERE `orderid` = '$orderid'");
                foreach ($result as $row)
                {
                    if ($bufer)
                    {
                        $bufer = false;
                        $query = $query.' and (';
                    }
                    else{
                        $query = $query." or ";
                    }

                    $query = $query."`id` = ".$row['productid'];
                }
                if ($bufer == false) {
                    $query = $query . ')';
                }
                return $query;
            }
            $size_page = 5;
            $offset = ($pageno-1) * $size_page;
            $pages_sql = "SELECT COUNT(*) FROM `newcpu` WHERE `name` like '%$name%'";
            $pages_sql = getProducts($famcpu,'famname',$pages_sql,'famid');
            $pages_sql = getProducts($memory,'memname',$pages_sql,'memoryid');
            $pages_sql = getProducts($mancpu,'mancpuname',$pages_sql,'manid');
            $pages_sql = getProducts($sockets,'socketname',$pages_sql,'socketid');
            $result = $mysql->query($pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $size_page);
            $query = "SELECT * FROM `newcpu` WHERE `name` like '%$name%'";
            $query = getProducts($famcpu,'famname',$query,'famid');
            $query = getProducts($memory,'memname',$query,'memoryid');
            $query = getProducts($mancpu,'mancpuname',$query,'manid');
            $query = getProducts($sockets,'socketname',$query,'socketid');
            $query = addLimitation($mysql,$query);
            if(strripos($query,"`id` = ")) {
                $query = $query . ' LIMIT ' . $offset . ', ' . $size_page;
                $result = $mysql->query($query);
                $order_query = NULL;
                $order_query = getOrder($mysql);
                $order_query = $mysql->query($order_query);
                foreach ($result as $row) {
                    $somefam = getColumnName($famcpu, $row['famid'], 'famid', 'famname');
                    $somemem = getColumnName($memory, $row['memoryid'], 'memid', 'memname');
                    $somesocket = getColumnName($sockets, $row['socketid'], 'socketid', 'socketname');
                    $someman = getColumnName($mancpu, $row['manid'], 'cpumanid', 'mancpuname');
                    $vari = "<div class='blockm'>
          <div class='otstup'>

           <div class='photoblock' style='background:url(" . $row['photo'] . ") no-repeat;  background-size: 100%; '>

           </div>
           <div class='afterphoto'>
          Производитель:" . $someman . "<br />
            Процессор:" . $row['name'] . "<br /> Сокет:" . $somesocket . "
            <br />Ядра:" . $row['cores'] . "<br />Память:" . $somemem . "
            <br />Частота:" . $row['frequency'] . " Гц
            <br />Тепловыделение:" . $row['tdp'] . " TDP
            <br />Гарантия:" . $row['warrante'] . " месяцев
            <br />Год релиза:" . $row['date'] . "
              <br />Потоки:" . $row['threads'] . "
                <br />L2:" . $row['L2'] . "МБ
                  <br />L3:" . $row['L3'] . "МБ
                  <br />Тех процесс:" . $row['techproc'] . " нм
                                   <br />Количество на складе:<span class = 'stock'>" . $row['count'] . "</span>
                      <br />Цена:" . $row['cost'] . "
                          <br />Семейство:" . $somefam . "
          ";
                    $vari = $vari . "<div style='display: flex;margin-top: 10px;'>
              <button type='button' name='add_product' value='" . $row['id'] . "' class='button6'>Убрать</button>
             </div>";
                    $vari = $vari . " </div>
            </div>
           </div>";
                    echo $vari;

                }
            }
            else{
                Header("Location: /admin.php");
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
    $('[name=add_product]').on('click', function () {
        var product = $(this)[0].value;
        if($(this).html() == "Добавить") {
            var element = $(this).parent();
            var element = element.parent();
            element = $('.stock', element);
            element.html(Number(element.html()) - 1);
            $.ajax({
                url: 'put.php',
                type: 'POST',
                data: ({product: product}),
                success: function (php_script_response) {

                }
            });
            $(this).html('Убрать');
        }else{
            var element = $(this).parent();
            var element = element.parent();
            element = $('.stock', element);
            element.html(Number(element.html()) + 1);
            $(this).html('Добавить');
            $.ajax({
                url: 'unput.php',
                type: 'POST',
                data: ({product: product}),
                success: function (php_script_response) {

                }
            });
        }

    });

    $('[name=countplus]').on('click', function () {
        var countplus = $(this)[0].value;
        var element = $(this).parent();
        var element = element.parent();
        var element = element.parent();
        var element = element.parent();
        element = $('.stock', element);
        element.html(Number(element.html()) + 1)
        var countplus = $(this)[0].value
        $.ajax({
            url: 'countplus.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: ({countplus: countplus}),
            type: 'post',
            success: function (php_script_response) {

            }
        });
    });
    $('[name=countminus]').on('click', function () {
        var countplus = $(this)[0].value;
        var element = $(this).parent();
        var element = element.parent();
        var element = element.parent();
        var element = element.parent();
        element = $('.stock', element);
        if (Number(element.html()) > 0) {
            element.html(Number(element.html()) - 1)
        }
        $.ajax({
            url: 'countminus.php',
            type: "POST",
            data: ({countplus: countplus}),
            dataType: "html",
            success: function (php_script_response) {

            }
        });
    });
    $('.checklist').on('click', function () {
        $('input', this).attr("checked", function () {
            return !$(this).attr("checked");
        });
    });
</script>
