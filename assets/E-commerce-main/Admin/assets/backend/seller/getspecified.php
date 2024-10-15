<?php
require('../../../../utility/utility.php');
$sts=$_POST['id'];
$query="select * from wp_users where status='$sts' order by id desc";
$res=mysqli_query($con,$query);
$i=1;
$template='';


  echo $template;
  ?>    