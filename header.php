<?php ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL); ?>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
        </a>
      </div>

      <span class="fs-4">Крутой Театр</span>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="mainpage.php" class="nav-link px-8">Главная страница</a></li>
        <li><a href="performances.php" class="nav-link px-8">Представления</a></li>
        <li><a href="actors.php" class="nav-link px-8">Актёры</a></li>
      
    <?php
        if ($_COOKIE['user'] == '' ):
    ?>

    <div class="col-md-3 text-end">
        <li><a href="entrance.php" class="nav-link px-8">Вход</a></li>
    </div>

    <?php else: ?>

    <div class="col-md-3 text-end">
        <li><a href="account.php" class="nav-link px-8">Кабинет</a></li>
    </div>

    <?php endif; ?>

    </ul>

</header>