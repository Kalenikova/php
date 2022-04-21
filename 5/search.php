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
    <link rel="stylesheet" href="style/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Search</title>
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
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success" type="submit">Search</button>
         </form>
        </div>
        </div>
    </nav>
    <h2>Book's information</h2>
    <table class="table table-striped">
		<tr>
			<th class="table-column">ID of book</th>
			<th class="table-column">Title of book</th>
			<th class="table-column">Description</th>
			<th class="table-column">Author of book</th>
            <th class="table-column">Genre of book</th>
		</tr>
	<?php 
        $key = $_POST['search'];
        $books = R::find('book', ' title = ? ', [$key]);
		foreach($books as $book) {
		?>
		<tr>
			<td><?= $book['id'] ?></td>
			<td><?= $book['title'] ?></td>
			<td><?= $book['description'] ?></td>
			<td><?= $book['author'] ?></td>
            <td><?= $book['genre'] ?></td>
		</tr>
		<?php
		}
	?>
	</table>
    </div>
</body>
</html>