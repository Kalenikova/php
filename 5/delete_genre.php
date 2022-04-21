<?php
require 'rb.php';

R::setup('mysql:host=localhost;dbname=author', 'root', 'usbw');

if( !R::testConnection() ) 
{
    exit('Нет подключения к базе данных');
}

$title = $_POST['select'];
$find = R::findOne('genre', 'title = ?', [$title]);
$delete = R::load('genre', $find->id);
R::trash($delete);

header('location: genre.php');

?>