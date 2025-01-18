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
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo getErrorMessage($_GET['error']); ?>
        </div>
    <?php endif; ?>

    <form action="check.php" method="post">
        <h3>Регистрация</h3>
        <input type="text" name="логин" placeholder="Введите логин" class="form-control" required><br>
        <input type="password" name="пароль" placeholder="Введите пароль" class="form-control" required><br>
        <button type="submit" name="send" class="btn btn-success">Зарегистрироваться</button>
    </form>
</div>    

<?php require "footer.php" ?>

<?php 
    function getErrorMessage($errorCode) {
        switch ($errorCode) {
            case "1":
                return "Введённый логин уже существует, попробуйте другой.";
            default:
                return "Произошла ошибка.";
        }
    }
?>

</body>

</html>
