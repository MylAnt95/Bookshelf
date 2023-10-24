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
        case 'asc':
            ksort($books);
            break;
        case 'desc':
            krsort($books);
            break;
        case $direction === 'authorasc':
            array_multisort($author, SORT_ASC, $books);
            break;
        case $direction === 'authordesc':
            array_multisort($author, SORT_DESC, $books);
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
    <div class="dropdown">
        <button class="dropbtn">Sort by</button>
        <div class="dropdown-content">
            <a href="?direction=asc">Title ASC</a>
            <a href="?direction=desc">Title DESC</a>
            <a href="?direction=authorasc">Author ASC</a>
            <a href="?direction=authordesc">Author DESC</a>
        </div>
    </div>
</nav>
<body>
    <div class="wrapper">
        <div class="shelf">
            <?php foreach ($books as $book => $bookData) : ?>
                <div class="book">
                    <h4 class="book-title"><?= $book; ?></h4>
                    <p class="book-genre"><?= $bookData['released']; ?></p>
                    <p class="book-author"><?= $bookData['author']; ?></p>
                    <p class="book-genre"><?= $bookData['genre']; ?></p>
                    <p class="book-id"><?= $bookData['id']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>