<?php ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Крутой Театр</title>
</head>  

<body>
    
    <?php require "header.php" ?>
<div class="container mt-5">
    <form action="changeActorFunction.php" method="post">
        <h3>Изменение</h3><br>
        <input type="name" name="name" placeholder="Имя" class="form-control"><br>
        <input type="name" name="description" placeholder="Биография" class="form-control"><br>
        <button type="submit" name="send" class="btn btn-success">Изменить</button>
    </form>
</div>    

    <?php require "footer.php" ?>

</body>

</html>