<!doctype html>
<html lang="ru">

<head>
    <title>Библиотека</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
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

    $id = $_GET['com'];

    if (isset($_GET['com'])) {
        $sql = mysqli_query($connect, "SELECT * FROM `books` WHERE `id_b`={$_GET['com']}");
        $product = mysqli_fetch_array($sql);
      }       

      if (isset($_POST["send"])) {
        //Если это запрос на обновление, то обновляем
    
        $sql = mysqli_query($connect, "INSERT INTO `comments` (`id_b`, `comment`, `name`) VALUES ('{$_POST['id_b']}', '{$_POST['comment']}', '{$_POST['name']}')");
      }
 
    session_start();
    
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
                        <a class="nav-link" href="author.php">Авторы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="books.php">Книги</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="genres.php">Жанры</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-item nav-link active" href="logout.php">Выход <span class="sr-only"></span></a>
                    </li>
                </ul>
                <h4><span class="navbar-text">
                Hello, <?= $_SESSION['user']['login'] ?>!
                    </span></h4>
            </div>
        </div>
    </nav>

    <p>Title:<input type="text" name="Title" value="<?= isset($_GET['com']) ? $product['title'] : ''; ?>"></p>
    <form name="comment" action="" method="post">
  <p>
  <p>Name:<input type="name" name="name" value="<?= $_SESSION['user']['login'] ?>"></p>
  </p>
  <p>
    <label>Комментарий:</label>
    <br />
    <textarea name="comment"></textarea>
  </p>
  <p>
    <input type="hidden" name="id_b" value="<?= isset($_GET['com']) ? $product['id_b'] : ''; ?>"/>
    <button class="btn btn-outline-success" type="submit" name="send" value="Send">Send</button>
  </p>
</form>
<?php

$sql = mysqli_query($connect, "SELECT `comment`,`name` FROM `comments` WHERE `id_b` = '$id' ");
while ($result = mysqli_fetch_array($sql)) {
  echo "<tr><td>{$result['name']}:</td>
  <td>{$result['comment']}</td><br>";
}
?>
</body>
</html>