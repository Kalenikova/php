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

          if (isset($_POST["Name_genre"])) {
            //Если это запрос на обновление, то обновляем
            if (isset($_GET['red_id'])) {
                $sql = mysqli_query($connect, "UPDATE `genre` SET `name_genre` = '{$_POST['Name_genre']}' WHERE `id_g`={$_GET['red_id']}");
            } else {
                //Иначе вставляем данные, подставляя их в запрос
                $sql = mysqli_query($connect, "INSERT INTO `genre` (`name_genre`) VALUES ('{$_POST['Name_genre']}')");
            }
            if ($sql) {
                echo '<p>Успешно!</p>';
              } else {
                echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
              }
          }


          if (isset($_GET['red_id'])) {
            $sql = mysqli_query($connect, "SELECT * FROM `books` WHERE `id_g`={$_GET['red_id']}");
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
        <td>Name genre:</td>
        <td><input type="text" name="Name_genre" value="<?= isset($_GET['red_id']) ? $product['name_genre'] : ''; ?>"></td>
      </tr>
        <td colspan="2"><input type="submit" value="OK"></td>
      </tr>
    </table>
  </form>

