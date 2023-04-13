<?php require_once("includes/connection.php"); ?>
<?php

 $res=call getall_notification();
 mysqli_fetch_all($res);

?>