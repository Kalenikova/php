<?php
require 'connect.php';

$author = R::load('author',$_POST['id']);
$author->name = $_POST['Name'];
$author->surname = $_POST['Surname'];
$author->midname = $_POST['Midname'];
$author->date_born = $_POST['date_born'];
$author->date_die = $_POST['date_die'];
R::store($author);

header('Location: index.php');
?>