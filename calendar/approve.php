<?php

if($_SESSION['admin'] == TRUE){


  $limit = getDayId();
  $list = '<form action="/" method="post"><ul>';
  for($i = 1; $i <= $limit['day_id']; $i++){
    $pending = pendingApprovalAll($i);
    if(($pending['approved'] === NULL || $pending['approved'] == '') && isset($pending['day_id'])) {
    $list .= '<li>'.$pending['first_name'].' '.$pending['last_name'].' '.$pending['day'].' '
    .monthToString($pending['month']). ' '. $pending['year'].' '. $pending['comment_text'].' '.$pending['email_address'];
    $list .= ' <input type="radio" name="decision" value="yes"><label for="y">Yes</label> '
    .'  <input type="radio" name"decision" value="n"><label for="no">No</label></li>';

   }
 }

  $list .= '</ul><input type="submit" name="action" value="Submit Decision"></from>';
  echo $list;
}
else {
  echo 'Please login';
}


 ?>
