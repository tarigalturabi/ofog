<?php require_once("layout/header.php"); ?>
<?php require_once('includes/initilaize.php');?>
<?php
	/*if (logged_in()) {
		redirect_to("c_panel.html");
	}*/
    $msge="";
if (isset($_POST['submit1'])) {
      $u=$_POST['username'];
      $e=$_POST['email'];

      $user=new User();
      $log=$user->check_account($_POST['username'],$e);
		if (!$log ) {
			// Check database to see if username and the hashed password exist there.
            $msge= "خطــأ فــي إســم المستخــدم أو البريــد الالكتروني<br>";

            }else{
                //prepare email message
                //send password to user email
            /*$msge="<h1> ".$u."   ".$e."   </h1><br>";*/
                $encrypt = sha1(90*13+$log->id);
                $to=$e;
                $subject="Forget Password";
                $from = 'troog1993@hotmail.com';
                $body='Hi, <br/> <br/>Your Membership ID is '.$log->id.' <br><br>Click here to reset your password http://localhost:8080/online_result_grade_system/forget.php?encrypt='.$encrypt.'&action=reset <br/> <br/>--<br>Hatsumei tech<br>Solve your problems.';
                $headers = "From: " . strip_tags($from) . "\r\n";
                $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $msge = mail($to,$subject,$body,$headers)?"تم اسال رابط الإسترجاع الى بريدك الالكتروني":"الرجاء فحص مزود خدمة الانترنت لديك ";
            }
	}
?>
<html>
 <body>
	 <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<h1>إعــادة ضبط كلمة المرور</h1>
                            <h5><?php echo "<p>".action_message($msge,'notice')."</p>"; ?></h5>
						</div>
						<div class="signin">
							<form action="forget.php" method="post">
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" name="username" class="user" placeholder="ادخل اسم المستخدم"  required/>
								</div>
								<div class="clearfix"> </div>
							</div>
                            <div class="log-input">
								<div class="log-input-left">
								   <input type="email" name="email" class="" placeholder="ادخــل البريد الالكتروني"  required/>
								</div>
								<div class="clearfix"> </div>
							</div>

							<input type="submit" value="إسترجــاع" name="submit1">
						</form>
						</div>
					</div>
				</div>
			</div>
     </section>
		<!--footer section start-->

        <!--footer section end-->

</body>
</html>