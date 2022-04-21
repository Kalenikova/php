<?php 

require 'rb.php';

R::setup('mysql:host=localhost;dbname=author', 'root', 'usbw');

if( !R::testConnection() ) 
{
    exit('Нет подключения к базе данных');
}

$surname = $_POST['surname'];
$name = $_POST['name'];
$midname = $_POST['midname'];
$date_born = $_POST['date_born'];
$date_die = $_POST['date_die'];

$author = R::load('author', $id);
$author->surname = $surname;
$author->name = $name;
$author->midname = $midname;
$author->date_born = $date_born;
$author->date_die = $date_die;
R::store($author);

header('location: index.php');

?>