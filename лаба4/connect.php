<?php 

// <!-- Задание 2
// Создать класс-оболочку для работы с БД, минимальный функционал которого позволяет установить соединение с сервером и подключиться к БД,
//  а также выполнить методы: получение данных, удаление данных, редактирование данных, очистка таблицы. 
//  Продемонстрируйте пример работы класса. -->

class Connect {
    public $connect;

    // Подключание к базе данных
    function __construct($connect) {
        $this->connect = $connect;
        try {
            if (!$connect) throw new Exception('Error connect to database!');
        } catch(Exception $e) {
            echo "Произошла ошибка - ",
            $e->getMessage();
        }
    }

    // Получение данных из таблицы
    function getData($nameTable) {
        $data = mysqli_query($this->connect, "SELECT * FROM `$nameTable` ");
        $data = mysqli_fetch_all($data);
        foreach($data as $d) {
           echo "$d[0] $d[1] $d[2] $d[3]";
           echo "<br>";
        }
    }

    // Удаление данных из таблицы
    function deleteData($nameTable, $id) {
        $data = mysqli_query($this->connect, "DELETE FROM `$nameTable` WHERE `$nameTable`.`id` = '$id' ");
    }

    // Редактирование данных из таблицы
    function editData($nameTable, $id, $nameField, $valueField) {
        $data = mysqli_query($this->connect, "UPDATE `$nameTable` SET `$nameField` = '$valueField' WHERE `$nameTable`.`id` = '$id' ");
    }

    // Полная очитска строк из таблицы
    function clearData($nameTable) {
        mysqli_query($this->connect, "TRUNCATE TABLE `$nameTable`");
    }
}


$connect = mysqli_connect('localhost','root','','lab4');

$obj = new Connect($connect);

$obj->getData('user');
$obj->deleteData('user', 4);
$obj->editData('user', '3', 'name', 'Vladimir');
$obj->clearData('user');
?>