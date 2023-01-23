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
//12
$mysql = new mysqli('localhost', 'root', 'root', 'somebase');
$username = $_COOKIE['user'];
$name = filter_var(trim($_GET['name']), FILTER_SANITIZE_STRING);
$result = $mysql->query("SELECT * FROM `user` WHERE `name` = '$username'");
$mode = 0;
foreach ($result as $row) {
    $mode = $row['mode'];
}
if ($_COOKIE['user'] == '')://13
    ?>
    <div>  <?php
        $someerror = "У Вас нет доступа к странице администратора";
        echo $someerror;
        Header("Location: /admin.php?get=$someerror");
        ?></div><!-- 14 -->
<?php elseif ($mode == 1)://15
?>
<div class="container">

    <div class="mainmenu">
        <button style="margin-bottom:20px;" id="back" type="submit" class="button6" name="button">< Назад</button>

        <form class="buttons" action="add.php" method="POST">
            <div class="buttons">

                <div class="otstupinput">

                    <input type="send" class="yourname3" name="name" placeholder="Имя процессора" autocomplete="off">
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
                <div class="otstupinput">

                    <input type="send" class="yourname3" name="cores" placeholder="Cores" autocomplete="off">
                </div>
                <div class="otstupinput">

                    <input type="send" class="yourname3" name="frequency" placeholder="Frequency" autocomplete="off">
                </div>
                <div class="otstupinput">

                    <input type="send" class="yourname3" name="tdp" placeholder="TDP" autocomplete="off">
                </div>
                <div class="otstupinput">

                    <input type="send" class="yourname3" name="threads" placeholder="Threads" autocomplete="off">
                </div>
                <div class="otstupinput">

                    <input type="send" class="yourname3" name="cost" placeholder="Cost" autocomplete="off">
                </div>
                <div class="otstupinput">

                    <input type="send" class="yourname3" name="warrante" placeholder="Warrante" autocomplete="off">
                </div>
                <div class="otstupinput">

                    <input type="send" class="yourname3" name="date" placeholder="Date" autocomplete="off">
                </div>
                <div class="otstupinput">

                    <input type="send" class="yourname3" name="L2" placeholder="L2" autocomplete="off">
                </div>
                <div class="otstupinput">

                    <input type="send" class="yourname3" name="L3" placeholder="L3" autocomplete="off">
                </div>
                <div class="otstupinput">

                    <input type="send" class="yourname3" name="techproc" placeholder="Techproc" autocomplete="off">
                </div>
                <div class="otstupinput">

                    <input type="send" class="yourname3" name="count" placeholder="Count" autocomplete="off">
                </div>
                <div class="otstupinput">

                    <input type="send" class="yourname3" name="photo" placeholder="Photo" autocomplete="off">
                </div>
                <button id="upload" type="submit" class="closing-button" name="button"><span>Добавить товар</span>
                </button><!-- 16 -->
            </div>
        </form>
        <div class="addm">
            <div>Загрузите фото товара
                <input id="sortpicture" type="file" name="sortpic"/>
            </div>
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
        $query = $query . ' LIMIT '.$offset.', '.$size_page;
        $result = $mysql->query($query);
        foreach ($result as $row) {
            $somefam = getColumnName($famcpu,$row['famid'],'famid','famname');
            $somemem = getColumnName($memory,$row['memoryid'],'memid','memname');
            $somesocket = getColumnName($sockets,$row['socketid'],'socketid','socketname');
            $someman = getColumnName($mancpu,$row['manid'],'cpumanid','mancpuname');
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
              <div style='display: flex;margin-top: 10px;'>
             <form style='margin-right:10px;' style='width:300px;' class='buttons' action='delete.php' method='POST'>
                    <button type='submit' name='name' value='" . $row['id'] . "' class='button6'>Удалить</button>
             </form>
             <div style='margin-right:10px;' class='buttons' >
                    <button type='submit' name='countplus' value='" . $row['id'] . "' class='btn-new3'>Добавить 1 товар</button>
             </div>
             <div style='margin-right:10px;' class='buttons'>
                    <button type='submit' name='countminus' value='" . $row['id'] . "' class='btn-new3'>Убрать 1 товар</button>
             </div>
             </div>
            </div>
           </div>
            </div>";
            echo $vari;

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
    <?php elseif ($mode == 0)://17
        ?>
        <div class="titleheader">
            Ваш уровень доступа недостаточен для использования данных функций
        </div>
    <?php endif; ?>
</body>
</html>
<script type="text/javascript">
    $('#back').on('click', function () {
        location.href = "/admin.php";

    });
    $('.checklist').on('click', function () {
        $('input', this).attr("checked", function () {
            return !$(this).attr("checked");
        });
    });
    $("#sortpicture").change(function () {
        var fileName = $(this).val().split('/').pop().split('\\').pop();
        $('[name=photo]').val(fileName);
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
    $('#upload').on('click', function () {
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
            success: function (php_script_response) {

            }
        });
    });
</script>
