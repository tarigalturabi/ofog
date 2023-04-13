<?php include("includes/initilaize.php"); ?>

<?php



    $id = $session->user_id;
    $class=isset($_POST['class'])?$_POST['class']:"";
    $number=isset($session->user_assoc)?$session->user_assoc:"";

    //check if data was sendded completed
    if( empty($class) || empty($id) || empty($number) ){
        echo action_message("الرجاء ادخال رقم الفصل الدراسي المراد الاستفسار عنه","warning");
        exit(1);
    }
    $student=$std->find_by_number($number);
    foreach($student as $s){
        $type=$s->study;
        $name=$s->name;
        $part=$s->dept;
     }
 ?>
 <html manifest="">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 </head>

<body >
<div class="col-sm-12" >
<table class="table table-striped table-hover table-responsive">
<th style="float: right">إســم الطــاب</th>
<?php

$res=get_sem_subs($class,$type,$part);
while($row=mysql_fetch_array($res)){  ?>
<th><?php echo $row['ar_name']; ?></th>
<?php } ?>
<td>المعدل الفصلي </td>
<td>المعدل التراكمي</td>
<tr>

<td>  <?php echo $name; ?> </td>

<?php
$res=get_sem_subs($class,$type,$part);
 while($row=mysql_fetch_array($res)){  ?>
<td>  <?php echo count_degree(get_grade($number,$row['code'])); ?> </td>
<?php } ?>

<td><?php echo CGPA($number,$class); ?></td>
<td><?php echo GPA($number,$class); ?></td>
 </tr>


</table>
</div>
</body>
</html>
