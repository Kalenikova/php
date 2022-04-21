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

  if (isset($_POST["send"])) {
    //Если это запрос на обновление, то обновляем

    $sql = mysqli_query($connect, "INSERT INTO `genre` (`name_genre`) VALUES ('{$_POST['name_genre']}')");
  }

  if (isset($_GET['del'])) {
    $id_g = (int) $_GET['del'];

    $query = "DELETE FROM genre WHERE id_g = $id_g";
    echo $query;
    mysqli_query($connect, $query) or die(mysqli_error($connect));
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
            <a class="nav-link" href="admin_home.php">Домой</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="books.php">Книги</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="author.php">Авторы</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link active" href="logout.php">Выход</a>
          </li>
        </ul>
        <h4><span class="navbar-text">
       Hello, admin!
    </span></h4>
      </div>
    </div>
  </nav>

  <form action="" method="post">
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" name="name_genre" placeholder="name_genre">
      </div>
      <div class="col-auto">
        <button class="btn btn-outline-success" type="submit" name="send" value="Add">Add</button>
      </div>
    </div>
  </form>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">id_g</th>
        <th scope="col">name_genre</th>
        <th scope="col">delete</th>
        <th scope="col">edit</th>
      </tr>
    </thead>

    <?php
    $sql = mysqli_query($connect, 'SELECT `id_g`, `name_genre` FROM `genre`');
    while ($result = mysqli_fetch_array($sql)) {
      echo "<tr><td>{$result['id_g']}</td>
      <td>{$result['name_genre']}</td>
      <td><a name=\"del\" href=\"?del=" . $result["id_g"] . "\">Delete</a></td>
      <td><a href='editg.php?red_id={$result['id_g']}'>Edit</a></td>";
  
    }
    ?>
  </table>
</body>

</html>