
<!DOCTYPE html>
<html>
<head>
<?php include("includes/initilaize.php") ?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-select.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<!--single-page-->
<?php
    if(isset($_GET['id'])!="") $id=$_GET['id']; else {echo "no details here "; exit(0);}
    $note=Notification::find_by_id($id);
 ?>
	<div class="single-page main-grid-border">
		<div class="container">
			<ol class="breadcrumb" style="margin-bottom: 5px;">
				<li><a href="index.html">Home</a></li>
				<li><a href="show_notes.php">Notifications</a></li>
				<li class="active">Posts</li>
			</ol>
			<div class="product-desc">
				<div class="col-md-10 col-md-offset-1 product-view">
					<h2><?php echo $note->en_title; ?></h2>
					<p> <i class="glyphicon glyphicon-date"></i>| Added at <?php echo $note->date; ?></p>
					<div class="product-details">
						<p><strong>post details</strong> : <?php echo $note->en_content; ?>.</p>
					</div>
				</div>

			<div class="clearfix"></div>
			</div>
            <a href="show_notes.php">back</a>
		</div>
	</div>
	<!--//single-page-->
	<!--footer section start-->		

        <!--footer section end-->
</body>
</html>