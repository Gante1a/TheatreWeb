<?php
   $login = trim($_POST['логин']);
   $password = trim($_POST['пароль']);

   $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
   $sql = 'SELECT * FROM theatre.accounts WHERE account_password = (:password) AND  account_name =(:login)';
   $query = $pdo->prepare($sql);
   $query->execute(['password' => $password, 'login' => $login]);
   $user = $query->fetch(PDO::FETCH_ASSOC);

   if ($user) {
       setcookie('user', $user['account_name'], time() + 3600, '/');
       header("Location: account.php");
   } else {
       $sql = 'SELECT COUNT(*) FROM theatre.accounts WHERE account_name = (:login)';
       $query = $pdo->prepare($sql);
       $query->execute(['login' => $login]);
       $count = $query->fetchColumn();

       if ($count == 0) {
           header("Location: entrance.php?error=3");
       } else {
           header("Location: entrance.php?error=2");
       }
   }
?>
