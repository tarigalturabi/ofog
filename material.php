<?php include("includes/initilaize.php") ;?>
<?php  if (!$session->is_logged_in()|| $session->user_auth!=3)
 {  redirect_to("login.php"); }  ?>
<html dir=rtl">
<head>
<!--<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-select.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />-->
<?php require_once(SITE_ROOT.DS."layout".DS."user_lib.php"); ?>
<style>
th,tr,td{    text-align: right; }

</style>
</head>
<?php  $all=Material::find_all(); ?>
<body>
<div class="container-fluid">
<!--<?php echo($message); ?>-->

<table class="table table-striped table-hover table-responsive" >
    <tr>
        <th ><b>تحميل</b></th>
        <th>القسم</th>
        <th>الفصل الدراسي</th>
        <th>النوع</th>
         <th>الحجم</th>
        <th>الإسم</th>
        <th>&nbsp;&nbsp;&nbsp;</th>

    </tr>

<?php foreach($all as $mat){?>

    <tr>
        <td><a href="uploads/<?php echo $mat->file_path(); ?>" download target="_blank"><span class="glyphicon glyphicon-cloud-download"></span></a></td>
        <td><?php echo $mat->part;?></td>
        <td><?php echo $mat->sem;?></td>
        <td><?php echo $mat->type = 1?"بكلاريوس":"دبلوم";?></td>
        <td><?php echo size_as_text($mat->size);?></td>
        <td><?php echo $mat->name;?></td>
        <td><img src="images/<?php echo $mat->extention; ?>.png"></td>
    </tr>

<?php }?>
</table>

  </div>

  </body>

</html>