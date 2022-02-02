<?php
  include_once 'user.php';
          session_start();
          $userarray = $_SESSION["user"];
          $id = $userarray[0];
          $user = $userarray[1];
          $email = $userarray[2];
          $pass = $userarray[3];
          $image = $userarray[4];
          $city = $userarray[5];
          $gender = $userarray[6];
          $age = $userarray[7];
          $hob = $userarray[8];

if(!empty($_POST['subb'])){
    echo "<div class='modal-dialog' role='document'>
    <div class='modal-content'>
  <div class='modal-header'>
    <h5 class='modal-title' id='exampleModalLabel'>Edit Information</h5>
    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
  <div class='modal-body'>


    <form class='form-horizontal d-flex flex-column '>

    <div class='my-3 mx-auto shadow img-edit' style='box-sizing: border-box;width:100px;height:100px;background:url(\"img/users/$image\");border-radius:50px;background-repeat: no-repeat;background-size: cover'>
      <input type='file' style='opacity:0;' name='img' class='my-4'>
      <span class='position-absolute'>
      <i class='fas fa-pencil-alt '></i>
      </span>
    </div>
    <div class='form-group mx-auto w-75' style='border:1px solid #f0f0f0;min-height:50px;'>
      <div class='p-2 font-weight-bold border-primary' style='border-bottom: 2px solid;background:#f0f0f0;'>
        <span>security info</span>
        <span class='more fas fa-arrow-circle-down float-right p-3' ></span>
        <br/>
        <small class='text-secondary'>Edit your handler or your password</small>
      </div>
      <div class='moresec p-2' style='display:none;'>
        <div class='form-group mx-auto w-75 testhand' id='testhand'>

            <input type='text' class='form-control' id='user' name='usrmod' placeholder='new username' required value='$user' >
            <small></small>
        </div>
        <div class='form-group mx-auto w-75 testpass'>

            <input type='password' class='form-control pass1' name ='passmod' id='pass' placeholder='new password' required value='$pass'>
            <small></small>

        </div>
        <div class='form-group mx-auto w-75'>
          <input type='password' class='form-control pass2'  placeholder='new password again' required value='$pass'>
            <small></small>
        </div>
        <span class='fas fa-sync-alt float-right p-3' id='rest1'></span>
      </div>
    </div>

    <div class='form-group mx-auto w-75' style='border:1px solid #f0f0f0;min-height:50px;'>
    <div class='p-2 font-weight-bold border-primary' style='border-bottom: 2px solid;background:#f0f0f0;'>
        <span>General info</span>
        <span class='more fas fa-arrow-circle-down float-right p-3' ></span>
        <br/>
        <small class='text-secondary'>Edit your Email or Gender or Age ...</small>
      </div>  
      <div class='moresec p-2' style='display:none;'>
      
        <div class='form-group mx-auto w-75'>
            <input type='text' class='form-control' name ='emailmod' id='email' placeholder='Enter new E-mail' required value='$email'>
            <small></small>
        </div>
        <div class='form-group mx-auto w-75'>
          <div >
            <input type='text' class='form-control' name ='villemod' id='ville' placeholder='Enter new ville' required value='$city'>
          </div>
        </div>
        <div class='form-group mx-auto w-75'>
          <div>
            <input type='number' class='form-control' min=0 max=150  name ='agemod' id='age' placeholder='Enter new age' required value='$age'>
          </div>
        </div>
        <span class='fas fa-sync-alt float-right p-3' id='rest2'></span>
      </div>
    </div>
      <button type='button' class='btn btn-default btn-primary' name='submod' id='save'>Save changes</button>
    </form>
  </div></div></div>";
}

?>
