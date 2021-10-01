<?php
    global $db;
    $q = $db->query("SELECT * FROM users");
    $user = $q->fetch();
 ?>
