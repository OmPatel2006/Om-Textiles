<?php
    session_start();

    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'Homepage';
    include $page . '.php';
?>  