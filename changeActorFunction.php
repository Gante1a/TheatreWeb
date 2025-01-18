<?php
   $name = trim($_POST['name']);
   $description = trim($_POST['description']);

   $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
   $sql = 'UPDATE theatre.actors SET actor_biography = :description WHERE actor_name = :name;';
   $query = $pdo->prepare($sql);
   $query->execute(['name' => $name, 'description' => $description]);

    header('Location: actors.php');
?>