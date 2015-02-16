<?php

// Credit for much of this function goes to David Walsh at davidwalsh.name/php-calendar

/* draws a calendar */
function draw_calendar($month,$year){
  switch ($month) {
    case 'January':
      $month = 1;
      break;
    case 'February':
      $month = 2;
      break;
    case 'March':
      $month = 3;
      break;
    case 'April':
      $month = 4;
      break;
    case 'May':
      $month = 5;
      break;
    case 'June':
      $month = 6;
      break;
    case 'July':
      $month = 7;
      break;
    case 'August':
      $month = 8;
      break;
    case 'September':
      $month = 9;
      break;
    case 'October':
      $month = 10;
      break;
    case 'November':
      $month = 11;
      break;
    case 'December':
      $month = 12;
      break;
  }
  /* draw table */
  $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

  /* table headings */
  $headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
  $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

  /* days and weeks vars now ... */
  $running_day = date('w',mktime(0,0,0,$month,1,$year));
  $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
  $days_in_this_week = 1;
  $day_counter = 0;
  $dates_array = array();

  /* row for week one */
  $calendar.= '<tr class="calendar-row">';

  /* print "blank" days until the first of the current week */
  for($x = 0; $x < $running_day; $x++):
    $calendar.= '<td class="calendar-day-np"> </td>';
    $days_in_this_week++;
  endfor;

  /* keep going with days.... */
  for($list_day = 1; $list_day <= $days_in_month; $list_day++):
    $calendar.= '<td class="calendar-day">';
      /* add in the day number */
      $calendar.= '<div class="day-number">'.$list_day.'</div>';

      /** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
      $calendar.= str_repeat('<p> </p>',2);

    $calendar.= '</td>';
    if($running_day == 6):
      $calendar.= '</tr>';
      if(($day_counter+1) != $days_in_month):
        $calendar.= '<tr class="calendar-row">';
      endif;
      $running_day = -1;
      $days_in_this_week = 0;
    endif;
    $days_in_this_week++; $running_day++; $day_counter++;
  endfor;

  /* finish the rest of the days in the week */
  if($days_in_this_week < 8):
    for($x = 1; $x <= (8 - $days_in_this_week); $x++):
      $calendar.= '<td class="calendar-day-np"> </td>';
    endfor;
  endif;

  /* final row */
  $calendar.= '</tr>';

  /* end the table */
  $calendar.= '</table>';

  /* all done, return result */
  return $calendar;
}
echo '<h2>'.$month.' '.$year.'</h2>';
echo draw_calendar($month, $year);

// echo '<h2>'.$month.' '.$year.'</h2>';
// echo draw_calendar($month, $year);

/* sample usages */
// echo '<h2>July 2009</h2>';
// echo draw_calendar(7,2009);
//
// echo '<h2>August 2009</h2>';
// echo draw_calendar(8,2009);

?>
