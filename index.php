</html>
<?php
require __DIR__ . '/books.php';

$author = [];
$release = [];
foreach ($books as $book => $data) :
    $author[] = $data['author'];
    $release[] = $data['released'];
endforeach;

$sortedBooks = $books;
if (isset($_GET['direction'])) {
    $direction = $_GET['direction'];

    foreach ($direction as $selected) {
        switch ($selected) {
            case 'asc':
                ksort($sortedBooks);
                break;
            case 'desc':
                krsort($sortedBooks);
                break;
            case 'authorasc':
                array_multisort($author, SORT_ASC, $sortedBooks);
                break;
            case 'authordesc':
                array_multisort($author, SORT_DESC, $sortedBooks);
                break;
            case 'releaseasc':
                array_multisort($release, SORT_ASC, $sortedBooks);
                break;
            case 'releasedesc':
                array_multisort($release, SORT_DESC, $sortedBooks);
                break;
        }
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
    <div class="nav-content">
        <form action="index.php" method="get">

            <div class="dropdown">
                <select id="sort-select" name="direction">
                    <option value="none" selected disabled hidden>Sort by</option>
                    <option value="asc">Title ASC</option>
                    <option value="desc">Title DESC</option>
                    <option value="authorasc">Author ASC</option>
                    <option value="authordesc">Author DESC</option>
                    <option value="releaseasc">Release ASC</option>
                    <option value="releasedesc">Release DESC</option>
                </select>
                <div class="checkboxes">
                    <label class="sort">Title ASC
                        <input type="checkbox" name="direction[]" value="asc">
                        <span class="checkmark"></span>
                    </label>
                    <label class="sort">Title DESC
                        <input type="checkbox" name="direction[]" value="desc">
                        <span class="checkmark"></span>
                    </label>
                    <label class="sort">Author ASC
                        <input type="checkbox" name="direction[]" value="authorasc">
                        <span class="checkmark"></span>
                    </label>
                    <label class="sort">Author DESC
                        <input type="checkbox" name="direction[]" value="authordesc">
                        <span class="checkmark"></span>
                    </label>
                    <label class="sort">Release ASC
                        <input type="checkbox" name="direction[]" value="releaseasc">
                        <span class="checkmark"></span>
                    </label>
                    <label class="sort">Release DESC
                        <input type="checkbox" name="direction[]" value="releasedesc">
                        <span class="checkmark"></span>
                    </label>
                    <button class="sort-button" type="submit">SORT</button>
                </div>
            </div>
            <div class="search">
                <form class="search-form" action="index.php" method="get">
                    <input type="text">
                    <button type="submit">Search</button>
                </form>
            </div>
        </form>
    </div>
</nav>
<body>
    <div class="wrapper">
        <div class="shelf shelf-1">
            <?php

            $booksDisplayed = 0;

            foreach ($sortedBooks as $book => $bookData) {
                if ($booksDisplayed < 7) { ?>
                    <div class="book" style="background-color: <?=$bookData['color']?>;">
                        <h4 class="book-title"><?= $book; ?></h4>
                        <p class="book-genre"><?= $bookData['released']; ?></p>
                        <p class="book-author"><?= $bookData['author']; ?></p>
                        <p class="book-genre"><?= $bookData['genre']; ?></p>
                        <p class="book-id"><?= $bookData['id']; ?></p>
                    </div>
            <?php
                    $booksDisplayed++;
                }
            }
            ?>
        </div>
        <div class="shelf shelf-2">
            <?php
            $booksDisplayed = 0;
            foreach ($sortedBooks as $book => $bookData) {
                if ($booksDisplayed >= 7) { ?>
                    <div class="book" style="background-color: <?=$bookData['color']?>;">
                        <h4 class="book-title"><?= $book; ?></h4>
                        <p class="book-genre"><?= $bookData['released']; ?></p>
                        <p class="book-author"><?= $bookData['author']; ?></p>
                        <p class="book-genre"><?= $bookData['genre']; ?></p>
                        <p class="book-id"><?= $bookData['id']; ?></p>
                    </div>
            <?php
                }
                $booksDisplayed++;
            }
            ?>
        </div>
        <div class="shelf legs"></div>
    </div>
</body>

</html>