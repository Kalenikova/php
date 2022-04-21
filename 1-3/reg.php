<!doctype html>
<html lang="ru">

<head>
    <title>Библиотека</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <?php

    $server = 'localhost'; //имя хоста, на локальном компьютере это localhost
    $username = 'root';
    $password = 'usbw';
    $dbName = 'author';


    $connect = mysqli_connect($server, $username, $password, $dbName)
        or die(mysqli_error($connect));
    mysqli_query($connect, "SET NAMES 'utf8'");

    if (isset($_POST['reg'])) {
        $err = [];

        // проверям логин
        if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
            $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        }

        if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
            $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
        }

        if (empty($_POST['email']))
            $err[] = 'Поле Email не может быть пустым!';
        else {
            if (!preg_match("/^[a-z0-9_.-]+@([a-z0-9]+\.)+[a-z]{2,6}$/i", $_POST['email']))
                $err[] = 'Не правильно введен E-mail' . "\n";
        }

        if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['pass'])) {
            $err[] = "Пароль должен состоять только из латинских букв и цифр";
        }
        if (strlen($_POST['pass']) < 5) {
            $err[] = "Пароль должен быть не меньше 5 символов ";
        }


        // проверяем, не сущестует ли пользователя с таким именем
        $query = mysqli_query($connect, "SELECT id_u FROM users WHERE login='" . mysqli_real_escape_string($connect, $_POST['login']) . "'");
        if (mysqli_num_rows($query) > 0) {
            $err[] = "Пользователь с таким логином уже существует в базе данных";
        }

        // Если нет ошибок, то добавляем в БД нового пользователя
        if (count($err) == 0) {

            $login = $_POST['login'];
            $email = $_POST['email'];

            // Убераем лишние пробелы и делаем двойное хеширование
            $password = md5(md5(trim($_POST['pass'])));

            mysqli_query($connect, "INSERT INTO users SET login='" . $login . "',email='" . $email . "', pass='" . $password . "'");
            exit();
        } else {
            print "<b>При регистрации произошли следующие ошибки:</b><br>";
            foreach ($err as $error) {
                print $error . "<br>";
            }
        }
    }
    ?>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Библиотека</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Домой</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Авторы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="books.php">Книги</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="genres.php">Жанры</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-item nav-link active" href="login.php">Вход <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-item nav-link active" href="reg.php">Регистрация <span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    //Проверяем, если пользователь не авторизован, то выводим форму регистрации, 
    //иначе выводим сообщение о том, что он уже зарегистрирован
    if (!isset($_SESSION["email"]) && !isset($_SESSION["pass"])) {
    ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <!-- Форма регистрации -->
                    <h2>Форма регистрации</h2>
                    <form action="" method="post" name="reg">
                        <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" required="required"><br>

                        <input type="email" class="form-control" name="email" id="email" placeholder="Введите Email" required="required"><br>

                        <input type="pass" class="form-control" name="pass" id="pass" placeholder="Введите пароль" required="required"><br>

                        <button class="btn btn-success" name="reg" type="submit">Зарегистрировать</button>
                    </form>
                    <br>
                    <p>Если вы зарегистрированы, тогда нажмите <a href="login.php">здесь</a>.</p>
                    <p>Вернуться на <a href="index.php">главную</a>.</p>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div id="authorized">
            <h2>Вы уже зарегистрированы</h2>
        </div>
    <?php
    }
    ?>