<?php require_once('includes/initilaize.php');?>

<script>
//Used jQuery to match re-entered password
function mypasswordmatch()
{
var pass1 = $("#password").val();
var pass2 = $("#password2").val();
if (pass1 != pass2)
{
alert("Passwords do not match");
return false;
}
else
{
$( "#reset" ).submit();
}
}
</script>
<?php
//echo .md5(90*13+56)."<br>";
//echo $_POST['uid'];
    if(isset($_POST['reset'])) {
        $encrypt = $database->escape_value($_POST['encrypt']);
        $password = $database->escape_value($_POST['password']);
        $password2 = $database->escape_value($_POST['password2']);
        if($password != $password2){echo "password is not match <br> "; exit(0);}
        $query = "SELECT id FROM users where sha1(90*13+id)='".$encrypt."'";
        $result =  $database->query($query);
        $Results = $database->fetch_array($result);
        if(count($Results)>=1)
         {
            $query = "update users set password='".sha1($password)."' where id='".$Results['id']."'";
            $database->query($query);
            echo  "Your password changed sucessfully <a href=\"login.php\">click here to login</a>.";
         }else{
            echo 'Invalid key please try again. <a href="forget.php">Forget Password?</a>';
         }
    }else{/* header("location: /login-signup-in-php"); */ }


?>
<?php
 $msge ="";
if(isset($_GET['action']) && $_GET['action']=='reset'){
    $encrypt = $database->escape_value($_GET['encrypt']);
    $query = "SELECT id FROM users where sha1(90*13+id)='".$encrypt."'";
    $result = $database->query($query);
    $Results = $database->fetch_array($result);
    if(count($Results)>=1){
?>
<?php require_once("layout/header.php"); ?>
<section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<h1>Reset Password </h1>
                            <h5><?php echo "<p>".$msge."</p>"; ?></h5>
						</div>
						<div class="signin">
							<form action="retrive.php" method="post" id="reset_frm">
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" name="password" id="password" class="lock" placeholder="Enter new Password"  required/>
								   <input type="hidden" name="encrypt" value="<?php echo $encrypt;       ?>"/>
								   <input type="hidden" name="uid"     value="<?php echo $Results['id']; ?>"/>
								</div>
								<div class="clearfix"> </div>
							</div>
                            <div class="log-input">
								<div class="log-input-left">
								   <input type="password" name="password2" id="password2" class="lock" placeholder="Re-Enter Password"  required/>
								</div>
								<div class="clearfix"> </div>
							</div>

							<input type="submit" value="Reset" id="reset" onclick="mypasswordmatch()" name="reset">
						</form>
						</div>
					</div>
				</div>
			</div>
     </section>
		<!--footer section start-->

        <!--footer section end-->
<?php
}else{
$msge = 'Invalid key please try again. <a href="forget.php">Forget Password?</a>';
echo "<h5><p>".$msge."</p></h5>";
}
}

?>
