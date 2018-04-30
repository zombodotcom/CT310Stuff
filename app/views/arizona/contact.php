
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <meta name="description" content="Assignment 1">
  <meta name="author" content="Thomas Sciano Jon Hunt">
   <link rel="icon" href="http://webcom.colostate.edu/alumline/files/2014/02/rams-icon-dark.png">

  <title>Assignment 1 - Arizona - Contact</title>
</head>

<body id="page-top">



    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #CFB53B;" id="mainNav">
      <div class="container" >
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Arizona</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo Uri::create('arizona/a1'); ?>">Pima Air & Space Museum</a>
            </li>
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo Uri::create('arizona/a2'); ?>">Painted Desert</a>
            </li>
        <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo Uri::create('arizona/a3'); ?>">Grand Canyon</a>
            </li>
        <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo Uri::create('arizona/about'); ?>">About</a>
            </li>
        <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo Uri::create('arizona/contact'); ?>">Contact</a>
            </li>
          </ul>

        </div>
         <ul class="nav pull-right">
            <li class="dropdown" id="menuLogin">
              <a class="dropdown-toggle " href="#" data-toggle="dropdown" id="navLogin">Login</a>
              <div class="dropdown-menu" style="padding:17px;">
              <?php
  if (!(Session::get('username'))) {?>
   <form action="check" method="POST">
     <input type="text" name="username" placeholder="Please enter username"/>
     <input type="password" name="password" placeholder="Please enter password"/>
     <input type="submit" value="submit">
   </form>

  <?php
  }?>
  <?php
  if ((Session::get('username'))) {?>
    <a href="logout">logout</a>
   <?php
   }?>


              </div>
            </li>
          </ul>
      </div>

    </nav>



  <section id="contact">
  <div class="container">
  <h1>Contact Us!</h1>
  <p> If you want to contact us:
  Sciano, Tom
  Hunt, Jon </p>
    </section>

  </body>

  </html>
