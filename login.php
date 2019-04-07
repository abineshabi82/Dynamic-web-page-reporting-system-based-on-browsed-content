<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles2.css">
  <style>
  .well{
background-color: ;
}
nav.navbar.navbar-inverse {
    margin-bottom: 0px;
}
  </style>
</head>
<body style="background-color:#eef9c5;">
<?php                             
include("class/configs.php");
extract($_REQUEST);


if(isset($submit))												//for pasted content
{	
$sql1="SELECT l_password FROM logindetails WHERE l_email=?";				//for pasted content
$statement1=$mysqli->prepare($sql1);
$statement1->bind_param('s', $email);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($password);
$statement1->fetch();
if($password==$pwd)
{
	header("Location:readmode.php?email=$email");
}
}
?>
<img src="header.png" class="form-control" border="" style="width:100%; height:125px" ></img>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">Alpha</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="">Home</a></li>
      <li><a href="">Reference</a></li>
	  <li><a href="">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
      <li><a href="createacc.php"><span class="glyphicon glyphicon-log-in"></span> Sign Up </a></li>
    </ul>
  </div>
</nav>

<div class="container-fluid well">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="slide1.png" alt="New way" style="width:100%;">
        <div class="carousel-caption">
          <h3> </h3>
          <h2><p style="color:#ff9933;"></p></h2>
        </div>
      </div>

      <div class="item">
        <img src="slide2.png" alt="What's new?" style="width:100%;">
        <div class="carousel-caption">
          <h3> </h3>
          <h2><p style="color:#ff9933;"></p></h2>
        </div>
      </div>
    
      <div class="item">
        <img src="slide3.png" alt="Features" style="width:100%;">
        <div class="carousel-caption">
          <h3> </h3>
          <h2><p style="color:#ff9933;"></p></h2>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<script src="scripts.js"></script>
<script src="https://code.responsivevoice.org/responsivevoice.js"></script>


<div class="container">

  <div align="center" class="row">
	
	<div class="form-group col-sm-12 well">
	<h2 align="center">Log in</h2><br>
	<form action="">
	<div class="form-group">
	<label for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
	</div>
	<div class="form-group">
	<label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
	</div>
	<button type="submit" name="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
  </div>
</div>

</body>
</html>
