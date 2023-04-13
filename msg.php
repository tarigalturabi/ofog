<?php

 $subject 	=$_POST['sub'];
$msg 	   	=$_POST['m'];
if(empty($subject) || empty($msg)) {
	echo "	<div class='form-group has-warning has-feedback'>
			<input type='email' class='form-control warrning' value='please fill All Fields' disabled>
			<span class='glyphicon glyphicon-warning-sign form-control-feedback' ></span>
			</div>";


        exit(1);
	}

?>