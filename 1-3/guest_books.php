<!doctype html>
<html lang="ru">

<head>
  <title>Библиотека</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
            <a class="nav-link" href="enterreg.php">Домой</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="guest_author.php">Авторы</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="guest_genres.php">Жанры</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link active" href="logout.php">Выход</a>
          </li>
        </ul>
        <h4><span class="navbar-text">
       Hello, <?= $_SESSION['user']['login'] ?>!
    </span></h4>
      </div>
    </div>
  </nav>


  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">id_b</th>
        <th scope="col">title</th>
        <th scope="col">date_writing</th>
        <th scope="col">id_g</th>
        <th scope="col">id_a</th>
        <th scope="col">comments</th>
      </tr>
    </thead>

    <?php
    $sql = mysqli_query($connect, 'SELECT * FROM `books`');
    while ($result = mysqli_fetch_array($sql)) {
      echo "<tr><td>{$result['id_b']}</td>
      <td>{$result['title']}</td>
      <td>{$result['date_writing']}</td>
      <td>{$result['id_g']}</td>
      <td>{$result['id_a']}</td>
      <td><a href='comments.php?com={$result['id_b']}'>Comment</a></td>";
    }


    ?>
  </table>

</body>

</html>