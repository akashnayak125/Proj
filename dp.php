<?php /* Template Name: PageWithoutSidebar */ 
/**
 * The template for displaying all pages
 *
 * @package Exoplanet
 */

get_header();
$page_header_position = get_theme_mod('page_header_position','header');
if ($page_header_position == "content") {
?>
<header class="main-header">
</header>
<div class="container">
	<div class="title-header">
		<?php 
		the_title('<h1 class="main-title">', '</h1>'); 
		$enable_bread = get_theme_mod('enable_bread', true);
		if ($enable_bread) {
			exoplanet_breadcrumb_trail();
		}
		?>
	</div>
<?php
} else {
?>
<header class="main-header">
	<div class="container">
		<div class="header-title">
			<?php 
			the_title('<h1 class="main-title">', '</h1>'); 
			$enable_bread = get_theme_mod('enable_bread', true);
			if ($enable_bread) {
				exoplanet_breadcrumb_trail();
			}
			?>
		</div>
	</div>
</header><!-- .entry-header -->
<div class="container">

    <?php } ?>
    <head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>


    <?php
$servername = "localhost";
$username = "root";
$password = "";
$db="wordpress";
    $id=$_GET['id'];
    

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$q="select * from user WHERE id = $id";
$r=mysqli_query($conn,$q);
$a=mysqli_fetch_array($r);
    $name=$a['Student Name'];
$myfile = fopen("./../".$name.".txt", "w");
$mytxt = "Name: ".$a['Student Name']." \n Phone Number : ".$a['Phone Number']."\n Email Id : ".$a['Email Id']."\n   Subject 1: ".$a['Marks_Subject1']."\n Subject 2: ".$a['Marks_Subject2']."\n Subject 3: ".$a['Marks_Subject3']."\n Subject 4: ".$a['Marks_Subject4']."\n Subject 5: ".$a['Marks_Subject5']."\n Total: ".$a['Total Marks']."\n ";
fwrite($myfile, $mytxt);
    
echo(' <center><a href="./../../../../../myallproj/p1/'.$name.'.txt" class="btn btn-primary" download>download</a></center>');
    ?>

    
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
