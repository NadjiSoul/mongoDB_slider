<?php
$manager = new MongoDB\Driver\Manager();

$filter = [];

$query = new MongoDB\Driver\Query($filter);

$cursor = $manager->executeQuery('site.site', $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Site Slider</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<section>
	<nav>
		<div>
			<img class="logo_a" src="Ellipse 1.png">
			<img class="logo_b" src="Ellipse 2.png">
		</div>
		<ul>
			<a href="" class="li_a"><li>Acceuil</li></a>
			<a href="" class="li_b"><li>Revue</li></a>
			<a href="" class="li_c"><li>Blog</li></a>
			<a href="" class="li_d"><li>Contact</li></a>
		</ul>
	</nav>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
<?php
 $counter = 1;
  foreach ($cursor as $table_site) {  
?>

      <div class="item<?php if($counter <= 1){echo " active"; } ?> ">
        <img style="width: 100%; height: 100vh;" src="<?php echo $table_site->image;?>" style="width:100%;">
        <div class="carousel-caption">
          <h2><?php echo $table_site->title;?></h2>
        </div>
      </div>
<?php
$counter++;
}
?>   
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
  <button>Découvrir</button>
</section>
</body>
</html>
