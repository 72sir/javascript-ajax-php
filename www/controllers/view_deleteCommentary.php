<?php
    require_once __DIR__ . '/../functions/SQL.php';

    $user_id = $_POST['user_id'];
    $res = Sql_query("DELETE FROM `users` WHERE ID=" . $user_id . "");

    print json_encode($res);