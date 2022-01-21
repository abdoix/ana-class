<?php
include_once 'manage.php';
include_once 'user.php';
                    if(!empty($_POST['ville']))
                    {
                      $arraif = $_POST['ville'];
                      if($arraif[0] == "all")
                      {
                        $cmp =1; 
                        $cmpaccord =1;  
                        // echo $_POST['ville'];
                        $villesearch = Manager::get_ville_all();
                        while ($selectedOption = $villesearch->fetch())
                        {
                          $resultcity = manager::get_ville($selectedOption[0]);
                          if(!empty($resultcity))
                          {                            
                            while($myarray = $resultcity->fetch())
                            {
                                // echo $myarray[0];
                                // echo $myarray[1];
                                // echo "<br>";
                            echo "<div class='border p-2 mb-3 bg-white' style='border-radius:10px;width:49%;'><div class='headings d-flex justify-content-center align-items-center mb-3'><h6>The result of <span class='font-weight-bold text-danger'>$selectedOption[0] </span>City</h6></div>";
                            echo "<div id='accord$cmpaccord' class='d-flex flex-column w-100' style='gap:1rem;overflow:auto;height:300px;'>";
                              echo "<div class='card mx-auto p-3 w-75 shadow '>
                                  <div id='heading$cmp' class='card-header d-flex justify-content-between align-items-center w-100 h-100'>
                                      <div class='user d-flex flex-row align-items-center'>
                                        <img src='img/users/$myarray[photo]' width='50' height='50' class='user-img rounded-circle mr-3'>
                                        <span>
                                          <small class='font-weight-bold text-primary'>@$myarray[handler]</small>
                                          <small class='font-weight-bold text-secondary'>From</small>
                                          <small class='font-weight-bold text-dark'>$myarray[city]</small>
                                        </span>
                                      </div>
                                      <small>
                                      <button class='btn btn-link collapsed hover-text-info'  data-toggle='collapse' data-target='#collapse$cmp' aria-expanded='true' aria-controls='collapse$cmp'>
                                      <i class='fas fa-align-right'></i>
                                      </button>
                                    </small>
                                  </div>
                                  <div id='collapse$cmp' class='collapse' style='transition: 1s;' aria-labelledby='heading$cmp' data-parent='#accord$cmpaccord'>
                                    <div class='card-body table-responsive'>
                                    <table class='table table-sm text-center'>
                                    <thead>
                                      <tr>
                                        <th scope='col'>name</th>
                                        <td>$myarray[handler]</td>
                                      </tr>
                                      <tr>
                                      <th scope='col'>age</th>
                                      <td>$myarray[age]</td>
                                      </tr>
                                      <tr>
                                      <th scope='col'>City</th>
                                      <td>$myarray[city]</td>
                                      </tr>
                                      <tr>
                                      <th scope='col'>gender</th>
                                      <td>$myarray[gender]</td>
                                      </tr>
                                      <tr>
                                      <th scope='col'>hobbies</th>
                                      <td>$myarray[hobbies]</td>
                                      </tr>
                                    </thead>
                                  </table>
                                    </div>
                                  </div>
                              </div>";
                              $cmp++;
                            }
                            $resultcity->closeCursor();
                          }
                          echo'</div></div>';
                          $cmpaccord++;
                        }
  
  
                      }
                      else{
                      $cmp =1; 
                      $cmpaccord =1;  
                      // echo $_POST['ville'];
                        $villesearch = $_POST['ville'];
                        
                        foreach($villesearch as $selectedOption)
                        {
                          $resultcity = manager::get_ville($selectedOption);
                          if(!empty($resultcity))
                          {                            
                            while($myarray = $resultcity->fetch())
                            {
                                // echo $myarray[0];
                                // echo $myarray[1];
                                // echo "<br>";
                              echo "<div class='border p-2 mb-3 bg-white' style='border-radius:10px;width:49%;'><div class='headings d-flex justify-content-center align-items-center mb-3'><h6>The result of <span class='font-weight-bold text-danger'>$selectedOption </span>City</h6></div>";
                              echo "<div id='accord$cmpaccord' class='d-flex flex-column w-100' style='gap:1rem;overflow:auto;height:300px;'>";
                              echo "<div class='card mx-auto p-3 w-75 shadow '>
                                  <div id='heading$cmp' class='card-header d-flex justify-content-between align-items-center w-100 h-100'>
                                      <div class='user d-flex flex-row align-items-center'>
                                        <img src='img/users/$myarray[photo]' width='50' height='50' class='user-img rounded-circle mr-3'>
                                        <span>
                                          <small class='font-weight-bold text-primary'>@$myarray[handler]</small>
                                          <small class='font-weight-bold text-secondary'>From</small>
                                          <small class='font-weight-bold text-dark'>$myarray[city]</small>

                                          
                                        </span>
                                      </div>
                                      <small>
                                      <button class='btn btn-link collapsed hover-text-info'  data-toggle='collapse' data-target='#collapse$cmp' aria-expanded='true' aria-controls='collapse$cmp'>
                                      <i class='fas fa-align-right'></i>
                                      </button>
                                    </small>
                                  </div>
                                  <div id='collapse$cmp' class='collapse' style='transition: 1s;' aria-labelledby='heading$cmp' data-parent='#accord$cmpaccord'>
                                    <div class='card-body table-responsive'>
                                    <table class='table table-sm text-center'>
                                    <thead>
                                      <tr>
                                        <th scope='col'>name</th>
                                        <td>$myarray[handler]</td>
                                      </tr>
                                      <tr>
                                      <th scope='col'>age</th>
                                      <td>$myarray[age]</td>
                                      </tr>
                                      <tr>
                                      <th scope='col'>City</th>
                                      <td>$myarray[city]</td>
                                      </tr>
                                      <tr>
                                      <th scope='col'>gender</th>
                                      <td>$myarray[gender]</td>
                                      </tr>
                                      <tr>
                                      <th scope='col'>hobbies</th>
                                      <td>$myarray[hobbies]</td>
                                      </tr>
                                    </thead>
                                  </table>
                                    </div>
                                  </div>
                              </div>";
                              $cmp++;
                            }
                            $resultcity->closeCursor();
                            echo'</div></div>';
                            $cmpaccord++;
                          }
                          else
                          {
                            echo "<h1>****************************</h1>";
                            echo "<script>console.log('à')</script>";
                          }

                        }
                    }
                  }
                        // echo testread($_POST['user'],$_POST['pass']);
                
            ?>