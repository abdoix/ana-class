<?php
    include_once "classprd.php";
    include_once "classpanier.php";
    include_once "manage.php";
      session_start();
        $mypanier = $_SESSION["panier"];

        if(isset($_POST['addprd']))
        {
          $id = $_POST['id'];
          $name = $_POST['name'];
          $dsc = $_POST['dsc'];
          $img = $_POST['img'];
          $price = floatval($_POST['price']);
          // echo "$id,$name,$dsc,$img,$price";
          $objt = new prd($id,$name,$dsc,$img,$price);
          $mypanier->ajo_prd($objt);
          // echo $objt->getName();
          $tab = $mypanier->get_tab_prd();
          //  echo $tab[0]->getId();
        }
        if(isset($_POST['aff']))
        {
          $myarray = [];
          $myarray =  $mypanier->get_tab_prd();
          if(!empty($myarray)){
                        $cmp=0;
            echo "<div class='d-flex flex-row justify-content-end'><a href='#' id='selall' class='d-none'>sellect all</a><a href='#' id='selshow'>select</a></div>";
              foreach($myarray as $elm)
              {
                $getid = $elm->getId();
                $getname = $elm->getName();
                $getdsc = $elm->getDsc();
                $getphoto = $elm->getImg();
                $getprice = $elm->getPrice();
                $oldprice = $getprice + rand(1,10);
                $getqnt = $elm->getQnt();
                $gettotal = $elm->getTotal();



                echo "<div class='d-flex justify-content-center row my-4 prd'>
                <div class='col-md-10'>
                  <div class='row p-2 bg-white border rounded'>
                    <div class='col-md-3 mt-1'><img class='img-fluid img-responsive rounded product-image' src='$getphoto'></div>
                    <div class='col-md-6 mt-1'>
                        <h5>$getname</h5>
                        <div class='d-flex flex-row'>
                            <div class='ratings mr-2'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></div><span>310</span>
                        </div>
                        <p class='text-justify text-truncate para mb-0'>$getdsc.<br><br></p>
                        <div class='d-flex flex-row align-items-center'>
                          <h4 class='mr-1'>Unit price : $$getprice</h4><span class='strike-text'><small class='text-secondary'>(<s>$$oldprice</s>)</small></span>
                        </div>
                        <div>
                          <h6>Amount : $getqnt</h6>
                        </div>
                    </div>
                    <div class='align-items-center align-content-center col-md-3 border-left mt-1'>
                      <div class='d-flex justify-content-end w-100'>
                        <input type='checkbox' name='deletecheck[]' class='delcheck d-none w-auto' style='right:-10px; ' value='$cmp'>  
                      </div>  
                        <div class='d-flex flex-row align-items-center'>
                          <h4 class='mr-1'>$$gettotal</h4><span class='strike-text'><small class='text-secondary'>(<s>$$oldprice</s>)</small></span>
                        </div>
                        <h6 class='text-success'>Free shipping</h6>
                        <button class='btn btn-primary btn-sm my-2 mx-auto w-100 e-d-show' type='button'>Edit / Delet</button>
                        <div style='visibility: hidden;' class='d-flex flex-row justify-content-between align-items-center w-75 mx-auto '>
                          <div class='w-25'>
                            <input type='number' iditem='$getid' class='qntchange bg-light text-secondary' min='1 max='100' value='$getqnt'>
                          </div>
                          <i class='fas fa-trash-alt' iditem='$cmp'></i>
                        </div>
                    </div>
                  </div>
                </div>
              </div>";
              $cmp++;
              }
              echo "<input type='button' value='delete' class='w-auto float-right' id='del'>";
          }
          else echo "";

        }

        if(isset($_POST['total']))
        {
          echo $mypanier->prix_total();
        }                



        //changeqnt
        if(isset($_POST['changeqnt']))
        {
          $myarray =  $mypanier->get_tab_prd();
          foreach($myarray as $elm)
          {
            $getid = $elm->getId();
            if($getid == $_POST['id']){
              // echo ""
              $elm->setQnt($_POST['changeqnt']);
            }            
          }
        }

        //delete one item
        if(isset($_POST['delete']))
        {
          $indx = intval($_POST['delete']);
        
          $mypanier->delete($indx);
        }



        // //delete one item or more
        if(isset($_POST['subdelete']))
        {
            foreach ($_POST['subdelete'] as $elm) {
               
              $indx = intval($elm);
              $mypanier->deleteselect($indx);
            }
            $mypanier->set_tab_prd(array_values($mypanier->get_tab_prd()));
            // header("location:panier.php?aff=aff");
        }   
?>
