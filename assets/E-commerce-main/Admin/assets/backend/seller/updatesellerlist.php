<?php
require('../../../../utility/utility.php');
$query="select * from sellers order by id desc";
$res=mysqli_query($con,$query);
$i=1;
$template='';

while($row=mysqli_fetch_assoc($res)){
$st='';
$cb='';
$name=$row['f_name'];
$email=$row['email'];
$id=$row['id'];
$y="'seller_detail.php?sid=$id'";

      $template=$template.'
      <div class="p_row">
                  <div class="slno"> '.$i.'</div>
                  <div class="p_name">'.$row['f_name'].'</div>
                  <div class="p_image"> '.$row['email'].'</div>
                  <div class="p_status">
                    <span class="active_span"> '.$st.'</span>
                  </div>
                  <div class="p_action">
                    <button
                      class="edit"
                      onclick="redirect_to('.$y.')"
                    >
                      <i class="fa fa-wifi" aria-hidden="true"></i>View
                    </button>
                     '.$cb.'
                    <button class="delete" onclick="deleteseller('.$id.')">
                      <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </button>
                  </div>
                </div>
      ';
     $i++;
  }
  echo $template;
  ?>    