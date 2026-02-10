<?php

require "functions.php";

// require "router.php";

// connect to our MySQL database.

// class Person
// {
//     public $name;
//     public $age;

//     public function breathing(): void
//     {
//         // return $this->name . " is breathing.";
//         echo $this->name . " is breathing.";
//     }
// }

// $person = new Person();
// $person->name = "Khan";
// $person->age = 27;
// // dd(value: $person);
// // dd(value: $person->name);
// // dd(value: $person->age);
// // dd(value: $person->breathing());
// $person->breathing();

$dsn = "mysql:host=localhost;port=3306;dbname=create-a-mysql-database;user=root;password=root;charset=utf8mb4";

$pdo = new PDO(dsn: $dsn);

$statement = $pdo->prepare("SELECT * fROM posts");

$statement->execute();

// $posts = $statement->fetchAll();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

// dd(value: $posts);

foreach ($posts as $post) {
    echo "<li>" . $post["title"] . "</li>";
}