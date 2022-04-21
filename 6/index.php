<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>lab5</title>
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
            <div class="container">
                <h3>Add new author</h3>
                <form class="input-group mb-3" action="add.php" method="post">
                    <input type="text" name="Surname" id="Surname" class="form-control" placeholder="Surname">
                    <input type="text" name="Name" id="Name" class="form-control" placeholder="Name">
                    <input type="text" name="Midname" id="Midname" class="form-control" placeholder="Midname">
                    <input type="text" name="date_born" id="date_born" class="form-control" placeholder="date_born">
                    <input type="text" name="date_die" id="date_die" class="form-control" placeholder="date_die">
                    <button type='sumbit' name='send' class='btn btn-success'>Add new</button>
                </form>
                <h3>Update author</h3>
                <form class="input-group mb-3" action="put.php" method="post">
                    <?php
                    require 'connect.php';
                    $authors = R::findAll('author');
                    echo "<select name='id' id='id' class='form-control' placeholder='AUTHOR'>";
                    foreach ($authors as $author) {
                        echo "<option value='" . $author->id ."'>" .$author->surname." ".$author->name." ".$author->midname."</option>";
                    }echo "</select>";
                    ?>
                    <input type="text" name="Surname" id="Surname" class="form-control" placeholder="Surname">
                    <input type="text" name="Name" id="Name" class="form-control" placeholder="Name">
                    <input type="text" name="Midname" id="Midname" class="form-control" placeholder="Midname">
                    <input type="text" name="date_born" id="date_born" class="form-control" placeholder="date_born">
                    <input type="text" name="date_die" id="date_die" class="form-control" placeholder="date_die">
                    <button type='sumbit' name='send' class='btn btn-success'>UPDATE</button>
                </form>

            </div>
        </main>
        <footer></footer>
    </div>
</body>

</html>