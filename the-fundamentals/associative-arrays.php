<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Arrays</title>
</head>

<body>
    <?php

    $books = [
        "Do Androids Dream of Electric Sheep?",
        "The Langoliers",
        "Hail Mary"
    ];

    $books_nested_array = [
        [
            "Do Androids Dream of Electric Sheep?",
            "Philip K. Dick",
            "1968",
        ],
        [
            "The Langoliers",
            "Stephen King",
            "1990",
        ],
        [
            "Hail Mary",
            "Andy Weir",
            "2021",
        ],
    ];

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
    ]

    ?>

    <p><?= $books[0] ?></p>
    <p><?= $books[1] ?></p>
    <p><?= $books[2] ?></p>

    <hr />

    <ul>

        <?php foreach ($books_associative_array as $book): ?>
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