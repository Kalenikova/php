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

          if (isset($_POST["Title"])) {
            //Если это запрос на обновление, то обновляем
            if (isset($_GET['red_id'])) {
                $sql = mysqli_query($connect, "UPDATE `books` SET `title` = '{$_POST['Title']}',`date_writing` = '{$_POST['Date_writing']}',`id_g` = '{$_POST['Id_g']}',`id_a` = '{$_POST['Id_a']}' WHERE `id_b`={$_GET['red_id']}");
            } else {
                //Иначе вставляем данные, подставляя их в запрос
                $sql = mysqli_query($connect, "INSERT INTO `books` (`title`, `date_writing`, `id_g`, `id_a`,) VALUES ('{$_POST['Title']}', '{$_POST['Date_writing']}', '{$_POST['Id_g']}', '{$_POST['Id_a']}')");
            }
            if ($sql) {
                echo '<p>Успешно!</p>';
              } else {
                echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
              }
          }


          if (isset($_GET['red_id'])) {
            $sql = mysqli_query($connect, "SELECT * FROM `books` WHERE `id_b`={$_GET['red_id']}");
            $product = mysqli_fetch_array($sql);
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
          <a class="nav-link" href="author.php">Авторы</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="books.php">Книги</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="genres.php">Жанры</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
      </form>
    </div>
  </div>
</nav>

<form action="" method="post">
    <table>
      <tr>
        <td>Title:</td>
        <td><input type="text" name="Title" value="<?= isset($_GET['red_id']) ? $product['title'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Date_writing:</td>
        <td><input type="text" name="Date_writing" value="<?= isset($_GET['red_id']) ? $product['date_writing'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Id_g:</td>
        <td><input type="text" name="Id_g" value="<?= isset($_GET['red_id']) ? $product['id_g'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Id_a:</td>
        <td><input type="text" name="Id_a" value="<?= isset($_GET['red_id']) ? $product['id_a'] : ''; ?>"></td>
      </tr>
        <td colspan="2"><input type="submit" value="OK"></td>
      </tr>
    </table>
  </form>

