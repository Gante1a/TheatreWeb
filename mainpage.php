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
    <div class="container">
        <h3 class="mb-5"> Теа́тр (греч. θέατρον — основное значение — место для зрелищ, затем — зрелище, от θεάομαι — смотреть, видеть) — зрелищный вид искусства, представляющий собой синтез различных искусств (литературы, музыки, хореографии, вокала, изобразительного искусства и других) и обладающий собственной спецификой: отражение действительности, конфликтов, характеров, а также их трактовка и оценка, утверждение тех или иных идей здесь происходит посредством драматического действия, главным носителем которого является актёр.
Родовое понятие «театр» включает в себя различные его виды и формы: драматический театр, оперный, балетный, кукольный, театр пантомимы и др
Во все времена театр представлял собой искусство коллективное; в современном театре в создании спектакля, помимо актёров и режиссёра (дирижёра, балетмейстера), участвуют художник-сценограф, композитор, хореограф, а также бутафоры, костюмеры, гримёры, рабочие сцены, осветители.
        </h3>    
    <div class="modal-dialog"  style="text-align: center;">
        <h1 class="display-4 fw-bold text-body-emphasis">Новости</h1>
    </div>
    </div>
    <div class="col">
        <?php 
        $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
        $sql = 'SELECT CAST(MAX(news_id) AS UNSIGNED) AS max_news_id FROM theatre.news;';
        $query = $pdo->prepare($sql);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_OBJ);
        $number = $row->max_news_id;
        for($i=1; $i < ($number + 1); $i++): 
        ?>
        <div class="modal modal-sheet position-static d-block bg-body-secondary p-2 py-md-1" tabindex="-1" role="dialog" id="modalSheet">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
            <img src="img/<?php echo $i ?>0.jpg" class="img-thumbnail">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-5">
                <?php 
                $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
                $sql = 'SELECT * FROM theatre.news WHERE news_id = :i;';
                $query = $pdo->prepare($sql);
                $query->execute(['i' => $i]);
                while($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo $row->news_description;
                }
                ?>
                </h1>
            </div>
            <div class="modal-body py-0">
              <p>
              <?php 
                $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
                $sql = 'SELECT * FROM theatre.news WHERE news_id = :i;';
                $query = $pdo->prepare($sql);
                $query->execute(['i' => $i]);
                while($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo $row->news_link;
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
    <?php require "footer.php" ?>
</body>
</html>