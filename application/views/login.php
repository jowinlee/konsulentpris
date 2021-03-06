<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Konsulentpris</title>

  <!-- Favicons-->
  <link rel="icon" href="<?php echo $url ?>images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="<?php echo $url ?>images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="<?php echo $url ?>images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="<?php echo $url ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo $url ?>css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo $url ?>css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo $url ?>css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- <link href='<?php echo $url ?>css/bootstrap.css' rel='stylesheet' type='text/css'> 
  <script type='text/javascript' src="<?php echo $url ?>js/bootstrap.min.js"></script> -->
  <link href="<?php echo $url ?>js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" method="post" action="<?php echo $url ?>">
        <div class="row">
          <div class="input-field col s12 center">
            <div class="card-panel teal">
            <span class="white-text">Start Info</span>
            </div>
             <div class="card-content grey lighten-4">
              <p class="center login-form-text"><a href="<?php $url ?>about">More Info</a></p>
             </div>
            
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input type="email" required name="email" id="username" type="text" />
            <label for="username" class="center-align">Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="password" id="password" type="password" required/>
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light col s12">Login</button>
          </div>
        </div>
        <?php echo $message ?>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="<?php echo $url ?>register">Register Now!</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="">Lost password ?</a></p>
          </div>          
        </div>

      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="<?php echo $url ?>js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo $url ?>js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="<?php echo $url ?>js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="<?php echo $url ?>js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="<?php echo $url ?>js/plugins.js"></script>

</body>

</html>