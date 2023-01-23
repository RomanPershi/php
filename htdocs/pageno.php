<html>
<head>
    <title>Pagination</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php

        $server = 'localhost'; // Имя или адрес сервера
        $user = 'root'; // Имя пользователя БД
        $password = 'root'; // Пароль пользователя
        $db = 'somebase'; // Название БД

        $db = mysqli_connect($server, $user, $password, $db); // Подключение
        // Check connection
        // Проверка на подключение
        if (!$db) {
            // Если проверку не прошло, то выводится надпись ошибки и заканчивается работа скрипта
            echo "Не удается подключиться к серверу базы данных!"; 
            exit;
        }

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }

        $size_page = 5;
        $offset = ($pageno-1) * $size_page;

        $pages_sql = "SELECT COUNT(*) FROM `newcpu`";
        $result = mysqli_query($db, $pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $size_page);

        $sql = "SELECT * FROM `newcpu` LIMIT $offset, $size_page";

        $res_data = mysqli_query($db, $sql);
        while($row = mysqli_fetch_array($res_data)){
            echo $row['name'] . '</br>';
        }
        mysqli_close($db);
    ?>
    <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</body>
</html>