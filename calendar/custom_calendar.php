<?php
$calendarpath="https://www.google.com/calendar/embed?src=tdv5lpteblsnat2jpnbiamue90%40group.calendar.google.com&ctz=Asia/Singapore";

//Custom css path
$newcss="google_calendar.css";

//Iframe contants
$contents = file_get_contents($calendarpath);

// add secure Google address to root relative links
$contents = str_replace('<link type="text/css" rel="stylesheet" href="//www.google.com/calendar/', '<link type="text/css" rel="stylesheet" href="https://www.google.com/calendar/', $contents );
$contents = str_replace('<script type="text/javascript" src="//www.google.com/calendar/', '<script type="text/javascript" src="https://www.google.com/calendar/' , $contents );

//Inject custom css to iframe
$contents = str_replace('<script>function _onload()', '<script>function _onload()', $contents );

//Set up default view.
$contents = str_replace('"view":"month"', '"view":"week"', $contents);

//Hide calendar menu
$contents = str_replace('"showCalendarMenu":true', '"showCalendarMenu":false', $contents);

//Echo calendar
echo $contents;
?>
