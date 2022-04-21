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

<body>
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
            <table class="table table-striped table-bordered" Style="margin:0px 10%; max-width:50%;">
                <thead>
                    <tr>
                        <th scope="col" style="max-width:5px">M</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date of Writing</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'connect.php';
                    $year = $_POST['year'];
                    $books = R::findAll('books', "date_writing > (year(Current_timestamp())-10)", [$year]);
                    foreach ($books as $book) {
                        echo "<tr><th scope='row' style='max-width:5px'><b style='font-size:22px;'>";
                        echo "*</b></th><td>";
                        echo $book->title . "</td><td>";
                        echo $book->date_writing . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>