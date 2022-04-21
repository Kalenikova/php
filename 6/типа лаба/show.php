<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>lab5/show/4</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<div>
<header>
        <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Библиотека</a>
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
        </div>
        </div>
    </nav>
        </header>
    <main>
        <table class="table table-striped table-bordered" style="max-width: 500px;">
            <thead>
                <tr>
                    <th scope="col">Имя жанра</th>
                    <th scope="col">Количество книг</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'connect.php';
                $genres = R::findAll('genre');
                foreach ($genres as $genre) {
                    echo '<tr><th>' . $genre->name_genre . '</th>';
                    $books = R::count('books', 'id_g = ?', [$genre->id]);
                    echo '<td>' . $books . '</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</div>

</html>