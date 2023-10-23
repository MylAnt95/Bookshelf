<?php
require __DIR__ . '/functions.php';
require __DIR__ . '/books.php';

/* $titles = [];
foreach ($books as $book => $data) {
    $titles[] = $data['title'];
}
if (isset($_GET['direction'])) {
    if ($_GET['direction'] === 'asc') {
        $_GET['direction'] = sort($titles);
    } elseif ($_GET['direction'] === 'desc') {
        $_GET['direction'] = rsort($titles);
    }
} */



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
            <a href="?direction=asc">ASC</a>
            <a href="?direction=desc">DESC</a>
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