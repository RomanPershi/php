<?php

    if ( 0 < $_FILES['file']['error'] ) {

    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'],preg_replace('/\s+/', '',$_COOKIE['user']."/".$_POST["someField"]));
    }

?>
