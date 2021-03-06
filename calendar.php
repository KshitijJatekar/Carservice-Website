<?php
//get class into the page
require_once('calendar/classes/tc_calendar.php');

//instantiate class and set properties
 $myCalendar = new tc_calendar("date5");
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(1890, 2080);
					  
	  $myCalendar->dateAllow('1890-01-01', '2045-05-01', false);
					  
	  $myCalendar->setSpecificDate(array("2039-01-10", "2039-01-13", "2039-01-23"), 0, 'month');
					  
	  $myCalendar->startMonday(true);
	  $myCalendar->showWeeks(true);  
					  
	  //Tooltips
	  $myCalendar->setToolTips(array("2013-07-02", "2013-07-15", "2013-07-25"), 'ŞŢĂÎÂ şţăîâ אי אפשר test!', '');
	  $myCalendar->setToolTips(array("2013-06-06", "2013-06-01", "2013-06-05"), 'אי אפשר לבחור תאריך זה', 'month');
	  $myCalendar->setToolTips(array("1969-07-06", "2040-07-01", "2013-06-05"), 'Δεν επιτρέπετε η επιλογή αυτής της ημέρας', 'month');
	  $myCalendar->setToolTips(array("1969-07-06", "2040-07-01", "2013-06-05"), 'الإصدار الخاص بي ليس لديها الدعم للعام 2038 وفيما بعد!', 'month');
	  $myCalendar->setToolTips(array("1969-07-06", "2040-07-01", "2013-06-05"), 'の間の日付を選択してください', 'month');
	  $myCalendar->setToolTips(array("1969-07-06", "2040-07-01", "2013-06-05"), '올바르지 않은 값입니다', 'month');
          $myCalendar->setToolTips(array("2013-06-06", "2013-06-11", "2013-06-15"), 'और बाद के वर्षों का समर्थन नहीं है!', 'month');
          $myCalendar->setToolTips(array("2013-07-06", "2013-01-01", "2013-12-25"), 'วันนี้ไม่ได้รับอนุญาตให้มีการเลือก', 'year');
	  $myCalendar->setToolTips(array("2013-07-06", "2013-07-15", "2013-07-25"), '请选择日期%s之前一个', '');
					
		 $myCalendar->setTheme('theme3');
					
	  $myCalendar->setTimezone("Australia/Melbourne");
	  
	  
	  

//output the calendar
$myCalendar->writeScript();	  
?>