<?php
    include_once('header.php');
    $query = $db->query('SELECT * FROM rankings ORDER BY pokedollars DESC LIMIT 10');
    $rankingsData = $query->fetchAll(PDO :: FETCH_ASSOC);
    $rankings = [];
   
    foreach($rankingsData as $rankingData) {
        $ranking = new Ranking($rankingData);
        array_push($rankings, $ranking);
    }
?>
<div class="infoGameboy col-12 col-sm-10 offset-sm-1 mt-4">
    <table  class="d-flex justify-content-center">
        <tr>
            <th class="pe-lg-5 pt-3 pb-2 ps-1 border-bottom border-dark">Nom du Zoo</th>
            <th class="ps-sm-5 pe-sm-5 pt-3 pb-2  border-bottom border-dark">Nombre de pokédollars</th>
            <th class="ps-lg-5 pt-3 pb-2 border-bottom border-dark">Date du record</th>
        </tr>

        <?php 
            $index= 0;
            foreach($rankings as $ranking){
                echo('<tr><td class="pe-lg-5 pb-2 pt-2 ps-1 border-bottom border-dark">');
                if ($index === 0){
                    echo('<i class="fa-solid fa-trophy fa-xl" style="color: #f5c211;"></i> ');
                }
                else if ($index === 1){
                    echo('<i class="fa-solid fa-trophy fa-lg" style="color: #9a9996;"></i> ');
                }
                else if($index === 2){
                    echo('<i class="fa-solid fa-trophy fa-sm" style="color: #c64600;"></i> ');
                };
                echo($ranking->getNameZoo() . '</td>
                        <td class="ps-sm-5 pe-sm-5 pb-2 text-center border-bottom border-dark" >'. $ranking->getPokedollars() .'</td>
                        <td class="ps-lg-5 pb-2 border-bottom border-dark">'. $ranking->getCreatedAt() .'</td>
                    </tr>');
                    $index++;
            }
        ?>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>