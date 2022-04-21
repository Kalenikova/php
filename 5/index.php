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
    <title>Home</title>
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
    </nav><br>

   	<div class="form-add">
	   		<form action="create_author.php" method="post" class="form-body">
			<div class="row">
  				<div class="col">
   			 		<input type="text" class="form-control" placeholder="Surname of author" aria-label="First name" name="surname">
  				</div>
				<div class="col">
   			 		<input type="text" class="form-control" placeholder="Name of author" aria-label="First name" name="name">
  				</div>
				<div class="col">
   			 		<input type="text" class="form-control" placeholder="Midname of author" aria-label="First name" name="midname">
  				</div>
  				<div class="col">
    				<input type="text" class="form-control" placeholder="Birthday of author" aria-label="Last name" name="date_born">
  				</div>
				  <div class="col">
    				<input type="text" class="form-control" placeholder="Date of death" aria-label="Last name" name="date_die">
  				</div>
				<div class="col">
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</div>
	       </form>
    </div><br>

	<div class="form-update">
		<form action="edit.php" method="post">
			<div class="row">
				<div class="col">
   			 		<input type="text" class="form-control" placeholder="Surname of author" aria-label="First name" name="surname">
  				</div>
				<div class="col">
   			 		<input type="text" class="form-control" placeholder="Name of author" aria-label="First name" name="name">
  				</div>
				<div class="col">
   			 		<input type="text" class="form-control" placeholder="Midname of author" aria-label="First name" name="midname">
  				</div>
  				<div class="col">
    				<input type="text" class="form-control" placeholder="Birthday of author" aria-label="Last name" name="date_born">
  				</div>
				  <div class="col">
    				<input type="text" class="form-control" placeholder="Date of death" aria-label="Last name" name="date_die">
  				</div>
				<div class="col">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</form>
	</div>
	<table class="table table-striped">
		<tr>
        <th scope="col">id_a</th>
        <th scope="col">surname</th>
        <th scope="col">name</th>
        <th scope="col">midname</th>
        <th scope="col">date_born</th>
        <th scope="col">date_die</th>
		</tr>
	<?php 
		$authors = R::getAll('SELECT * FROM `author`');
		foreach($authors as $author) {
		?>
		<tr>
			<td><?= $author['id_a'] ?></td>
			<td><?= $author['surname'] ?></td>
			<td><?= $author['name'] ?></td>
			<td><?= $author['midname'] ?></td>
			<td><?= $author['date_born'] ?></td>
			<td><?= $author['date_die'] ?></td>
		</tr>
		<?php
		}
	?>
	</table>
	</div>
</body>
</html>
