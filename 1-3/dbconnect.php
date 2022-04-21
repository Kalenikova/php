<?php
//Устанавливаем доступы к базе данных:
  $server = 'localhost'; //имя хоста, на локальном компьютере это localhost
  $username = 'root'; //имя пользователя, по умолчанию это root
  $password = 'usbw'; //пароль
  $dbName = 'author'; //имя базы данных

  //Соединяемся с базой данных используя наши доступы:
  $connect = mysqli_connect($server, $username, $password, $dbName)
    or die(mysqli_error($connect));
  mysqli_query($connect, "SET NAMES 'utf8'");
  // Ругаемся, если соединение установить не удалось
  if (!$connect) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
  }
  ?>