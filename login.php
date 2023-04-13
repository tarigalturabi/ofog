<?php require_once("layout/header.php"); ?>
<?php require_once('includes/initilaize.php');?>
<?php
    if($session->is_logged_in()){
        switch($session->user_auth){
          // redirect_to("admin.php");
           redirect_to("admin.html");
        }
    }

        $msg="";
if (isset($_POST['submit1'])) {

		$username = trim($_POST['username']);
		$password = trim($_POST['pass']);		
       // echo $hashed_password."<br>";

        $u=new User();
		if (!$u->authenticate($username,$password) ) {
			// Check database to see if username and the hashed password exist there.
            $msg= "Error Username OR Password  <br> Try Again <br>";

            }
            $user=$u->authenticate($username,$password);
              redirect_to("admin.html");
            }

	}
?>

	 <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<h1>تسجيــل الدخــــول</h1>
                            <h2><?php echo("<p>".$message."</p>"); ?></h2>
                            <h2><?php echo "<p>".$msg."</p>"; ?></h2>
						</div>
						<div class="signin">
                            <div class="signin-rit">
							    <b><a href="forget.php">هــل نسيــت كلمـــة المــرور؟</a></b>
							</div>
							<form action="login.php" method="post">
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" name="username"  placeholder="إسم المستـخـــدم" class="user" required/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" name="pass"  placeholder="كلمـــة المـــــرور"  class="lock" required/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<input type="submit"  value="دخــــول" name="submit1">
						</form>
						</div>
						<!--<div class="new_people">
							<h2>For New People</h2>
							<p>you can enter your account now to engoy with OFOG services.</p>
							<a href="register.html">Register Now!</a>
						</div>-->
					</div>
				</div>
			</div>
     </section>
		<!--footer section start-->

        <!--footer section end-->

</body>
</html>