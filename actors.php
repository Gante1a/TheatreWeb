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
        
    <div class="modal-dialog"  style="text-align: center;">
        <h1 class="display-4 fw-bold text-body-emphasis">Актёры</h1>
    </div>

    </div>
    </div>
    <div class="col">
        <?php 
        $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
        $sql = 'SELECT CAST(MAX(actor_id) AS UNSIGNED) AS max_news_id FROM theatre.actors;';
        $query = $pdo->prepare($sql);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_OBJ);
        $number = $row->max_news_id;
        for($i=1; $i < ($number + 1); $i++): 
        ?>
        <div class="modal modal-sheet position-static d-block bg-body-secondary p-2 py-md-1" tabindex="-1" role="dialog" id="modalSheet">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
            <img src="img/<?php echo $i ?>actor.gif" class="img-thumbnail">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-5">
                <?php 
                $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
                $sql = 'SELECT * FROM theatre.actors WHERE actor_id = :i;';
                $query = $pdo->prepare($sql);
                $query->execute(['i' => $i]);
                while($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo $row->actor_name;
                }
                ?>
                </h1>
            </div>
            <div class="modal-body py-0">
              <p>
              <?php 
                $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
                $sql = 'SELECT * FROM theatre.actors WHERE actor_id = :i;';
                $query = $pdo->prepare($sql);
                $query->execute(['i' => $i]);
                while($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo $row->actor_biography;
                }
                ?>
              </p>
              <?php
                 echo 'достижения: ';
                 $sql = 'SELECT a.achievements_name FROM theatre.actors_achievements aa JOIN theatre.achievements a ON a.achievements_id = aa.achievements_id JOIN theatre.actors ac ON ac.actor_id = aa.actors_id WHERE ac.actor_id = :i;';
                 $query = $pdo->prepare($sql);
                $query->execute(['i' => $i]);
                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo $row->achievements_name; 
                    echo ', ';
                    }
                ?>
            </div>
            <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                </div>
            </div>
        </div>
            </div>;
        <?php endfor; ?>
        </div>
    </div>

    <?php if ($_COOKIE['user'] == 'admin'): ?>
    <?php echo '<p style="text-align:center">', '<button style="background-color: #00CED1; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 4px;"><a href="addActor.php" style="color: white; text-decoration: none;">Добавить актёра</a></button></p>'; ?>
    <br>
    <?php echo '<p style="text-align:center">', '<button style="background-color: #00CED1; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 4px;"><a href="changeActor.php" style="color: white; text-decoration: none;">Изменить актёра</a></button></p>'; ?>
    <?php endif; ?>
    <?php require "footer.php" ?>

</body>

</html>