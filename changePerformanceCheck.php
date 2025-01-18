<?php
   $name = trim($_POST['name']);
   $description = trim($_POST['description']);
   $time = trim($_POST['time']);

   $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
   $sql = 'UPDATE theatre.performances SET performances_description = :description, performances_time = :time WHERE performances_name = :name;';
   $query = $pdo->prepare($sql);
   $query->execute(['name' => $name, 'description' => $description, 'time' => $time]);

    header('Location: performances.php');
?>