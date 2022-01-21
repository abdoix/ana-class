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
    <title>Document</title>
    <?php
      include_once 'modul.php';
      session_start();
    ?>
</head>
<body>
  <?php
  include_once 'header.php';
  ?>
<!-- <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
<style>
* {
  box-sizing: border-box;
}

  body{
    max-width: 100%;
    position: relative;
    box-sizing: border-box;
    overflow-x:hidden;
  }

  #regForm {
  position: relative;
  background-color: #f0f0f0;
  margin: 100px 25%;
  font-family: Raleway;
  padding: 40px;
  width: 50%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
  border-radius: 4px;
}
input:focus-visible {
    outline:1.5px solid #0275d8 !important;
}
/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}


button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #f0f0f0;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #0275d8;
}
</style>

<form id="regForm" action="form.php" method='POST' enctype="multipart/form-data">
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Register</h2>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
    <p><input placeholder="First name..." oninput="this.className = ''" name="fname"></p>
    <p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p>
  </div>
  <div class="tab" >Contact Info:
    <p><input placeholder="E-mail..." oninput="this.className = ''" name="email" required></p>
    <label> date de naissance </label>
            <input name="date" type="date" ><br><br>
  </div>
  <div class="tab"> 
     <h5>City:</h5>
    <input placeholder="City" oninput="this.className = ''" name="ville"><br><br>
    <h5>Hobis</h5>
    <input name="loisir[]" value="music" type="checkbox" class="w-25">Music
    <input name="loisir[]" value="sport" type="checkbox" class="w-25">Sport
    <input name="loisir[]" value="travel" type="checkbox" class="w-25">Travel<br><br>
    <h5>Add Picture</h5>
    <input type='file'  oninput="this.className = ''" name="img"><br><br>
    <h5>Sexe</h5>
    <input value="F" name='sexe' type="radio" class="w-25" >Female
    <input  value="M" name='sexe' type="radio" class="w-25"> Male
    
  </div>
  <div class="tab">Login Info:
    <p><input placeholder="Username..." oninput="this.className = ''" name="user"></p>
    <p><input placeholder="Password..." oninput="this.className = ''" name="pass" type="password"></p>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" class="btn " onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" class="btn btn-primary px-3" onclick="nextPrev(1)" name="sub">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>


        <!-- <form action='form.php' method='POST'>
        user : <input type='text' name='user'>
        ville : <input type='text' name='ville'>
        passwor : <input type='password' name='pass'>
        <input type='submit' name='sub' value='submit' >
        <input type='reset'>
    </form> -->



<?php
include_once 'modul.php';
        if(!empty($_POST['user']))
        {
          $arrayloa;
          $strloa='';
          $j=0;
            // echo testread($_POST['user'],$_POST['pass']);
            if(testread($_POST['user'],$_POST['pass']) == 0)
            {
               $ag = explode('-',$_POST['date']);
               $ag = date('Y')-$ag[0];


               if (!empty($_POST["loisir"]))
               {
                  $arrayloa = $_POST["loisir"];
                  foreach($arrayloa as $elm){
                    if($j == count($arrayloa)-1)
                    {
                      $strloa .= "$elm";
                    }
                    else {
                      $strloa .= "$elm/";
                    }
                    $j++;
                      
                  } 
                }

               $myfillename = $_FILES['img']['name'];
               $myfillesize = $_FILES['img']['size'];

                move_uploaded_file($_FILES['img']['tmp_name'],"img/users/$myfillename");
                enrg($_POST['user'],$_POST['ville'],$myfillename,$ag,$_POST['sexe'],$strloa,$_POST['pass']);
?>
<script>
                //     window.location = 'http://localhost/prj/index.php';
</script>
<?php
            }
            else
            {
                $us = $_POST['user'];
                echo "<h1>$us existe Deja</h1>";
            }
            
        }
?>

<?php
    include_once "fotter.html";
?>
<link rel="stylesheet" href="css/bootstrap-select.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-select.min.js"></script>




  <script>
    let activeelm = document.querySelector('[href="form.php"]');
    let allelm = document.querySelectorAll('.a');
    allelm.forEach(element => {
      element.classList.remove('activeli');
    });
    activeelm.classList.add('activeli');
  </script>
</body>
</html>