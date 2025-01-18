<?php
   $text = trim($_POST['text']);

   $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
   $sql = 'INSERT INTO theatre.complaints (complaint_account, complaint_description) VALUES ((SELECT accounts_id FROM theatre.accounts WHERE account_name = :login LIMIT 1), :text);';
   $query = $pdo->prepare($sql);
   $query->execute(['text' => $text, 'login' => $_COOKIE['user']]);

    header('Location: account.php');
?>