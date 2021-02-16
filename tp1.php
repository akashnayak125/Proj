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


<div class="container">
  <center><h2>Form Grid</h2></center>
  <form action="#" method="get">
    <div class="row">
      <div class="col">
      <lebel for="typ"><b>Choose Search Option</b></lebel>
          <select id="typ" name="typ" class="form-control typ">
    <option value="Student Name">By Name</option>
    <option value="Phone Number">By Phone Number</option>
    <option value="Total Marks">Mark Greater Than</option>
  </select>
      </div>
      <div class="col">
      <lebel for="ipt"><b>Enter Search Data</b></lebel>
        <input type="text" class="form-control ipt" placeholder="Enter Your Input" name="ipt" id="ipt">
      </div>
    </div>
   <center> <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-search"></i>Search</button></center>
  </form>
</div>

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$db="wordpress";
    $var=$_GET['ipt'];
    $typ=$_GET['typ'];

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$q="select * from user";
$r=mysqli_query($conn,$q);
while($a=mysqli_fetch_array($r))
{
    if($typ=='Total Marks'){
        settype($var, "integer");
    if($a[$typ]>=$var){
        
    ?>
            <div class="card d-inline-block" style="width: 18rem;">
  <div class="card-body">
      <h4 class="card-title"><b><?php echo($a['Student Name']); ?></b></h4>
      <h5><?php echo($a['Phone Number']); ?></h5>
    <p class="card-text"><?php echo("Subject1: ".$a['Marks_Subject1'].", Subject1: ".$a['Marks_Subject2'].", Subject1: ".$a['Marks_Subject3'].", Subject1: ".$a['Marks_Subject4'].", Subject1: ".$a['Marks_Subject5']); ?>, <br>
    <b>Total:<?php echo($a['Total Marks']); ?>.</b></p>
    <a href="../download?id=<?php echo($a['id']); ?>" class="btn btn-primary">Download</a>
  </div>
</div>
      <?php
    }
    }
    else{
    if($a[$typ]==$var){
        ?>
    <div class="card d-inline-block" style="width: 18rem;">
  <div class="card-body">
      <h4 class="card-title"><b><?php echo($a['Student Name']);; ?></b></h4>
      <h5><?php echo($a['Phone Number']) ?></h5>
    <p class="card-text"><?php echo("Subject1: ".$a['Marks_Subject1'].", Subject1: ".$a['Marks_Subject2'].", Subject1: ".$a['Marks_Subject3'].", Subject1: ".$a['Marks_Subject4'].", Subject1: ".$a['Marks_Subject5']); ?>, <br>
    <b>Total:<?php echo($a['Total Marks']); ?>.</b></p>
    <a href="../download?id=<?php echo($a['id']); ?>" class="btn btn-primary">download</a>
  </div>
</div>
      <?php
}}}
    ?>

    
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
