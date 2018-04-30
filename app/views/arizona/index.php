
<!DOCTYPE html>
<html lang="en">

<head>


  <title>Project 2 - Arizona</title>

  <!-- Bootstrap core CSS -->

  <!-- Custom styles for this template -->


</head>

<body>



    <div class="container">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>



  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
    <?php echo Asset::img('Pima.jpg');?>
<!--       <img class="d-block img-fluid" src="Pima.jpg" alt="Pima Air & Space Museum"> -->
      <div class="carousel-caption">
        <h1>Pima Air & Space Museum!</h3>
        <p>Wow Planes! Very Space!</p>
      </div>
    </div>
    <div class="carousel-item">
    <?php echo Asset::img('Painted.jpg');?>
<!--       <img class="d-block img-fluid" src="Painted.jpg" alt="Painted Desert" > -->

       <div class="carousel-caption" style="text-color:black" >
        <h1>Painted Desert!</h3>
        <p>Wow Pretty Rocks! Much Nature!</p>
        <p> Source : http://www.douglasdolde.com</p>
      </div>
    </div>
    <div class="carousel-item">
    <?php echo Asset::img('Canyon.jpg');?>
<!--       <img class="d-block img-fluid" src="Canyon.jpg" alt="Third slide"> -->
	   <div class="carousel-caption" style="text-color:black" >
        <h1>Grand Canyon!</h3>
        <p>Wow Very Large! Much Canyon!</p>
      </div>
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

     <div class="container text-center">
<center><h3> Welcome to the Arizona Assignment Webpage!<h3></center>
    </div>

<section id="Welcome">
  <!-- <div class="container"> -->
  <div class="container">
    <p> Welcome to the Arizona Assignment Web Page for CT310! We will be showing you Three Wonderful Attractions in Arizona!</p>
  </div>

</section>


  </body>

  </html>
