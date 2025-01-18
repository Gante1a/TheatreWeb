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
    <?php require "header.php"; ?>

    <div class="container mt-5">
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo getErrorMessage($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <form action="checkLogin.php" method="post">
            <h3>Вход</h3>
            <input type="text" name="логин" placeholder="Введите логин" class="form-control" required><br>
            <input type="password" name="пароль" placeholder="Введите пароль" class="form-control" required><br>
            <button type="submit" name="send" class="btn btn-success">Войти</button><br>
        </form>
        <br>
        <form action="registration.php" method="post">
            <button type="submit" name="send" class="btn btn-secondary">Зарегистрироваться</button>
        </form>
    </div>    

    <?php 
        require "footer.php"; 

        function getErrorMessage($errorCode) {
            switch ($errorCode) {
                case "1":
                    return "Пожалуйста, введите логин и пароль.";
                case "2":
                    return "Логин и пароль не совпадают.";
                case "3":
                    return "Введённого логина не существует.";
                default:
                    return "Произошла ошибка.";
            }
        }
    ?>
</body>

</html>
