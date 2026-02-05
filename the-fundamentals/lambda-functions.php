<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lambda Functions</title>
</head>

<body>
    <?php
    $books_associative_array = [
        [
            "title" => "Do Androids Dream of Electric Sheep?",
            "author" => "Philip K. Dick",
            "publishedYear" => 1968,
            "infoLink" => "https://en.wikipedia.org/wiki/Do_Androids_Dream_of_Electric_Sheep%3F",
        ],
        [
            "title" => "The Langoliers",
            "author" => "Stephen King",
            "publishedYear" => 1990,
            "infoLink" => "https://stephenking.com/works/novella/langoliers.html#:~:text=A%20group%20of%20travelers%20on,the%20pilots%20and%20flight%20attendants.",
        ],
        [
            "title" => "Hail Mary",
            "author" => "Andy Weir",
            "publishedYear" => 2021,
            "infoLink" => "https://en.wikipedia.org/wiki/Project_Hail_Mary",
        ],
        [
            "title" => "The Martian",
            "author" => "Andy Weir",
            "publishedYear" => 2011,
            "infoLink" => "https://en.wikipedia.org/wiki/The_Martian_(Weir_novel)",
        ],
    ];

    // // Lambda Function or Anonymous Function
    // $filteredByAuthor = function ($books, $name): array {
    //     $filteredArray = [];

    //     foreach ($books as $book) {
    //         if ($book["author"] === $name) {
    //             $filteredArray[] = $book;
    //         };
    //     };

    //     return $filteredArray;
    // };

    // // Names Function
    // function filter($items, $fn): array
    // {
    //     $filteredItems = [];

    //     foreach ($items as $item) {
    //         if ($fn($item)) {
    //             $filteredItems[] = $item;
    //         };
    //     };

    //     return $filteredItems;
    // };

    // $filteredArray = $filteredByAuthor($books_associative_array, "Andy Weir");
    // $filteredArray = filter($books_associative_array, "publishedYear", 2021);
    // $filteredArray = filter($books_associative_array, function ($book) {
    //     return $book["publishedYear"] < 2021;
    // });
    // build-in function for filter
    $filteredArray = array_filter($books_associative_array, function ($book) {
        return $book["publishedYear"] > 2021;
    });


    ?>

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