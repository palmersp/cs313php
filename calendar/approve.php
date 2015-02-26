<?php

if($_SESSION['admin'] == TRUE){


  $limit = getDayId();
  $pendingCheck = 0;
  $list = '<h2>Select a Person To Approve</h2>';
  // $list .= '<form action="/" method="post"><ul>';
  for($i = 1; $i <= $limit['day_id']; $i++){
    $pending = pendingApprovalAll($i);
    if(($pending['approved'] === NULL || $pending['approved'] == '') && isset($pending['day_id'])) {
      $pendingCheck++;
      $list .= '<form action="/" method="post"><ul><li>'.$pending['first_name'].' '.$pending['last_name'].' '.$pending['day'].' '
      .monthToString($pending['month']). ' '. $pending['year'].' '. $pending['comment_text'].' '.$pending['email_address'];
      $list .= ' <input type="radio" name="decision" value="y '.$pending['client_id'].'"><label for="y">Yes</label> '
      .'  <input type="radio" name="decision" value="n '.$pending['client_id'].'"><label for="n">No</label></li></ul><input type="submit" name="action" value="Submit Decision"></form>';

   }
 }

  // $list .= '</ul><input type="submit" name="action" value="Submit Decision"></form>';
  echo $list;
  if ($pendingCheck == 0){
    echo "There are no clients pending approval";
  }
}
else {
  echo 'Please login';
}


 ?>
