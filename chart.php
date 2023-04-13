
<?php include("includes/initilaize.php"); ?>
<?php include(LIB_PATH.DS."FusionCharts.php"); ?>
<HTML>
<HEAD>
	<?php
	//You need to include the following JS file, if you intend to embed the chart using JavaScript.
	//Embedding using JavaScripts avoids the "Click to Activate..." issue in Internet Explorer
	//When you make your own charts, make sure that the path to this JS file is correct. Else, you would get JavaScript errors.
	?>	
	<SCRIPT LANGUAGE="Javascript" SRC="FusionCharts/FusionCharts.js"></SCRIPT>
	<style type="text/css">
	<!--
	body {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
	}
	.text{
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
	}
	-->
	</style>
</HEAD>
<BODY>
<div class="container-fluid">
<?php
   /* $class = empty($_POST['class'])?$_POST['class']:"";
   	if (empty($class)) { //header("location:index.html");
		echo "empty class number";
        exit(0);
		}*/
        $num = $session->user_assoc;
	//$strXML will be used to store the entire XML document generated
	//Generate the graph element
	$strXML = "<graph caption='تقرير آداء الطــالب'xAxisName='الفصــل الدراسي'     yAxisName='GPA'      subCaption='بالتقدير'  pieSliceDepth='10' showBorder='1' showNames='1' formatNumberScale='0'  decimalPrecision='0'  >";
	// Fetch all Student records
	$strQuery = "SELECT DISTINCT (`semester`) FROM  `details` WHERE  `std_number` =  '{$num}' ORDER BY  `semester`   ";
    $res = $database->query($strQuery) ;

	//Iterate through each Student
	if ($res) {
		while($ors = $database->fetch_array($res)) {
			$strXML .= "<set name='" . $ors['semester'] . "' value='" .GPA( $num,$ors['semester']) . "' color='#009933' />";
		}
	}


	//Finally, close <graph> element
	$strXML .= "</graph>";

	//Create the chart - Pie 3D Chart with data from $strXML
	echo renderChart("FusionCharts/FCF_Area2D.swf", "", $strXML, "FactorySum", 650, 450);
?>
<BR><BR>
<!--<H5 ><a href='#'>&laquo; <?php echo "Result Chart OF ".$session->user_id; ?> &rarr;</a></h5>
--></div>
</BODY>
</HTML>