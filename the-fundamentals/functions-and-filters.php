<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions and Filters</title>
</head>

<body>
    <?php
    $books_associative_array = [
        [
            "title" => "Do Androids Dream of Electric Sheep?",
            "author" => "Philip K. Dick",
            "publishedYear" => "1968",
            "infoLink" => "https://en.wikipedia.org/wiki/Do_Androids_Dream_of_Electric_Sheep%3F",
        ],
        [
            "title" => "The Langoliers",
            "author" => "Stephen King",
            "publishedYear" => "1990",
            "infoLink" => "https://stephenking.com/works/novella/langoliers.html#:~:text=A%20group%20of%20travelers%20on,the%20pilots%20and%20flight%20attendants.",
        ],
        [
            "title" => "Hail Mary",
            "author" => "Andy Weir",
            "publishedYear" => "2021",
            "infoLink" => "https://en.wikipedia.org/wiki/Project_Hail_Mary",
        ],
        [
            "title" => "The Martian",
            "author" => "Andy Weir",
            "publishedYear" => "2011",
            "infoLink" => "https://en.wikipedia.org/wiki/The_Martian_(Weir_novel)",
        ],
    ];

    function filteredByAuthor($books, $name): array
    {
        $filteredArray = [];

        foreach ($books as $book) {
            if ($book["author"] === $name) {
                $filteredArray[] = $book;
            };
        };

        return $filteredArray;
    };

    ?>

    <ul>

        <?php foreach ($books_associative_array as $book): ?>
            <?php if ($book['author'] === "Philip K. Dick"): ?>
                <li><?= $book['title'] ?></li>
                <ul>
                    <li><?= $book['author'] ?></li>
                    <li><?= $book['publishedYear'] ?></li>
                    <a href="<?= $book['infoLink'] ?>" target="_blank">
                        <li>info</li>
                    </a>
                </ul>
            <?php endif ?>

        <?php endforeach ?>

    </ul>

    <hr />

    <!-- OR -->

    <ul>

        <?php foreach (filteredByAuthor($books_associative_array, "Andy Weir") as $book): ?>
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