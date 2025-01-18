<?php
   $name = trim($_POST['name']);
   $description = trim($_POST['description']);

   $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
   $sql = 'INSERT INTO theatre.actors (actor_name, actor_biography) VALUES (:name, :description)';
   $query = $pdo->prepare($sql);
   $query->execute(['name' => $name, 'description' => $description]);

    header('Location: actors.php');
?>