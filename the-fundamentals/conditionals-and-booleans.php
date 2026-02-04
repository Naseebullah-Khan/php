<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditionals and Booleans</title>

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: 0;
            height: 100vh;
            font-family: sans-serif;
        }
    </style>

</head>

<body>

    <?php

    $book_title = "Dark Matter";
    $sentence = "";
    $read = false;

    if ($read) {
        $sentence = "You have read {$book_title}.";
    } else {
        $sentence = "You have NOT read {$book_title}.";
    }

    ?>

    <!-- <h1><?php echo $sentence ?></h1> -->
    <h1><?= $sentence; ?></h1>

</body>

</html>