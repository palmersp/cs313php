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

?>

<h2>Select the Month</h2>
<form action="/" method="post">

<select name="month">
  <option value="January" <?php if ($month == 'January' ) { echo 'SELECTED';} ?> REQUIRED>January</option>
  <option value="February" <?php if ($month == 'February' ) { echo 'SELECTED';} ?> REQUIRED>February</option>
  <option value="March" <?php if ($month == 'March' ) { echo 'SELECTED';} ?> REQUIRED>March</option>
  <option value="April" <?php if ($month == 'April' ) { echo 'SELECTED';} ?> REQUIRED>April</option>
  <option value="May" <?php if ($month == 'May' ) { echo 'SELECTED';} ?> REQUIRED>May</option>
  <option value="June" <?php if ($month == 'June' ) { echo 'SELECTED';} ?> REQUIRED>June</option>
  <option value="July" <?php if ($month == 'July' ) { echo 'SELECTED';} ?> REQUIRED>July</option>
  <option value="August" <?php if ($month == 'August' ) { echo 'SELECTED';} ?> REQUIRED>August</option>
  <option value="September" <?php if ($month == 'September' ) { echo 'SELECTED';} ?> REQUIRED>September</option>
  <option value="October" <?php if ($month == 'October' ) { echo 'SELECTED';} ?> REQUIRED>October</option>
  <option value="November" <?php if ($month == 'November' ) { echo 'SELECTED';} ?> REQUIRED>November</option>
  <option value="December" <?php if ($month == 'December' ) { echo 'SELECTED';} ?> REQUIRED>December</option>
</select>

<h2>Select The Year</h2>
<input type="radio" name="year" value="2015" <?php if ($year == '2015' ) { echo 'CHECKED';} ?> REQUIRED>
<label for="2015">2015</label><br>
<input type="radio" name="year" value="2016" <?php if ($year == '2016' ) { echo 'CHECKED';} ?> REQUIRED>
<label for="2016">2016</label><br>

<input type="submit" name="action" value="Change Month">
</form>

<!-- <form action="/" method="post">
  <input type="submit" name="action" value="Last"> -->
  <!-- <input type="hidden" name="action" value="<?php $month ?>"/> -->
  <!-- <input type="submit" name="action" value="Next">
</form> -->

<?php
echo '<h2>'.monthToString($month).' '.$year.'</h2>';
echo draw_calendar($month, $year);
if (isset($thanks)) {echo $thanks; } ;
?>

<form action="/" method="post">
  <fieldset>
  <legend>Please Fill Out All Fields That Say Required</legend>
    <label for="firstname">First Name</label><br>
    <input type="text" name="firstname" size="30" placeholder="Required" value="<?php if(isset($firstname)){ echo $firstname;} ?>" REQUIRED><br>
    <label for="lastname">Last Name</label><br>
    <input type="text" name="lastname" size="30" placeholder="Required" value="<?php if(isset($lastname)){ echo $lastname;} ?>" REQUIRED>

    <h2>Selected Month</h2>
    <input type="radio" name="month" value="<?php echo $month ?>" CHECKED REQUIRED>
    <label for="<?php echo $month ?>"><?php echo $month?></label><br>

    <h2>Selected Year</h2>
    <input type="radio" name="year" value="<?php echo $year ?>" CHECKED REQUIRED>
    <label for="<?php echo $year ?>"><?php echo $year ?></label><br>

    <h2>Please Select The Day</h2>
    <select name="day">
      <option value="1" REQUIRED>1</option>
      <option value="2" REQUIRED>2</option>
      <option value="3" REQUIRED>3</option>
      <option value="4" REQUIRED>4</option>
      <option value="5" REQUIRED>5</option>
      <option value="6" REQUIRED>6</option>
      <option value="7" REQUIRED>7</option>
      <option value="8" REQUIRED>8</option>
      <option value="9" REQUIRED>9</option>
      <option value="10" REQUIRED>10</option>
      <option value="11" REQUIRED>11</option>
      <option value="12" REQUIRED>12</option>
      <option value="13" REQUIRED>13</option>
      <option value="14" REQUIRED>14</option>
      <option value="15" REQUIRED>15</option>
      <option value="16" REQUIRED>16</option>
      <option value="17" REQUIRED>17</option>
      <option value="18" REQUIRED>18</option>
      <option value="19" REQUIRED>19</option>
      <option value="20" REQUIRED>20</option>
      <option value="21" REQUIRED>21</option>
      <option value="22" REQUIRED>22</option>
      <option value="23" REQUIRED>23</option>
      <option value="24" REQUIRED>24</option>
      <option value="25" REQUIRED>25</option>
      <option value="26" REQUIRED>26</option>
      <option value="27" REQUIRED>27</option>
      <option value="28" REQUIRED>28</option>
      <option value="29" REQUIRED>29</option>
      <option value="30" REQUIRED>30</option>
      <option value="31" REQUIRED>31</option>
    </select>

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
