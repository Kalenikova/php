<?php
    require 'connect.php';
?>
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
    <h3>Count of genres</h3>
                <form class="input-group mb-3" action="show.php" method="post">
                    <button type='submit' name='send' class='btn btn-success'>JUST SHOW ME THIS TABLE</button>
                </form>
                <h3>Search book</h3>
                <form class="input-group mb-3" action="findkey.php" method="post">
                    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Key word">
                    <button type='submit' name='send' class='btn btn-success'>FIND</button>
                </form>
                <h3>Decate book</h3>
                <form class="input-group mb-3" action="findyear.php" method="post">
                    <button type='submit' name='send' class='btn btn-success'>FIND</button>
                </form>