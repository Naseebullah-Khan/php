<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Separate Logic From the Template</title>
</head>

<body>

    <ul>

        <?php foreach ($filteredArray as $book): ?>
            <li><?= $book['title'] ?></li>
            <ul>
                <li><?= $book['author'] ?></li>
                <li><?= $book['publishedYear'] ?></li>
                <a href="<?= $book['infoLink'] ?>" target="_blank">
                    <li>info</li>
                </a>
            </ul>

        <?php endforeach ?>

    </ul>

</body>

</html>