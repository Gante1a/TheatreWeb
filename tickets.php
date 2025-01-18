<?php
   if (isset($_GET['performance_id'])) {
    $performanceID = $_GET['performance_id'];
} else {
    echo 'не робит';
}
   
   $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
   $sql = 'INSERT INTO theatre.tickets (tickets_accounts, tickets_performances) VALUES ((SELECT accounts_id FROM theatre.accounts WHERE account_name = :login) ,:text); ';

   $query = $pdo->prepare($sql);
   $query->execute(['text' => $performanceID, 'login' => $_COOKIE['user']]);


    //header('Location: account.php');
?>