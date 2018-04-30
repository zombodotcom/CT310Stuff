
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <meta name="description" content="Assignment 1">
  <meta name="author" content="Thomas Sciano Jon Hunt">
   <link rel="icon" href="http://webcom.colostate.edu/alumline/files/2014/02/rams-icon-dark.png">

  <title>Assignment 2 - Arizona - Grand Canyon!</title>


</head>

<body id="page-top" >

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
    <div class="container container-fluid">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
        <?php echo Asset::img('gc1.jpg');?>
<!--       <img class="d-block img-fluid" src="pima front.jpg" alt="Pima Air & Space Museum"> -->

    </div>
    <div class="carousel-item">
    <?php echo Asset::img('gc2.jpg');?>
<!--       <img class="d-block img-fluid" src="Bird.jpg" alt="Painted Desert" > -->
    </div>
    <div class="carousel-item">
    <?php echo Asset::img('gc3.jpg');?>
<!--      <img class="d-block img-fluid" src="Sent.jpg" alt="Third slide">-->
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
    </div>

    <div class="container container-fluid">
    <center><h1> Painted Desert!<h1></center>
    </div>
<!-- <header class="bg-primary text-white">
  <div class="container text-center">
  <h1>Welcome to Scrolling Nav</h1>
  <p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>
</div>
</header> -->


<section id="About Pima" class="bg-warning">
  <div class="container" >
    <h1> The Grand Canyon!</h1>
    <p>
      The Grand Canyon is a steep-sided canyon carved by the Colorado River in Arizona, United States. The Grand Canyon is 277 miles (446 km) long, up to 18 miles (29 km) wide and attains a depth of over a mile (6,093 feet or 1,857 meters).
      Nearly two billion years of Earth's geological history have been exposed as the Colorado River and its tributaries cut their channels through layer after layer of rock while the Colorado Plateau was uplifted.
      </p>
      <p> <a title="Grand Canyon Wikipedia " href="https://en.wikipedia.org/wiki/Grand_Canyon">Grand Canyon Wikipedia</a> </p>
      <p>All Images and descriptions Sourced from Wikipedia on this page, unless otherwise specified.</p>


  </div>
</section>
</section>
<section id="comment">

<?php echo $cvar; ?>
        <?php
if (Session::get('username')) {?>
<form action="<?php echo Uri::create('arizona/a3'); ?>" method="POST">
<div>
<textarea name="comments" id="comments" style="font-family:sans-serif;font-size:1.2em;">
Hey... say something!
</textarea>
</div>
<input type="submit" value="Submit">
</form>
<?php
}?>
</section>


  </body>

  </html>
