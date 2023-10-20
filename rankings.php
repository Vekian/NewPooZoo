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
<div class="infoGameboy col-10 offset-1 mt-4">
    <table  class="d-flex justify-content-center">
        <tr>
            <th class="pe-5 pt-3 pb-2">Nom du Zoo</th>
            <th class="ps-5 pe-5 pt-3 pb-2">Nombre de pokédollars</th>
            <th class="ps-5 pt-3 pb-2">Date du record</th>
        </tr>

        <?php 
            $index= 0;
            foreach($rankings as $ranking){
                echo('<tr><td class="pe-5 pb-2">');
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
                        <td class="ps-5 pe-5 pb-2 text-center" >'. $ranking->getPokedollars() .'</td>
                        <td class="ps-5 pb-2">'. $ranking->getCreatedAt() .'</td>
                    </tr>');
                    $index++;
            }
        ?>
    </table>
</div>


<?php
    include_once('footer.php');
?>