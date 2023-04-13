<?php require_once("layout/header.php"); ?>
<?php require_once('includes/initilaize.php'); ?>
<?php if (!$session->is_logged_in() || $session->user_auth!=1) { redirect_to("login.php"); } ?>

<link rel="stylesheet" href="css/thickbox.css">
<script src="js/thickbox.js"></script>
<script type="text/javascript">
 function contact(){
      var inser=$('#con_frm').serialize();
      $('#con_show').html("sending Message >>>>>>>");
      $.post('upload.php',inser,function(output){
          $('#con_show').html(output).fadeIn(2000);
    });
  }

  function edit(){
      var inser=$('#edit').serialize();
      $('#ed_show').html("Please Waite >>> >>> >>>");
      $.post('admin/update_parent.php',inser,function(output){
          $('#ed_show').html(output).fadeIn(2000);
    });
  }

  function acadimic_chart(){
     $('#sss').html("Please Waite >>> >>> >>>");
      $.post('chart.php',null,function(output){
          $('#sss').html(output).fadeIn(2000);
    });
  }

</script>

<script>
  /*** this script for submitting csv file
  /**  save data in Data base
  /*   Return Action Message to user */
  $(document).ready(function () {

    $("#get").click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $('#res_frm')[0];

		// Create an FormData object
        var data = new FormData(form);

		// If you want to add an extra field for the FormData
       // data.append("CustomField", "This is some extra data, testing");

		// disabled the submit button
        $("#get").prop("disabled", true);
          $('#sss').html('الرجاء الانتظار ...');
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "std_result.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {

                $("#sss").html(data);
                console.log("SUCCESS : ", data);
                $("#get").prop("disabled", false);

            },
            error: function (e) {

                $("#sss").html(e.responseText);
                console.log("ERROR : ", e);
                $("#get").prop("disabled", false);

            }
        });

    });

})
  </script>

	<!--Vertical Tab-->
	<div class="categories-section main-grid-border">
		<div class="container">
			<div class="alert alert-success closeTrigger" role="alert">
			 <h2 class="head"><span class="glyphicon glyphicon-tasks"></span>  لــوحـــة تحــكم اوليـاء الإمــــور</h2>
            </div>
			<div class="category-list">
				<div id="Tab">
					<ul class="resp-tabs-list hor_1">
						<li><span class="glyphicon glyphicon-envelope"></span> النتـيجــــة</li>
						<li><span class="glyphicon glyphicon-info-sign"></span> الإشـعارات</li>
						<li><span class="glyphicon glyphicon-inbox"></span> المـراســلات</li>
						<li><span class="glyphicon glyphicon-user"></span> ملفـي الشخـصــي</li>
					   <a href="?log=false" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> تسجـيــل خــروج</a>
					</ul>
					<div class="resp-tabs-container hor_1">
						<span class="active total" style="display:block;" data-toggle="modal" data-target="#myModal"><strong>نظام جامعتي الالكتروني</strong></span>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/ico-terms.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4>النتـيجــــة</h4>
									<span>احصل عليها الآن بسهولة</span>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="post-ad-form">
								<form role="form"  id="res_frm" action="#" method="post" >
                                   <div class="clearfix"></div>
                    					<input type="number" name="class" min="1" max="8" class="phone"  required>
                                        <label>رقــم الفصل الدراســي <span>*</span></label>
                    					<div class="clearfix"></div>
                                        <div class="clearfix"></div>
                                        <input type="submit" value="عرض النتيجـــة" id="get">
                                        <input type="button" value="عــرض مخطط آداء الطــالب" onclick="acadimic_chart()">
                                </form>
							</div>
                            <div class="clearfix"></div>
                            <div id="sss"></div>
						</div>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/n1.jpeg" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4>الإشعارات</h4>
									<span></span>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<li><a href="show_notes.php?keepThis=false&TB_iframe=true&height=500&width=900" title="Contact Center" class="thickbox btn btn-default"><span class="glyphicon glyphicon-flag"></span> أعرف آخـر الأخبــار</a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
                        	<div>
							<div class="category">
								<div class="category-img">
									<img src="images/msg.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4>المراســلات</h4>
									<span>مركز الاستفسارات</span>
								</div>
								<div class="clearfix"></div>
							</div>
                            <div class="sub-categories">
								<ul>
									<li><a href="admin/messages.php?u=<?php echo $session->user_id;?>&keepThis=false&TB_iframe=true&height=500&width=900" title="Contact Center" class="thickbox btn btn-default"><span class="glyphicon glyphicon-info-sign"></span> عــرض آخر المراســلات</a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
                            <div class="post-ad-form">
								<form role="form"  id="con_frm" action="#" method="post" >
                                   <div class="clearfix"></div>
                                   <div id="con_show"></div>
                                        <input type="text" name="sub" placeholder="مــا هــو إستفســارك ؟"style="float: left">
                                        <label>الموضـــوع <span>*</span></label>
                    					<label>اكتب هنـــا <span>*</span></label>
                                    	<textarea name="m" cols="40" rows="20" style="float: left"></textarea>
                    					<div class="clearfix"></div>
                                        <div class="clearfix"></div>
                                        <input type="button" class="btn btn-success col-sm-4" style="float: right; margin: 50px" value="ارســـال" onclick="contact()">
                    					<div class="clearfix"></div>
                                </form>
							</div>
						</div>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/admin.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4>حســابي</h4>
									<span>تعديلات الحسابات</span>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="post-ad-form" class="sub-categories">
								<form id="edit" method="post">
                                <div class="clearfix"></div>
                                   <div  id="ed_show"></div>
                                    <div class="clearfix"></div>
                                        <input type="hidden" name="id" value="<?php echo $session->user_id; ?>">
                    					<input type="text" name="email" class="phone" placeholder="Example@SomeThing.Com" required style="float: left">
                                        <label>البريد الالكترونــي <span>*</span></label>
                    					<div class="clearfix"></div>
                    					<input type="password" name="pass" class="phone" placeholder="كلمــة المــرور الجــديدة"  required style="float: left">
                                        <label>كلمــة المــرور <span>*</span></label>
                    					<div class="clearfix"></div>
                                        <input type="button" value="تعديل" class="btn btn-warning col-sm-4" style="float: right; margin: 50px" value="Send" onclick="edit()">
                    					<div class="clearfix"></div>
                                </form>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--Plug-in Initialisation-->
	<script type="text/javascript">
    $(document).ready(function() {

        //Vertical Tab
        $('#Tab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>
 <?php
     if(isset($_GET['log'])=='false'){
     $user=User::find_by_id($session->user_id);
     log_action('LogOut ', "Parent ".$user->username." logout .");
     $session->logout();
      $session->message("تم تسجيل الخروج بنجاح");
         redirect_to("login.php"); }
     ?>
<?php require_once("layout/footer.php"); ?>