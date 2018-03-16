<!DOCTYPE html>
<html>
<head>
	<title> Blood donation website </title>
	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="jquery-3.1.1.min/jquery-3.1.1.min"></script>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css"/>
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min"/>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/full-slider.css" rel="stylesheet">
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min"></script>
<style>

.carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
    height: 100%;
      width: 100%;
      margin: auto;
  }
  body{
    margin-right:5%;
      margin-left: 5%;
  }
  #myCarousel{
    height:350px;
  }
  </style>
</head>
<body>

<?php
 include 'nav.php';
?>
 

<div id="myCarousel" class="carousel slide" data-ride="carousel" w>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" >
    <div class="item active" >
      <img src="images/benefits-of-blood-donation.jpg " alt="Chania">
    </div>

    <div class="item">
      <img src="images/maxresdefault.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="images/slide-4.jpg" alt="Flower">
    </div>

    <div class="item">
      <img src="images/blood-donation1.jpg" alt="Flower">
      
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<br><br>
 <div class="ro">
  <div class="col-sm-3"  style="outline:1px solid black" > <h2>Who can give blood? </h2> <h4> <a href="whocangiveblood.php"> Check you can </a></h4> </div>
  <div class="col-sm-3" style="outline:1px solid black" style="margin-left:30px"> <h2> Become a blood doner  </h2> <h4> <a href="Signup.php">Register now </a></h4>  </div>
  <div class="col-sm-3" style="outline:1px solid black" style="margin-left:30px"> <h2>  Already a donner then  </h2> <h4> <a href="Signup.php">Create a account </a></h4> </div>
  <div class="col-sm-3" style="outline:1px solid black" style="margin-left:30px"> <h2> The donation process  </h2>  <h4> <a href="thedonatingprocess.php"> What to except </a></h4>  </div>
</div>

<br>
<div class="main">
  <div class="content">
<h3>Blood</h3>
   <p><h4>Blood is universally recognized as the most precious element that sustains life. It saves innumerable lives across the world in a variety of conditions. The need for blood is great - on any given day, approximately 39,000 units of Red Blood Cells are needed. More than 29 million units of blood components are transfused every year.
Donate Blood  
Despite the increase in the number of donors, blood remains in short supply during emergencies, mainly attributed to the lack of information and accessibility.

We positively believe this tool can overcome most of these challenges by effectively connecting the blood donors with the blood recipients.</h4></p>
</div> 
</div>


<div class="main">
  <div class="content">   
      <h3>Blood bank:</h5>
      <p><h4>We welcome you to in our WebSite. If you are a donor , We appreciate you signing up online as a Donor. If you need blood we are happy to serve you. This blood donor list is hosted by <a href="#">www.Meroblood.com</a> on behalf of " Saver Blood Bank"
as a public service without any profit motive.This is a free service. While the Organisers have taken all steps to obtain accurate and up-to-date information of potential blood donors, 
the Organisers and ICM Computers do not guarantee accuracy of the information contained herein or the suitability of the persons listed as any liability for direct or consequential damage to any person using this blood donor list including 
loss of life or damage due to infection of any nature arising out of blood transfusion from persons whose names have been listed in this website.
We request donors to update contact details regularly.</h4></p>
</div>
  </div>

  <Br>

   <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>

    
  
 <div class="col-sm-12"> 
<?php
include 'footer.php'; 
?>
</div>
</body>

</html>