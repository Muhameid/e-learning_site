<?php
require('../../../../utility/utility.php');
$query="select * from subcategories order by id desc";
$res=mysqli_query($con,$query);
$i=1;
$template='';
while($row=mysqli_fetch_assoc($res)){
$st='';
$cb='';
$idd=$row['id'];
$scat=$row['id'];
$query2="select * from commission where scat_id='$scat'";
$res2=mysqli_query($con,$query2);
$rowt=mysqli_fetch_assoc($res2);

$id=$row['id'];
$name=$row['subcat'];
$pcat=$row['cat_id'];
$h=mysqli_fetch_assoc(mysqli_query($con,"select * from categories where id='$pcat'"));
$pcat=$h['category'];
$template=$template."
<div class='detailrow'>
<div class='sl'>  $i </div>
<div class='catname'> $name</div>
<div class='nos'> $pcat </div>

<div class='status'>
  <span class='active_span'>
  $st
  </span>
</div>
<div class='action'>
  <button class='edit' onclick='editsubcat($id)'>
    <i class='fa fa-pen' aria-hidden='true'></i>Modifier
  </button>
  $cb
  <button class='delete' onclick='subcatdelete($id)'>
    <i class='fa fa-trash' aria-hidden='true'></i>Supprimer
  </button>
</div>
</div>
";
    
$i++;
}
echo $template;
?>       