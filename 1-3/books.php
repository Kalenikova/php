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

    $sql = mysqli_query($connect, "INSERT INTO `books` (`title`, `date_writing`, `id_g`, `id_a`) VALUES ('{$_POST['title']}', '{$_POST['date_writing']}', '{$_POST['id_g']}', '{$_POST['id_a']}')");
  }

  if (isset($_GET['del'])) {
    $id = $_GET['del'];

    $query = "DELETE FROM books WHERE id_b = $id";
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
            <a class="nav-link" href="author.php">Авторы</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="genres.php">Жанры</a>
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
        <input type="text" class="form-control" name="title" placeholder="title">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="date_writing" placeholder="date_writing">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="id_g" placeholder="id_g">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="id_a" placeholder="id_a">
      </div>
      <div class="col-auto">
        <button class="btn btn-outline-success" type="submit" name="send" value="Add">Add</button>
      </div>
    </div>
  </form>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">id_b</th>
        <th scope="col">title</th>
        <th scope="col">date_writing</th>
        <th scope="col">id_g</th>
        <th scope="col">id_a</th>
        <th scope="col">delete</th>
        <th scope="col">edit</th>
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
      <td><a name=\"del\" href=\"?del=" . $result["id_b"] . "\">Delete</a></td>
      <td><a href='editb.php?red_id={$result['id_b']}'>Edit</a></td>
      <td><a href='adcom.php?com={$result['id_b']}'>Comment</a></td>";
    }


    ?>
  </table>

</body>

</html>