<?php
   $login = trim($_POST['логин']);
   $password = trim($_POST['пароль']);

   $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");

   // Проверка наличия логина в базе данных
   $checkSql = 'SELECT COUNT(*) FROM theatre.accounts WHERE account_name = (:login)';
   $checkQuery = $pdo->prepare($checkSql);
   $checkQuery->execute(['login' => $login]);
   $count = $checkQuery->fetchColumn();

   if ($count > 0) {
       // Логин уже существует, перенаправление с ошибкой
       header("Location: registration.php?error=1");
       exit;
   }

   // Создание нового пользователя
   $insertSql = 'INSERT INTO theatre.accounts (account_password, account_name) VALUES (:password, :login)';
   $insertQuery = $pdo->prepare($insertSql);
   $insertQuery->execute(['password' => $password, 'login' => $login]);

   header('Location: entrance.php');
   exit;
?>
