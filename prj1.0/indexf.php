<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action='index.php' method='post' style="width:35%;margin:200px auto;padding: 50px 0;background: #cacaca;border-radius:20px;display:flex;flex-direction: column;gap:1rem;border:3px solid #f0f0f0;">
      <div style="width:50%;margin:0 auto;">
        <label for="user">login :
        <input type="text" id='user' placeholder="username" value="" name="user">
        </label>
        <label for="pass">pass :
        <input type="password" id='pass' placeholder="password" value="" name="pass">
        </label>
        <input type="submit" value="login" name="sub">
        <input type="reset" value="canncel" name="rest">
      </div>

    </form>
    <?php
    include_once "classpanier.php";
      session_start();
      if(isset($_POST['sub']))
      {
        if(isset($_POST['user']) && isset($_POST['pass']))
        {
          $user = trim($_POST['user']);
          $pass = trim($_POST['pass']);

          $_SESSION["user"] = $user;
          $_SESSION["pass"] = $pass;
          $_SESSION["panier"] = new panier();
          header("location: panier.php");
        }
      }
    ?>
  </body>
</html>
