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
        <h1 class="display-4 fw-bold text-body-emphasis">Добро пожаловать</h1>
        <h1 class="display-3 fw-bold text-body-emphasis"><?=$_COOKIE['user']?> </h1> <br>
    </div>
    <form action="exit.php" method="post">
        <button type="submit" name="send" class="btn btn-secondary">Выйти из аккаунта</button><br>
    </form> <br>

    <?php if ($_COOKIE['user'] != 'admin'): ?>
    
        <?php echo '<p style="text-align:center">', '<button style="background-color: #00CED1; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 4px;"><a href="complaints.php" style="color: white; text-decoration: none;">Написать жалобу</a></button></p>'; ?>

    <div class="modal-dialog"  style="text-align: center;">
        <h1 class="display-7 fw-bold text-body-emphasis">Билеты</h1>
    </div>

    </div>
    </div>
    <div class="col">
    <?php
    $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
    $sql = 'SELECT p.performances_name, p.performances_time FROM theatre.tickets t JOIN theatre.performances p ON t.tickets_performances = p.performances_id JOIN theatre.accounts a ON t.tickets_accounts = a.accounts_id WHERE a.account_name = :cook;';
    $query = $pdo->prepare($sql);
    $query->execute(['cook' => $_COOKIE['user']]);
    
    while ($row = $query->fetch(PDO::FETCH_OBJ)) :
    ?>
        <div class="modal modal-sheet position-static d-block bg-body-secondary p-2 py-md-1" tabindex="-1" role="dialog" id="modalSheet">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h1 class="modal-title fs-5">
                            <?php echo $row->performances_name; ?>
                        </h1>
                    </div>
                    <div class="modal-body py-0">
                        <p>
                            <?php echo $row->performances_time; ?>
                        </p>
                    </div>
                    <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

        </div>
    </div>
    <?php endif; ?>
    
    </div>

    <?php if ($_COOKIE['user'] == 'admin'): ?>
    

    <div class="modal-dialog"  style="text-align: center;">
        <h1 class="display-7 fw-bold text-body-emphasis">Жалобы</h1>
    </div>

    </div>
    </div>
    <div class="col">
        <?php 
        $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
        $sql = 'SELECT COUNT(complaint_id) AS total_complaints FROM theatre.complaints;';
        $query = $pdo->prepare($sql);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_OBJ);
        $number = $row->total_complaints;
        for($i=11; $i < ($number + 11); $i++): 
        ?>
        <div class="modal modal-sheet position-static d-block bg-body-secondary p-2 py-md-1" tabindex="-1" role="dialog" id="modalSheet">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-5">
                <?php 
                $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
                $sql = 'SELECT *  FROM theatre.complaints INNER JOIN theatre.accounts ON (complaints.complaint_account = accounts.accounts_id) WHERE complaint_id = :i';
                $query = $pdo->prepare($sql);
                $query->execute(['i' => $i]);
                while($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo $row->account_name;
                }
                ?>
                </h1>
            </div>
            <div class="modal-body py-0">
              <p>
              <?php 
                $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
                $sql = 'SELECT *  FROM theatre.complaints INNER JOIN theatre.accounts ON (complaints.complaint_account = accounts.accounts_id) WHERE complaint_id = :i';
                $query = $pdo->prepare($sql);
                $query->execute(['i' => $i]);
                while($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo $row->complaint_description;
                }
                ?>
              </p>
            </div>
            <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                </div>
            </div>
        </div>
            </div>;
        <?php endfor; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php require "footer.php" ?>

</body>

</html>