<?php
require __DIR__ . '/functions.php';
require __DIR__ . '/books.php';

$titles = [];
$author = [];
foreach ($books as $book => $data) :
    $titles[] = $book;
    $author[] = $data['author'];
endforeach;

if (isset($_GET['direction'])) {
    $direction = $_GET['direction'];
    switch ($direction) {
        case $direction === 'asc':
            ksort($books);
            break;
        case $direction === 'desc':
            krsort($books);
            break;
        case $direction === 'authorasc':
            sort($author);
            break;
        case $direction === 'authordesc':
            rsort($author);
            break;
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
    <title>Bookshelf</title>
</head>
<nav>
</nav>

<body>
    <div class="dropdown">
        <button class="dropbtn">Sort by</button>
        <div class="dropdown-content">
            <a href="?direction=asc">Title ASC</a>
            <a href="?direction=desc">Title DESC</a>
            <a href="?direction=authorasc">Author ASC</a>
            <a href="?direction=authordesc">Author DESC</a>
        </div>
    </div>
    <div class="shelf">
        <?php foreach ($books as $book => $bookData) : ?>
            <div class="book">
                <h4 class="book-title"><?= $book; ?></h4>
                <p class="book-id"><?= $bookData['id']; ?></p>
                <p class="book-author"><?= $bookData['author']; ?></p>
                <p class="book-genre"><?= $bookData['genre']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>