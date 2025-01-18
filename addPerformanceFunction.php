<?php
   $name = trim($_POST['name']);
   $description = trim($_POST['description']);
   $time = trim($_POST['time']);

   $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
   $sql = 'INSERT INTO theatre.performances (performances_name, performances_description, performances_time) VALUES (:name, :description, :time)';
   $query = $pdo->prepare($sql);
   $query->execute(['name' => $name, 'description' => $description, 'time' => $time]);

    header('Location: performances.php');
?>