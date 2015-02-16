<?php

// try {
//     require $_SERVER['DOCUMENT_ROOT'] . '/model/model.php';
// } catch (Exception $exc) {
//     header('location: /errordocs/501.php');
//     exit();
// }

// Credit for much of this function goes to David Walsh at davidwalsh.name/php-calendar

/* draws a calendar */
function draw_calendar($month,$year){

  $month = monthToInt($month);
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
  for($day = 1; $day <= $days_in_month; $day++):
    $calendar.= '<td class="calendar-day">';
      /* add in the day number */
      $calendar.= '<div class="day-number">'.$day.'</div>';

      /** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/

    $data =  getReservations($month, $year, $day);
    if(isset($data['day_id']) && $data['approved'] == 'y'){
      $calendar.= str_repeat('<p>Day is Reserved</p>',1);
    }
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



echo '<h2>'.monthToString($month).' '.$year.'</h2>';
echo draw_calendar($month, $year);
echo 'Thanks for registering! You will recieve a confirmation email when you are approved.<br><br><br>';
?>

<form action="/" method="post">
  <fieldset>
  <legend>Please Fill Out All Fields That Say Required</legend>
    <label for="firstname">First Name</label><br>
    <input type="text" name="firstname" size="30" placeholder="Required" value="<?php if(isset($firstname)){ echo $firstname;} ?>" REQUIRED><br>
    <label for="lastname">Last Name</label><br>
    <input type="text" name="lastname" size="30" placeholder="Required" value="<?php if(isset($lastname)){ echo $lastname;} ?>" REQUIRED>

    <h2>Please Select the Month</h2>
    <input type="radio" name="month" value="January" REQUIRED>
    <label for="January">January</label><br><br>
    <input type="radio" name="month" value="February" REQUIRED>
    <label for="February">February</label><br><br>
    <input type="radio" name="month" value="March" REQUIRED>
    <label for="March">March</label><br><br>
    <input type="radio" name="month" value="April" REQUIRED>
    <label for="April">April</label><br><br>
    <input type="radio" name="month" value="May" REQUIRED>
    <label for="May">May</label><br><br>
    <input type="radio" name="month" value="June" REQUIRED>
    <label for="June">June</label><br><br>

    <h2>Please Select The Year</h2>
    <input type="radio" name="year" value="2015" REQUIRED>
    <label for="2015">2015</label><br>

    <h2>Please Select The Day</h2>
    <input type="radio" name="day" value="1" REQUIRED>
    <label for="1">1</label><br>

    <h2>Comments or Concerns?</h2>
    <textarea name="message" rows="8" cols="50" REQUIRED>
      <?php if(isset($message)){ echo $message;} ?>
    </textarea>

    <h2>Contact Information</h2>
    <label for="emailAddress">Email Address</label><br>
    <input type="text" name="emailAddress" size="30" placeholder="Required" value="<?php if(isset($emailAddress)){ echo $emailAddress;} ?>" REQUIRED><br>
    <label for="phoneNumber">Phone Number</label><br>
    <input type="text" name="phoneNumber" size="10" placeholder="Required" value="<?php if(isset($phoneNumber)){ echo $phoneNumber;} ?>" REQUIRED><br>
    <label for="lineOne">Address</label><br>
    <input type="text" name="lineOne" size="30" placeholder="Required" value="<?php if(isset($lineOne)){ echo $lineOne;} ?>" REQUIRED><br>
    <label for="lineTwo"></label><br>
    <input type="text" name="lineTwo" size="30" placeholder="" value="<?php if(isset($lineTwo)){ echo $lineTwo;} ?>"><br>
    <label for="city">City</label><br>
    <input type="text" name="city" size="30" placeholder="Required" value="<?php if(isset($city)){ echo $city;} ?>" REQUIRED><br>
    <label for="state">State</label><br>
    <input type="text" name="state" size="30" placeholder="Required" value="<?php if(isset($state)){ echo $state;} ?>" REQUIRED><br>
    <label for="zipcode">Zip Code</label><br>
    <input type="text" name="zipcode" size="30" placeholder="Required" value="<?php if(isset($zipcode)){ echo $zipcode;} ?>" REQUIRED><br>

    <input type="submit" name="action" value="Reserve">
  </fieldset>
</form>
