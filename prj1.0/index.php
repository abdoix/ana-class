<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600&family=Roboto&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php
      include_once 'modul.php';
      include_once "user.php";
      include_once "manage.php";

      session_start();
      $usercookie='';
      $passcookie='';
      //coockietest
	    if(isset($_COOKIE['user']))
      {
        $usercookie = $_COOKIE['user'];
        $passcookie = $_COOKIE['pass'];
      }

      if(isset($_POST['sub']))
      {
        
        
        //create function (static) in manage and call to test if existe or not
        $test = Manager::user_test($_POST["user"],$_POST["pass"]);
        if(empty($test))
        {
          $user = $_POST["user"];
          echo "<h1 style='color=red'>$user n'existe pas</h1>";
        }
        else
        { 
          //create object user from class user and set in session["user"]  
          $_SESSION["user"] = new user($test);
          //check if checkboox chcked to create coockie
            if(isset($_POST["check"]))
            {
              //this is coockie 

              $userco = $_POST["user"];
              $passco = $_POST["pass"];
              setcookie('user',"$userco", time() + (86400 * 30));
              setcookie('pass',"$passco", time() + (86400 * 30));
              $gag = $_COOKIE['user'];
              //this is coockie 
            }
            echo "<script>window.location = 'search.php';</script>";
        }
        
      }






    
    ?>
</head>
<style>
  body{
    max-width: 100%;
    position: relative;
    box-sizing: border-box;
    overflow-x:hidden;
  }
  #dd:hover
    {
      background-color: #007bff;
      color: #fff;
      border-radius: 6px;
    }
</style>
<body>
<?php include_once 'header.php'; ?>
<div style="margin-left: 30%; margin-right: 30%; background-color: #f0f0f0;" class="p-4 mt-5">
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active mr-3 ml-3"
      id="tab-login"
      data-mdb-toggle="pill"
      href="#pills-login"
      role="tab"
      aria-controls="pills-login"
      aria-selected="true"
      >Login</a
    >
  </li>
  <li class="nav-item" role="presentation" id="dd">
    <a
      class="nav-link mr-3  "
      id="tab-register"
      data-mdb-toggle="pill"
      href="form.php"
      role="tab"
      aria-controls="pills-register"
      aria-selected="false"
      >Register</a
    >
  </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content">
  <div
    class="tab-pane fade show active"
    id="pills-login"
    role="tabpanel"
    aria-labelledby="tab-login"
  >
    <form action="index.php" method="post">
      <div class="text-center mb-3">
        <p>Sign in with:</p>
        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>

      <p class="text-center">or:</p>

      <!-- Email input -->
      <div class="form-outline mb-4 w-75 ml-5">
        <input type="text" value='<?=$usercookie?>' id="loginName" name="user" class="form-control" name="username" />
        <label class="form-label" for="loginName">Email or username</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4 w-75 ml-5">
        <input type="password" value="<?=$passcookie?>" name="pass" id="loginPassword" class="form-control" />
        <label class="form-label" for="loginPassword">Password</label>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check mb-3 mb-md-0 ">
            <input
              class="form-check-input"
              type="checkbox"
              value=""
              id="loginCheck"
              name="check"
              checked
            />
            <label class="form-check-label" for="loginCheck"> Remember me </label>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
          <!-- Simple link -->
          <a href="#!">Forgot password?</a>
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4 w-75 ml-5" name="sub">Sign in</button>

      <!-- Register buttons -->
      <div class="text-center">
        <p>Not a member? <a href="form.php">Register</a></p>
      </div>
    </form>
  </div>

</div>
</div>
    <?php      //go to search page


    include_once "fotter.html";
    ?>
<link rel="stylesheet" href="css/bootstrap-select.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <!-- <link rel='stylesheet' href="css/style.css"> -->



    <script>
    let activeelm = document.querySelector('[href="index.php"]');
    let allelm = document.querySelectorAll('.a');
    allelm.forEach(element => {
      element.classList.remove('activeli');
    });
    activeelm.classList.add('activeli');
  </script>
</body>
</html>