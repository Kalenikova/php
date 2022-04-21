<?php 

// Задание 3
// Создайте класс Session – оболочку над сессиями. Он должен иметь следующие методы:
//  создать переменную сессии, получить переменную, удалить переменную сессии, проверить наличие переменной сессии. 
//  Сессия должна стартовать (session_start) в методе __construct. Продемонстрируйте пример работы класса.

class Session {
    // Старт сессии в конструкторе
    function __construct() {
        session_start();
    }

    // Установка значения переменных сессии с помощью $_SESSION
    function createSession($key, $value) {
        $_SESSION["$key"] = $value;
    }

    // Получение значения переменной сессии
    function getSession($key) {
        return $_SESSION["$key"];
    }

    // Проверка наличия переменной сессии
    function hasSession($key) {
        if(isset($_SESSION["$key"])) {
            echo "Переменная существует";
        } else {
            echo "Переменная не существует";
        }
    }

    // Удаление переменной сессии и завершении сессии
    function deleteSession() {
        session_unset();
        session_destroy();
    }
}

// $obj = new Session();
// $obj->createSession('id', '1');
// $obj->createSession('name', 'Anastasia');
// $d = $obj->getSession('id');
// echo "$d";
// echo "<br>";
// $obj->hasSession('pop');
// $obj->deleteSession();
// echo "<br>";
// print_r($_SESSION);

// Задание 4
// Реализуйте класс Flash, который будет использовать внутри себя класс Session из предыдущей задачи.
// Этот класс будет использоваться для сохранения сообщений в сессию и вывода их из сессии. Зачем это нужно: такой класс часто используется для форм.
//  Например на одной странице пользователь отправляет форму, мы сохраняем в сессию сообщение об успешной отправке, 
//  редиректим пользователя на другую страницу и там показываем сообщение из сессии
// Класс должен иметь два метода – setMessage, который сохраняет сообщение в сессию и getMessage, который получает сообщение из сессии.

class Flash extends Session {

    function __construct() {
        parent::__construct();
    }

    function setMessage($message) {
        $_SESSION["message"] = $message;
    }

    function getMessage() {
        return $_SESSION["message"];
    }
}

$flash = new Flash();

$flash->setMessage('Успешно');
$f = $flash->getMessage();
echo "$f";

?>