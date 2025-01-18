<?php
   setcookie('user', $user['account_name'], time() - 3600, '/');

   header("Location: entrance.php");
?>