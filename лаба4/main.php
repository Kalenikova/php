<?php 

// 12.	Создайте абстрактный класс AUser, 
// объявите в нем абстрактный метод showInfo().
abstract class AUser {
    abstract function showInfo();
}

// 13.	Обновите класс User, унаследовав его от абстрактного класса AUser. 
// Внесите в класс User необходимые изменения. Запустите код и проверьте его работоспособность.
class User extends AUser {
    public $login, $password, $email;
    function __construct($login = "", $password = "", $email = "") {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
         // В конструкторе класса User генерируйте исключение, если введены не все данные.
        try {
            if ($login == "" || $password == "" || $email == "") throw new Exception("введены не все данные");
        }catch(Exception $e) {
            echo "Произошла ошибка - ",
            $e->getMessage();
        }
    }
    // В классе User опишите метод __clone().Значения свойств по умолчанию: email –"Guest", login – "guest", password – "qwerty".
    function __clone() {
        $this->email = "Guest";
        $this->login = "guest";
        $this->password = "qwerty";
    }
    // Создайте методы доступа к свойствам класса
    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }
    // Создайте метод, позволяющий вывести значения свойств объекта
    function getFieldsObj() {
        echo "Login: $this->login <br> Password: $this->password <br> Email: $this->email";
    } 

    function showInfo() {
        echo "Class User contains fields login, password, email and methods getLogin(), getPassword(), getEmail(), getFieldsObj()";
    }
   
}

// Создайте класс SuperUser – наследник класса User.
//  Опишите свойство роль и создайте экземпляр класса SuperUser со свойством роль – админ. 
//  Распечатайте объект.

class SuperUser extends User {
    public $role;
    function __construct($role) {
        $this->role = $role;
        echo "<br> Role: $this->role";
    }
}

$obj = new User("Anastasia", "123", "kalenikova200@gmail.com"); // Экземпляр класса
 $user = clone $obj; // Клонирование объекта
 echo "<br>";
 $obj->showInfo();
 $user->getFieldsObj();
 $superUser = new SuperUser("admin");
 $user2 = new User();
 $user2->getFieldsObj();
 echo "$obj->login $obj->password $obj->email";
 print($obj->getLogin());
 print($obj->getPassword());
 print($obj->getEmail());
 $obj->getFieldsObj();
?>