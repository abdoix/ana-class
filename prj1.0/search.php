<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
  body{
    max-width: 100%;
    position: relative;
    box-sizing: border-box;
    overflow-x:hidden;
  }
* {
  box-sizing: border-box;
  scroll-behavior: smooth;
}
.form-control:focus {
    color: #495057;
    background-color: #fff !important;
    border:2px solid #80bdff !important;
    outline: 3px !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
}
*::-webkit-scrollbar {
  width: 6px;               
}
*::-webkit-scrollbar-track {
  background: transparent;   
}
*::-webkit-scrollbar-thumb {
  background-color: #cacaca;   
  border-radius: 20px; 
  }  
   

/*effect*/
.kiki div:hover{
  opacity:1 !important;
}
.box {
  background: hsl(0, 0%, 100%);
  width:50px;
  height:50px;
  outline: none !important;
  border:none !important;
  padding: 16px 16px;
  position: relative;
  border-radius: 50px;
  box-shadow: 0 0 0 0px rgba(0,0,0,.01);
  /* z-index: 999; */
}
.bootstrap-select .dropdown-toggle:focus, .bootstrap-select>select.mobile-device:focus+.dropdown-toggle {
    outline: none !important;
    outline: none !important;
    outline-offset: none;
}
.dropdown-toggle:focus-visible {
    outline:none !important;
}
.box:focus {
    outline: none !important;
}
  .box::after {
    position: absolute;
    content: "";
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    transform: scale(2) translateZ(0);
    filter: blur(15px);
    background: linear-gradient(to left,#ff5770,#e4428d,#c42da8,#9e16c3,#6501de,#9e16c3,#c42da8,#e4428d,#ff5770
    );
    background-size: 150% 150%;
    animation:inherit;
    z-index: -1;
  }
  .effectactive{
    animation: animateGlow 1.25s linear infinite;
  }
  .content {
    max-width:100%;
    background:url('img/back/features-background.jpg');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    z-index: 1;
}
.form-cont{
  z-index:9;
}
.more:hover{
  border-radius:50px;
  background-color:#f0f0f0;
  color:#007bff;
  cursor: pointer;
}
#rest2:hover,#rest1:hover{  border-radius:50px;
  background-color:#f0f0f0;
  /* color:#007bff; */
  cursor: pointer;
}


@keyframes animateGlow {
  0% {
    background-position: 0% 50%;
  }
  100% {
    background-position: 200% 50%;
  }
}
#err,#sec
{
  visibility: hidden;
  z-index: 10;
}
.err,.sec
{
  visibility: visible !important;
  display:block;
  max-width:25%;

}
.err span,.err span
{
  cursor: pointer;
}
.img-edit span{
  margin-top: -20px;
  margin-left: -55px;
  opacity:0;
  transition: opacity 0.1s;
}
.img-edit:hover{
  opacity:0.8;
}
.img-edit:hover span{
  /* display:block; */
  opacity:1 !important;
  /* margin-top:-50px; */
  transition: opacity 2s;
  
}

.good input:focus{
    border:2px solid #42ba96 !important;
}
.good small{
  color: 	#42ba96;
}

.bad small{
    color: #df4759;
}
  .bad input:focus{
    border:2px solid #df4759 !important;
}
</style>
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600&family=Roboto&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<?php

include_once 'modul.php';
include_once 'manage.php';
include_once 'user.php';
// session_destroy();
session_start();

if(!isset($_SESSION["user"]))
{
  header("Location: index.php");
}

?>
</head>
<body style='max-width: 100%;'>

<div id="load">
<?php
include_once 'header.php';
?>
</div>


<?php
if(!empty($_POST["submod"]))
{
  $newimage = $image;
  if(!empty($_FILES['img']['name']))
  {
    $newimage = $_FILES['img']['name'];
    echo "<script>console.log('$newimage')</script>";
  }
  if($_POST['usrmod'] != $user || $_POST['passmod'] != $pass )
  {
    $newuser = $_POST['usrmod'];
    $newpass = $_POST['passmod'];
    $newemail = $_POST['emailmod'];
    $_SESSION["user"] = [$id,$newuser,$newemail,$newpass,$image,$city,$gender,$age,$hob];
    $user = $_SESSION["user"];
    $fin = Manager::user_changeinfo($user[0],$user[1],$user[2],$user[3],$user[4],$user[5],$user[6],$user[7],$user[8]);

  }
  if($_POST['villemod'] != $city || $_POST['emailmod'] != $email || $_POST['agemod'] != $age || $newimage != $image)
  {
    if($newimage != $image){
      unlink("img/users/$image");
      move_uploaded_file($_FILES['img']['tmp_name'],"img/users/$newimage");
      $image = $newimage;
    }

      $newcity = $_POST['villemod'];
      $agenew = $_POST['agemod'];
      $newemail = $_POST['emailmod'];
      $_SESSION["user"] = array($id,$user,$newemail,$pass,$image,$newcity,$gender,$agenew,$hob);
      $user = $_SESSION["user"];
      $fin = Manager::user_changeinfo($user[0],$user[1],$user[2],$user[3],$user[4],$user[5],$user[6],$user[7],$user[8]);
  }
}
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Information</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form class="form-horizontal d-flex flex-column " >
         
          <div class="my-3 mx-auto shadow img-edit" style='width:100px;height:100px;border-radius: 50px;'>
            <img src="img/users/<?=$image?>" width='100' height='100' class="rounded-circle">  
            <input type='file' name='img' id="img" class='my-4' style="position:absolute;margin:0 -100px;cursor: pointer;opacity:0;">
            <span class='position-absolute'>
              <i class="fas fa-pencil-alt"></i>
            </span>
            
          </div>


      <div class="form-group mx-auto w-75" style="border:1px solid #f0f0f0;min-height:50px;">
        <div class='p-2 font-weight-bold border-primary' style='border-bottom: 2px solid;background:#f0f0f0;'>
          <span>security info</span>
          <span class="more fas fa-arrow-circle-down float-right p-3" ></span>
          <br/>
          <small class="text-secondary">Edit your handler or your password</small>
        </div>
        <div class="moresec p-2" style="display:none;">
          <div class="form-group mx-auto w-75 testhand" id="testhand">

              <input type="text" class="form-control" id="user" name='usrmod' placeholder="new username" required value="<?=$user?>" >
              <small></small>
          </div>
          <div class="form-group mx-auto w-75 testpass">

              <input type="password" class="form-control pass1" name ='passmod' id="pass" placeholder="new password" required value="<?=$pass?>">
              <small></small>

          </div>
          <div class="form-group mx-auto w-75">
            <input type="password" class="form-control pass2"  placeholder="new password again" required value="<?=$pass?>">
              <small></small>
          </div>
          <span class="fas fa-sync-alt float-right p-3" id="rest1"></span>
        </div>
      </div>

      <div class="form-group mx-auto w-75" style="border:1px solid #f0f0f0;min-height:50px;">
      <div class='p-2 font-weight-bold border-primary' style='border-bottom: 2px solid;background:#f0f0f0;'>
          <span>General info</span>
          <span class="more fas fa-arrow-circle-down float-right p-3" ></span>
          <br/>
          <small class="text-secondary">Edit your Email or Gender or Age ...</small>
        </div>  
        <div class="moresec p-2" style="display:none;">
        
          <div class="form-group mx-auto w-75">
              <input type="text" class="form-control" name ='emailmod' id="email" placeholder="Enter new E-mail" required value="<?=$email?>">
              <small></small>
          </div>
          <div class="form-group mx-auto w-75">
            <div >
              <input type="text" class="form-control" name ='villemod' id="ville" placeholder="Enter new ville" required value="<?=$city?>">
            </div>
          </div>
          <div class="form-group mx-auto w-75">
            <div>
              <input type="number" class="form-control" min=0 max=150  name ='agemod' id="age" placeholder="Enter new age" required value="<?=$age?>">
            </div>
          </div>
          <span class="fas fa-sync-alt float-right p-3" id="rest2"></span>
        </div>
      </div>
        <button type="button" class="btn btn-default btn-primary" name="submod" id="save">Save changes</button>
      </form>
    </div>
  </div>
  </div>
</div>


<section class="py-0 py-xl-5">
	<div class="container">
		<div class="d-felx flex-row justify-content-around row g-4 kiki">
			<!-- Counter item -->
			<div class="col-sm-6 col-xl-3 " style='opacity:80%;'>
				<div class="d-flex justify-content-center align-items-center p-4 bg-warning bg-opacity-15 rounded-3">
					<span class="display-6 lh-1 text-secondry mb-0"><i class="fas fa-tv"></i></span>
					<div class="ms-4 h6 fw-normal">
						<div class="d-flex">
							<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="10" data-purecounter-delay="200" data-purecounter-duration="0">10</h5>
							<span class="mb-0 h5">K</span>
						</div>
						<p class="mb-0 text-white">Online Courses</p>
					</div>
				</div>
			</div>
			<!-- Counter item -->
			<div class="col-sm-6 col-xl-3 " style='opacity:80%;'>
				<div class="d-flex justify-content-center align-items-center p-4 bg-primary bg-opacity-10 rounded-3">
					<span class="display-6 lh-1 text-blue mb-0"><i class="fas fa-user-tie"></i></span>
					<div class="ms-4 h6 fw-normal">
						<div class="d-flex">
							<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="200" data-purecounter-delay="200" data-purecounter-duration="0">200</h5>
							<span class="mb-0 h5">+</span>
						</div>
						<p class="mb-0 text-white">Expert Tutors</p>
					</div>
				</div>
			</div>
			<!-- Counter item -->
			<div class="col-sm-6 col-xl-3 " style='opacity:80%;'>
				<div class="d-flex justify-content-center align-items-center p-4 bg-purple  rounded-3" style='background:#6f42c1;'>
					<span class="display-6 lh-1 text-purple mb-0"><i class="fas fa-user-graduate"></i></span>
					<div class="ms-4 h6 fw-normal">
						<div class="d-flex">
							<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="60" data-purecounter-delay="200" data-purecounter-duration="0">60</h5>
							<span class="mb-0 h5">K+</span>
						</div>
						<p class="mb-0 text-white">Online Students</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>






<div class="content shadow my-5">
  <div class="w-50 text-center mx-auto my-2 text-white">  
      <h2 class = "h2-heading">Online service features</h2>
      <p class = "p-heading text-white">Suspendisse vitae enim arcu. Aliquam convallis risus a felis blandit, at mollis nisi bibendum. Aliquam nec purus at ex blandit posuere nec a odio. Proin lacinia dolor justo</p>
  </div>
  <div class="container form-cont text-left" id="self">
    <div class="row justify-content-center" id="selfchild">
      <div class="col-md-5">
        <form class="d-flex flex-column" id="search-form" >
          <div class="d-flex flex-row" style='gap:1rem;'>
      
            <select id='gate' class="selectpicker form-control shadow my-auto" multiple data-max-options="4" required name='ville[]' >
            
            </select>
        
            <button  type="button" class="box" id="search-speech" disabled>
              <i class="fas fa-microphone-alt text-secondary" id='spchicon'></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container my-4" style='border-radius: 10px;background:trapsarent'>
    <div class="d-flex flex-row flex-wrap res" style="gap:2%;">
    </div>
  </div>
</div>





<div id='err' class="alert alert-light fixed-bottom d-flex mx-auto align-items-center justify-content-between" role="alert">
  <div class="d-flex align-items-center">
    <i class="fas fa-exclamation-triangle text-danger display-8 pr-3"></i>
    <div class="cont"></div>
  </div>
  <span class="fas fa-times"></span>
</div>


<div id='sec' class="alert alert-light fixed-bottom d-flex mx-auto align-items-center justify-content-between" role="alert">
  

  <div class="d-flex align-items-center">
    <i class="fas fa-thumbs-up text-danger display-8 pr-3"></i>
    <div class="cont"></div>
  </div>
  <span class="fas fa-times"></span>
</div>
<?php
    include_once "fotter.html";
?>
<!-- <link rel="stylesheet" href="fonts/icomoon/style.css"> -->

<link rel="stylesheet" href="css/bootstrap-select.min.css">

<!-- Bootstrap CSS -->
<link async rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <script>

    var voice = {
  // (A) INIT SPEECH RECOGNITION
  sform : null, // HTML SEARCH FORM
  sfield : null, // HTML SEARCH FIELD
  sbtn : document.getElementById("search-speech"), // HTML VOICE SEARCH BUTTON
  recog : null, // SPEECH RECOGNITION OBJECT
  sf:null,
  init : function () {
    // (A1) GET HTML ELEMENTS
    voice.sform = document.getElementById("search-form");
    // voice.sfield = document.getElementById("search-field");
    voice.sf = document.getElementById('gate');
    
    // (A2) GET MICROPHONE ACCESS
    navigator.mediaDevices.getUserMedia({ audio: true }).then((stream) => {
      // (A3) SPEECH RECOGNITION OBJECT + SETTINGS
      const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
      voice.recog = new SpeechRecognition();
      voice.recog.lang = "en-US";
      voice.recog.continuous = false;
      voice.recog.interimResults = false;
      voice.sbtn.onclick = function() {
        voice.start();
      }
      // (A4) POPUPLATE SEARCH FIELD ON SPEECH RECOGNITION
      voice.recog.onresult = (evt) => {
        let said = evt.results[0][0].transcript.toLowerCase();
        said = said.replace('.','');
        document.querySelector(".filter-option-inner-inner").textContent = said;
        // voice.sfield.value = said;
        // aria-expanded
        console.log(said);
        
        voice.sf.value = said;
        // voice.sform.submit();
        // OR RUN AN AJAX/FETCH SEARCH
        voice.stop();
        voice.sbtn.classList.remove('effectactive');


        var citys = $("#gate").val();
        $.post("affusers.php",{ville:citys},function(data){
          // console.log(data);
          $(".res").html(data);
        })




      };

      // (A5) ON SPEECH RECOGNITION ERROR
      voice.recog.onerror = (err) => { console.error(err.error);
      document.querySelector("#err div .cont").textContent = `ERROR:${err.error}.`;

        // document.getElementById("err").children[1].textContent = "Please enable access and attach microphone.";
        document.getElementById("err").classList.add("err");
        setTimeout(()=>{
          document.getElementById("err").classList.remove("err");
        },6000);
      };
 
      // (A6) READY!
      voice.sbtn.disabled = false;
      voice.stop();
    })
    .catch((err) => {
      document.querySelector("#err div .cont").textContent = "Please enable access and attach microphone.";
      document.getElementById("err").classList.add("err");
      setTimeout(()=>{
          document.getElementById("err").classList.remove("err");
        },6000);
      // console.error(err);
      // voice.sbtn.textContent = "Please enable access and attach microphone.";
    });
  },
 
  // (B) START SPEECH RECOGNITION
  start : () => {
    voice.recog.start();
    voice.sbtn.onclick = voice.stop;
    voice.sbtn.classList.add('effectactive');
    document.getElementById("spchicon").classList.remove("text-secondary");
    // voice.sbtn.textContent = "Speak Now Or Click Again To Cancel";
  },
 
  // (C) STOP/CANCEL SPEECH RECOGNITION
  stop : () => {
    voice.recog.stop();
    voice.sbtn.onclick = voice.start;
    voice.sbtn.classList.remove('effectactive');
    document.getElementById("spchicon").classList.add("text-secondary");
    // voice.sbtn.textContent = "Press To Speak";
  }
};
window.addEventListener('DOMContentLoaded', voice.init);








    let activeelm = document.querySelector('[href="search.php"]');
    let allelm = document.querySelectorAll('.a');
    allelm.forEach(element => {
      element.classList.remove('activeli');
    });
    activeelm.classList.add('activeli');









  $(document).ready(function(){

    var json_info;
    $.when(get_json({getcity : "not empty"}),get_json({api : "not"}))
        .done(function(dt1,dt2)
        {
          var citys = JSON.parse(dt1[0]);
          json_info = JSON.parse(dt2[0]);
          $("#gate").append(`<option value="all">All</option>`);
          for (let item of citys)
          {
            $("#gate").append(`<option value="${item}">${item}</option>`);
          }
        });

    $("#err span").click(function(){
      $(this).parent().removeClass("err");
    });
  
      
      $("#save").click(function(){
        var form_data = new FormData();
        let imgdata = document.getElementById('img').files[0];
        form_data.append("submod", "not empty");
        form_data.append("usrmod", $("#user").val());
        form_data.append("passmod", $("#pass").val());
        form_data.append("emailmod", $("#email").val());
        form_data.append("villemod", $("#ville").val());
        form_data.append("agemod", $("#age").val());
        form_data.append("img", imgdata);

        $.ajax({
          type: "POST",
          url: "search.php",
          contentType:false,
          cache:false,
          processData:false,
          data:form_data,          
          success:function(data,statu,xhr)
          {
            // $("#sec").find(".cont").html("seccucfuly change");
            // $("#sec").addClass("sec");
            // setTimeout(()=>{
            // $("#sec").removeClass("sec");
            // },6000);

            $.when(get_json({api : "not"}))
            .done(function(dt)
            {
              json_info = JSON.parse(dt);
              $(".img-edit img").prop("src",`img/users/${json_info[4]}`);
              
              $("#user").val(json_info[1]);
              $(".pass1").val(json_info[3]);
              $(".pass2").val(json_info[3]);
              $("#email").val(json_info[2]);
              $("#ville").val(json_info[5]);
              $("#age").val(json_info[7]);

               //nav
              $("#nav-img img").prop("src",`img/users/${json_info[4]}`);
              $(".avatar-img").prop("src",`img/users/${json_info[4]}`);
              $(".avatar").next().find('a').html(json_info[1]);
              $(".avatar").next().find('p').html(json_info[2]);
              //nav

              $(".bad").find("small").html("");
              $(".good").find("small").html("");
              $(".bad").removeClass("bad");
              $(".good").removeClass("good");

              // $.when(get_json({getcity : "not empty"}))
              // .done(function(dt)
              // {
              //   let citys = JSON.parse(dt);
        
              //   // let texthtml = `<option value="all">All</option>`;
              //   // let innertext = `<li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">All</span></a></li>`;


              //   // for (let item of citys)
              //   // {
              //   //   console.log(item);
              //   //   texthtml += `<option value="${item}">${item}</option>`;
              //   //   // innertext +=`<li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">${item}</span></a></li>`

              //   // }

              //   // $("#gate").html(texthtml);
              //   // // $("ul.inner").html(innertext);
              //   // // var resource = document.createElement('link'); 
              //   // //   resource.setAttribute("rel", "stylesheet");
              //   // //   resource.setAttribute("href","css/bootstrap.min.css");
                
              // });


            });
          },          
          error:function(xhr,statu,err)
          {
            console.log(err);
          }

        });
      })













      var emailreg =  /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
      var email = $('#email').val();

      var usershand = <?php echo json_encode(Manager::get_all_h())?>;
      var userspass = <?php echo json_encode(Manager::get_all_p())?>;


      //test email validation
      $('#email').on('input',(function(){
        email = $('#email').val();
        if(email.match(emailreg) ){
         console.log('Enter valid email');
          $(this).parent().removeClass('bad');
          $(this).parent().addClass('good'); 
          $(this).next().html('Good');
          $("#save").attr("disabled", false);   
        }
        else{
          console.log('not good');
          $(this).parent().removeClass('good');
          $(this).parent().addClass('bad'); 
          $(this).next().html('example@example.com/net/org/co/...');
          $("#save").attr("disabled", true);
        }
      }))
      //test pass recop..
      $(".pass2").on('input',(function(){
        if($(".pass1").val() == $(".pass2").val())
        {
          $(this).parent().removeClass('bad');
          $(this).parent().addClass('good'); 
          $(this).next().html('');
          $("#save").attr("disabled", false);
        }
        else{
          $(this).parent().removeClass('good');
          $(this).parent().addClass('bad'); 
          $(this).next().html('It\'s not the same');
          $("#save").attr("disabled", true);
        }
      }))

      //rest data
      $("#rest1").click(function(){
          $("#user").val(json_info[1]);
          $(".pass1").val(json_info[3]);
          $(".pass2").val(json_info[3]);
        
        
        $(".testhand").removeClass("good");
        $(".testhand").removeClass("bad");
        $(".testhand").find("small").html("");

        $(".testpass").removeClass("good");
        $(".testpass").removeClass("bad");
        $(".testpass").find("small").html("");


        $(".pass2").parent().removeClass("good");
        $(".pass2").parent().removeClass("bad");
        $(".pass2").next().html("");

        $("#save").attr("disabled", false);


      })

      $("#rest2").click(function(){
          $("#email").val(json_info[2]);
          $("#ville").val(json_info[5]);
          $("#age").val(json_info[7]);

    
        $("#email").parent().removeClass("good");
        $("#email").parent().removeClass("bad");
        $("#email").next().html("");
        $("#save").attr("disabled", false);

      })
      

      //test handler and pass

      $(".more").click(function(){
        $(".more").removeClass("act");
        $(this).addClass("act");
        $(".more:not(.act)").parent("div").next().slideUp(1000);
        $(this).parent("div").next().slideToggle(1000);
      })
      $('.testhand input').on('input',(function()
      {
        if($(this).val() != "<?=$user?>" )
        {
          if(usershand.includes($(this).val()))
          {
            $(this).parent().removeClass('good');
            $(this).parent().addClass('bad'); 
            $(this).next().html('Already exists');
            $("#save").attr("disabled", true); 
            $("#pass").attr("disabled", true);   
            $(".testpass input").next().html('');      
          }
          else{
            $(this).parent().removeClass('bad');
            $(this).parent().addClass('good');
            $(this).next().html('Good');
            $("#save").attr("disabled", false);
            $("#pass").attr("disabled", false);
          }
        }
        else
        {
          $(this).parent().removeClass('good');
          $(this).parent().removeClass('bad');
          $(this).next().html('');
        }

      }))


      $('.testpass input').on('input',(function(){
        if($(this).val() != "" && $(this).val() != "<?=$pass?>")
        {
              $(this).parent().removeClass('bad');
              $(this).parent().addClass('good');
              $(this).next().html('Good');

              $(".pass2").parent().removeClass('good');
              $(".pass2").parent().addClass('bad'); 
              $(".pass2").next().html('It\'s not the same');
              $("#save").attr("disabled", true);


            if($(".pass1").val() == $(".pass2").val())
            {
              $(".pass2").parent().removeClass('good');
              $(".pass2").parent().removeClass('bad');
              $(".pass2").next().html('');
              $("#save").attr("disabled", false);
            }
            else{
              $(".pass2").parent().removeClass('good');
              $(".pass2").parent().addClass('bad'); 
              $(".pass2").next().html('It\'s not the same');
              $("#save").attr("disabled", true);
            }
        }
        else{
          $(this).parent().removeClass('good');
          $(this).parent().removeClass('bad');
          $(this).next().html('');


          // $("#save").attr("disabled", true);
          if($(".pass1").val() == $(".pass2").val())
          {
            $(".pass2").parent().removeClass('good');
            $(".pass2").parent().removeClass('bad');
            $(".pass2").next().html('');
            $("#save").attr("disabled", false);
          }
          else{
            $(".pass2").parent().removeClass('good');
            $(".pass2").parent().addClass('bad'); 
            $(".pass2").next().html('It\'s not the same');
            $("#save").attr("disabled", true);
          }
        }
      }))


            //fix option select
      $("#gate").change(function(){
        if($("#gate").val() != "")
        {
          // console.log("is not empty");
          if($('#gate').val() == "all"){
            $("ul.inner li").each(function(indx){
              if(indx != 0)
              {
                $(this).addClass("disabled");
              }
            })
            $('#gate option').each(function() {
              if($(this).val() != "all")
              {
                $(this).prop( "disabled", true );
              }
            })
          }
          else
          {
            $("option[value='all']").prop( "disabled", true);
            $("ul.inner li").each(function(indx){
            if(indx != 0) $(this).removeClass("disabled");
            else $(this).addClass("disabled");
            })
              $('#gate option').each(function() {
             if($(this).val() != "all") $(this).prop( "disabled", false );
            })
          }
          var citys = $("#gate").val();
          $.post("affusers.php",{ville:citys},function(data){
            $(".res").html(data);
          })
        }
        else
        {
          $('#gate option').each(function() 
          {
            $(this).prop( "disabled", false );
          })
          $("ul.inner li").each(function(indx)
          {
            $(this).removeClass("disabled");
          })
          $(".res").html("");
        }
      })
      //fix option select
  })
  function get_json(datachange)
  {
    return $.ajax({
          type: "POST",
          url: "API.php",
          // contentType:false,
          cache:false,
          // processData:false,
          data: datachange
          
          // success:function(data,statu,xhr)
          // {
          //   console.log("first"+data);
            
          // },          
          // error:function(xhr,statu,err)
          // {
            
          //   console.log(err);
          // }

    });
  }





  // function get_city()
  // {
  //   $.when(get_json({getcity : "not empty"}))
  //   .done(function(dt)
  //   {
  //       let citys = JSON.parse(dt);
        
  //       var texthtml = `<option value="all">All</option>`;

  //       for (let item of citys)
  //       {
  //         console.log(item);
  //         texthtml += `<option value="${item}">${item}</option>`;
  //       }
  //       $("#gate").html(texthtml);
  //   });
   
  // }









  </script>
</body>
</html>
