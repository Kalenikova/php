<?php
require 'connect.php';
$genre = R::load('genre',$_POST['id']);
R::trash($genre);
header('Location: genre.php');
