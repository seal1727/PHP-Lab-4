<?php

    include "./db_connection.php";

    $current_page1 = $_SERVER["REQUEST_URI"];
    $current_page = explode("/", $current_page1);

