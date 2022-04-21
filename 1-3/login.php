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
<?php
$server = 'localhost'; //имя хоста, на локальном компьютере это localhost
$username = 'root';
$password = 'usbw';
$dbName = 'author';


$connect = mysqli_connect($server, $username, $password, $dbName)
  or die(mysqli_error($connect));
mysqli_query($connect, "SET NAMES 'utf8'");
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
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



<div class="container mt-4">
            <div class="row">
                <div class="col">
                    <h2>Авторизация</h2>
                    <form action="signin.php" method="post" name="login">
                        <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" required="required"><br>

                        <input type="pass" class="form-control" name="pass" id="pass" placeholder="Введите пароль" required="required"><br>

                        <button class="btn btn-success" name="enter" type="submit">Войти</button>
                        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
                    </form>
                    <br>
                    <p>Вернуться на <a href="index.php">главную</a>.</p>
                </div>
            </div>
        </div>