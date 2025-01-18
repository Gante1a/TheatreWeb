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

    <div class="modal-dialog" style="text-align: center;">
        <h1 class="display-4 fw-bold text-body-emphasis">Представления</h1>
    </div>

    </div>
    </div>
    <div class="col">
        <?php
        $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
        $sql = 'SELECT CAST(MAX(performances_id) AS UNSIGNED) AS max_news_id FROM theatre.performances;';
        $query = $pdo->prepare($sql);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_OBJ);
        $number = $row->max_news_id;
        for ($i = 1; $i < ($number + 1); $i++) :
            ?>
            <div class="modal modal-sheet position-static d-block bg-body-secondary p-2 py-md-1" tabindex="-1" role="dialog" id="modalSheet">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h1 class="modal-title fs-5">
                                <?php
                                $sql = 'SELECT * FROM theatre.performances WHERE performances_id = :i;';
                                $query = $pdo->prepare($sql);
                                $query->execute(['i' => $i]);
                                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                                    if ($_COOKIE['user'] != '' && $_COOKIE['user'] != 'admin') {
                                        if ($_COOKIE['user'] != '' && $_COOKIE['user'] != 'admin') {
                                            echo '<button style="background-color: #00CED1; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 4px;"><a href="performances.php?performance_id=' . $row->performances_id . '" style="color: white; text-decoration: none;">Купить</a></button>';
                                            echo '<br></br>';
                                        
                                            // Вставка новой записи в таблицу tickets
                                            if (isset($_GET['performance_id']) && $_GET['performance_id'] == $row->performances_id) {
                                                $performanceID = $_GET['performance_id'];
                                        
                                                $sql = 'INSERT INTO theatre.tickets (tickets_accounts, tickets_performances) 
                                                        VALUES ((SELECT accounts_id FROM theatre.accounts WHERE account_name = :login), :performanceID); ';
                                        
                                                $query = $pdo->prepare($sql);
                                                $query->execute(['performanceID' => $performanceID, 'login' => $_COOKIE['user']]);
                                            }
                                        }
                                        
                                    }
                                    echo $row->performances_name;
                                }
                                ?>
                            </h1>
                        </div>
                        <div class="modal-body py-0">
                            <p>
                                <?php
                                $sql = 'SELECT * FROM theatre.performances WHERE performances_id = :i;';
                                $query = $pdo->prepare($sql);
                                $query->execute(['i' => $i]);
                                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                                    echo 'краткое описание:  ', $row->performances_description;
                                }
                                ?>
                            </p>
                            <p>
                                <?php
                                $sql = 'SELECT * FROM theatre.performances WHERE performances_id = :i;';
                                $query = $pdo->prepare($sql);
                                $query->execute(['i' => $i]);
                                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                                    echo 'время:  ', $row->performances_time;
                                }
                                ?>
                                
                            </p>
                            <p>
                                <?php
                                echo 'актёры: ';
                                $sql = 'SELECT actor_name FROM theatre.actors JOIN theatre.performances_actors ON actors.actor_id = performances_actors.actors_id JOIN theatre.performances ON performances.performances_id = performances_actors.performances_id WHERE performances.performances_id = :i;';
                                $query = $pdo->prepare($sql);
                                $query->execute(['i' => $i]);
                                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                                    echo $row->actor_name; 
                                    echo ', ';
                                }
                                ?>
                                
                            </p>
                        </div>
                        <div class="modal-footer flex-column align-items

-stretch w-100 gap-2 pb-3 border-top-0">
                        </div>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
    </div>

    <?php if ($_COOKIE['user'] == 'admin'): ?>
    <?php echo '<p style="text-align:center">', '<button style="background-color: #00CED1; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 4px;"><a href="addPerformance.php" style="color: white; text-decoration: none;">Добавить представление</a></button></p>'; ?>
    <br>
    <?php echo '<p style="text-align:center">', '<button style="background-color: #00CED1; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 4px;"><a href="changePerformance.php" style="color: white; text-decoration: none;">Изменить представление</a></button></p>'; ?>
    <br>
    <?php endif; ?>
    

    <?php require "footer.php" ?>

</body>

</html>
