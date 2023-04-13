<!--
Author: Hatsumei Tech
Author URL: http://HatsumeiTech.com
License: Online AAU Grade System
License URL: http://Hatsumei.com/webapp/orgs.php
-->
 <?php include("includes/initilaize.php") ;?>
<?php $all_notes=Notification::find_all();?>
<?php require_once(SITE_ROOT.DS."layout".DS."req_lib.php"); ?>

<!DOCTYPE html>
<html >
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-select.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
var elem=$('#container ul');
	$('#viewcontrols a').on('click',function(e) {
		if ($(this).hasClass('gridview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('list').addClass('grid');
				$('#viewcontrols').removeClass('view-controls-list').addClass('view-controls-grid');
				$('#viewcontrols .gridview').addClass('active');
				$('#viewcontrols .listview').removeClass('active');
				elem.fadeIn(1000);
			});
		}
		else if($(this).hasClass('listview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('grid').addClass('list');
				$('#viewcontrols').removeClass('view-controls-grid').addClass('view-controls-list');
				$('#viewcontrols .gridview').removeClass('active');
				$('#viewcontrols .listview').addClass('active');
				elem.fadeIn(1000);
			});
		}
	});
});
</script>
<!-- Source -->



</head>
<body>

	<!-- Products -->
	<div class="total-ads main-grid-border">
			<!--<ol class="breadcrumb" style="margin-bottom: 5px;">
			  <li><a href="index.html">Home</a></li>
			  <li class="active">Notification</li>
			</ol>-->

							<script type="text/javascript" src="js/jquery-ui.js"></script>
							<script type='text/javascript'>//<![CDATA[
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 9000,
										values: [ 50, 6000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>

							</script>
				<div class="ads-display col-md-11 col-md-offset-1">
					<div class="wrapper">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					  <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
						<li role="presentation" class="active" style="float: right">
						  <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
							<span class="text">كــل الإشعارات</span>
						  </a>
						</li>

					  </ul>
					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						   <div id="container">
    								<div class="view-controls-list" id="viewcontrols" style="float: right">
    									<label>عرض :</label>
    									<a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
                                        <a class="gridview "><i class="glyphicon glyphicon-th"></i></a>
    								</div>
    								<!--<div class="sort">
    								    <div class="sort-by">
    										<label>Sort By : </label>
    										<select>
    										    <option value="0">Most recent</option>
    											<option value="1">This Week</option>
    											<option value="2">This Month</option>
    										</select>
									    </div>
									</div>-->
							    	<div class="clearfix"></div>
						    	<ul class="list" >
                                <?php foreach($all_notes as $note){?>
								<a href="post.php?id=<?php echo $note->id; ?>">
									<li>
									<img src="uploads/<?php echo $note->image_path(); ?>" width="50px" height="150px" alt=""  style="float: right"/>
									<section class="list-right" >
									<h5 class="title"><?php echo $note->ar_title; ?></h5>
									<span class="adprice"><?php echo $note->ar_content; ?></span>
									<p class="catpath"></p>
									</section>
									<section class="list-left" >
									<span class="date"><?php echo $note->date; ?></span>
									<span class="cityname"></span>
									</section>
									<div class="clearfix"></div>
									</li>
								</a>
                                <?php }?>

							</ul>
						</div>
					</div>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	</div>
	<!-- // Products -->
	<!--footer section start-->

        <!--footer section end-->
</body>
</html>