<?php
    include_once "manage.php";
    if(isset($_POST["catid"]))
    {
      $lmt = ($_POST["limit"] -1) * 6;
        $result = Manager::get_card_by_id($_POST["catid"],$_POST["order"],$lmt);
        $resultcat = Manager::get_cat($_POST["catid"]);
        echo "<h1>$resultcat[3]</h1>
        <p class='mb-4'>$resultcat[2]</p>";
        echo "<div class='my-4' style='display:grid; grid-template-columns: auto auto auto; gap:1rem;'>";
        $oldprice = 20;
        while($row = $result->fetch())
        {
            $oldprice = $row[5] + rand(1,10);
            echo "<div class='card text-left' style='height:300px;'>
            <!-- <span class='heart'>
              <i class='fas fa-heart'></i>
            </span> -->
            <img class='card-img-top' id='img' width='100%' height='100px' src='img/card/$row[3]' alt=''>
        
            <!-- <p class='card-text card-img-overlay'><span class='lead badge badge-dark'>NEXT MOUNTH</span></p> -->
                    
            <div class='card-body pb-0 pt-1' style='height:150px;'>
              <h4 class='card-title my-0' id='name'>$row[1]</h4>
              <small class='my-0' id='dsc'>$row[2]</small>
            </div>
            <div class='c ml-3'><a class='text-dark display-8 pr-2'><small>";

            for($i=1;$i <= intval($row[6]);$i++)
            {
                echo "<i class='fa fa-star text-warning' aria-hidden='true'></i>";
            }
            echo "</small></a><a class='text-secondary font-weight-normal'><small>vues 350</small></a>
            </div>
            <div class='card-footer d-flex flex-row justify-content-between align-items-center' style='height:50px;'>
            <span id='price'>$$row[5] <small class='text-secondary'>(<s>$$oldprice</s>)</small></span>
            <!-- <button class='btn btn-primary' type='button'>add to card</button> -->
            <button type='button' class='btn btn-outline-primary py-1 addto' data-mdb-ripple-color='dark' value='$row[0]'>add to card</button>
            </div>
            </div>";
        }
        $result->closeCursor();
        echo "</div><nav class='float-right' aria-label='Page navigation example'>
        <ul class='pagination'>";
        for($i=1;$i<=intval(Manager::get_count($_POST["catid"]));$i++)
        {
          echo "<li class='page-item'><a class='page-link' vp='$i'>$i</a></li>";
        }
        echo "</ul></nav>";
    
    }

?>


