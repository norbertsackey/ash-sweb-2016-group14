<?php
   /**
   * @author Benedicta Amo Bempah
   * @copyright 2016
   */

   include('Login.php'); // Login Page is merged or included

   if(isset($SESSION['login_user'])){
   	header("location:../index.php");
   }
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">

	 <title> Welcome to WebTech Engineering Lab Inventory Project</title>
    <meta name="viewport" content="width=device-width", initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
      .carousel-inner > .item > img,
      .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
      }
    </style>
  </head>

  <body>

    <div class="container">
      <br>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
          </ol>

            <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active"> 
                  <img src="http://thiemt.com/user_static/images/content/labor-grundausstattung-672.jpg" alt="Lab" width="660" height="445">
              </div>

              <div class="item"> 
                <img src="http://www.xsolve.pl/blog/wp-content/uploads/2015/02/laboratory-equipment.png" alt="Tools" width="460" height="345">
              </div>

              <div class="container" id="main">
                <div class="row" id="Login">
                  <h1 class =text-center>Login to Ashesi Engineering Lab</h1>
              <div style="width: 200px; margin: 30px auto 0 auto;"> 
                <form method="post" action="index.php">
                  <p><input type="integer" name="login" value="" placeholder="UserID"></p>
                    <p><input type="password" name="password" value="" placeholder="Password"></p>
                      <p class="Remember_Me">
                        <label>
                          <input type="checkbox" name="remember_me" id="remember_me"> Remember me on this computer
                        </label>
                    </p>
                      <p class="submit"><input type="submit" name="commit" value="Login"></p>
                        </form>
                    </div>
                      <div style="width: 200px; margin: 50px auto 0 auto;">
                        <div class="login-help">
                          <p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
                </div>
              </div>
          </body>
    </html>