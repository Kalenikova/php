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
            <a class="nav-link" href="guest_author.php">Авторы</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="guest_books.php">Книги</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="guest_genres.php">Жанры</a>
          </li>
          <li class="nav-item active">
            <a class="nav-item nav-link active" href="login.php">Вход <span class="sr-only"></span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-item nav-link active" href="reg.php">Регистрация <span class="sr-only"></span></a>
        </ul>
        <h4><span class="navbar-text">
       Hello, <?= $_SESSION['user']['login'] ?>!
    </span></h4>
      </div>
    </div>
  </nav>



  <blockquote class="blockquote text-center">
    <div class="align-self-center">
      <h1>
        <p class="text-left">Добро пожаловать в Библиотеку!</p>
      </h1>
    </div>
  </blockquote>

</body>

</html>