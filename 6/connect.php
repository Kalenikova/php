<?php
require 'lib/rb.php';
require 'constdb.php';
R::setup('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
if (!R::testConnection()){
    exit('<br>Нет соединения с базой данных<br>');
};
?>