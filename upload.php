<?php ?>
<?php include("includes/initilaize.php") ?>
<style>
  .warrning{
    width: 60%;

      border-left:  #F00 50px  outset;
      text-align: center;
      padding: 15px;

  }

  </style>
  <body>
  <div class="container">
<?php

// A list of permitted file extensions
/*$allowed = array('png', 'jpg', 'gif','zip');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$_FILES['upl']['name'])){
		echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;*/
$title   	=isset($_POST['sub'])?trim($_POST['sub']):"";
$body	   	=isset($_POST['m'])?trim($_POST['m']):"";
$to	     	=isset($_POST['to'])?$_POST['to']:"";
if(empty($body) || empty($title)) {
        echo action_message('من فضلك املأ كافة الحقول','warning');
        exit(1);
	}
    else {
        //prepare Sender And Receiver User
        //if logged user is parent then receiver will be admin('09')
        if($session->user_auth==1) $rec='09';
        //if logged user is admin then the message will be reply
        if(!empty($to)) $rec=$to;
        //and receiver will be the parent that sent message

        $msg=new Contact();
        $msg->title=$title;
        $msg->body=$body;
        $msg->msg_from=$session->user_id;
        $msg->msg_to=$rec;
        $msg->date= date("Y/m/d h:i:s ").date_default_timezone_get();

        if($msg->save()){
            echo action_message("تم ارســال رسالتك ");
        exit(0);
        }  else {
            echo action_message("تعذر الارسال حاول لاحقاً",'warning');
            exit(0);
         }

	}
?>
</div>
</body>