<?php
require 'rb.php';

R::setup('mysql:host=localhost;dbname=author', 'root', 'usbw');

if( !R::testConnection() ) 
{
    exit('Нет подключения к базе данных');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Genres</title>
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Library</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="book.php">Books</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link" href="index.php">Authors</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="genre.php">Genres</a>
                </li>
            </ul>
         <form class="d-flex" action="search.php" method="post">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
         </form>
        </div>
        </div>
    </nav>
    <form action="delete_genre.php" method="post">
        <h1>Choose a genre</h1>
        <select class="form-select" aria-label="Default select example" name="select">
            <option selected>Open this select menu</option>
            <option value="Romance">Romance</option>
            <option value="Comedy">Comedy</option>
            <option value="Classic">Classic</option>
            <option value="Sience fiction">Sience fiction</option>
        </select>
        <button type="submit" class="btn btn-primary genre">Submit</button>
    </form>
    <table class="table table-striped">
		<tr>
			<th class="table-column">ID genre</th>
			<th class="table-column">Title of genre</th>
		</tr>
	<?php 
		$genres = R::getAll('SELECT * FROM `genre`');
		foreach($genres as $genre) {
		?>
		<tr>
			<td><?= $genre['id'] ?></td>
			<td><?= $genre['title'] ?></td>
		</tr>
		<?php
		}
	?>
	</table>
</div>
</body>
</html>