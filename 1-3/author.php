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

  if (isset($_POST["send"])) {
    //Если это запрос на обновление, то обновляем

    $sql = mysqli_query($connect, "INSERT INTO `author` (`surname`, `name`, `midname`, `date_born`, `date_die`) VALUES ('{$_POST['surname']}', '{$_POST['name']}', '{$_POST['midname']}', '{$_POST['date_born']}', '{$_POST['date_die']}')");
  }



  if (isset($_GET['del'])) {
    $id_a = (int) $_GET['del'];

    $query = "DELETE FROM author WHERE id_a = $id_a";
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
        <input type="text" class="form-control" name="surname" placeholder="surname">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="name" placeholder="name">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="midname" placeholder="midname">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="date_born" placeholder="date_born">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="date_die" placeholder="date_die">
      </div>
      <div class="col-auto">
        <button class="btn btn-outline-success" type="submit" name="send" value="Add">Add</button>
      </div>
    </div>
  </form>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">id_a</th>
        <th scope="col">surname</th>
        <th scope="col">name</th>
        <th scope="col">midname</th>
        <th scope="col">date_born</th>
        <th scope="col">date_die</th>
        <th scope="col">delete</th>
        <th scope="col">edit</th>
      </tr>
    </thead>


    <?php
    $sql = mysqli_query($connect, 'SELECT * FROM `author`');
    while ($result = mysqli_fetch_array($sql)) {
      echo "<tr><td>{$result['id_a']}</td>
      <td>{$result['surname']}</td>
      <td>{$result['name']}</td>
      <td>{$result['midname']}</td>
      <td>{$result['date_born']}</td>
      <td>{$result['date_die']}</td>
      <td><a name=\"del\" href=\"?del=" . $result["id_a"] . "\">Delete</a></td>
      <td><a href='edit.php?red_id={$result['id_a']}'>Edit</a></td>";
    }

    ?>
  </table>


</body>

</html>