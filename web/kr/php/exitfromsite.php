<?php
    session_start();
    if ($_SESSION != null){
        if ($_SESSION['user'] == true){
            session_unset();
            session_destroy();
            echo '<meta http-equiv="refresh" content="0;URL=http://localhost:8888/krWEB/index.php">';
        }
    }
    ?>
