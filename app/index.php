<!-- //http://alistapart.com/article/phpcms -->
<!-- http://rudiv.se/development/Resource/creating-simple-dynamic-website-and-more-with-php -->
<!DOCTYPE html>
<html>
<head>
<base href="http://localhost:81/tb-php/app/">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Trevyr Barn, a luxury holiday cottage in South Wales." />
<meta name="keywords" content="Holiday cottage, holiday accommodation, holiday, vacation, Wales, South Wales, Welsh mountains, Monmouthshire, Monmouth, Grosmont, Abergavenny, Skenfrith, Three Castles Walk, Offa's Dyke Walk, Brecon Beacons, Black Mountains " />
<meta name="author" content="">
<title>Trevyr Barn: Holiday Cottage</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

 <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
  <!--build:js js/main.min.js -->
<script src="http://localhost:81/tb-php/app/js/jquery-1.12.1.min.js"></script>
<script src="http://localhost:81/tb-php/app/js/bootstrap.min.js"></script>
<script src="http://localhost:81/tb-php/app/js/app.js"></script>
<!-- endbuild -->
<!--build:css css/styles.min.css-->
<link rel="stylesheet" href="http://localhost:81/tb-php/app/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost:81/tb-php/app/css/styles.css">
<!--endbuild-->
<link rel="shortcut icon" href="http://www.trevyrbarn.co.uk/favicon.ico" type="image/x-icon">
<base href="http://localhost:81/tb-php/app/" target="_blank">
 </head>
<body>

<?php  
include 'includes/nav.php';
include("includes/header.php");   
// Set the default name 
$page = 'home'; 
// Specify some disallowed paths 
$disallowed_paths = array('header', 'footer'); 
if (!empty($_GET['page'])) { 
    $tmp_page = basename($_GET['page']); 
    // If it's not a disallowed path, and if the file exists, update $page 
    if (!in_array($tmp_page, $disallowed_paths) && file_exists("includes/{$tmp_page}.php")) 
        $page = $tmp_page; 
} 
// Include $page 
include("includes/$page.php"); 

include("includes/footer.php");
?>
</body>
</html>