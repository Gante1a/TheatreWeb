<footer class="my-5 pt-5 text-body-secondary text-center text-small">
<?php 
        $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
        $sql = 'SELECT CAST(MAX(hotline_id) AS UNSIGNED) AS max_news_id FROM theatre.hotline;';
        $query = $pdo->prepare($sql);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_OBJ);
        $number = $row->max_news_id;
        for($i=1; $i < ($number + 1); $i++): 
        ?>
              
              <?php 
                $pdo = new PDO("mysql:host=localhost;dbname=theatre", "root", "Dergby-100");
                $sql = 'SELECT * FROM theatre.hotline WHERE hotline_id = :i;';
                $query = $pdo->prepare($sql);
                $query->execute(['i' => $i]);
                while($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo $row->hotline_name, " ";
                    echo $row->hotline_link, ", ";
                }
                ?>
              
        <?php endfor; ?>
        </div>
    </div>

    <p class="mb-1">крутой театр 2004-2023 ©</p>
      <li class="list-inline-item"><a href="popalsa.php"> крутой театр.com </a></li>
  </footer>