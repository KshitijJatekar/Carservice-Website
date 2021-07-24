<?php

require_once "config.php";

$default_slot_array = array("9am - 11am","11am - 1pm","1pm - 3pm","3pm - 5pm");
$default_slot_array_length = count($default_slot_array);

$db_slots = array();
$db_inverse_dynamic_slots = array();


$CurrentId = "";

//schedule variables
$user_name_schedule="";
$user_email_schedule="";




//variables
$service_name="Full Car Repairing";
$user_email="";
$user_name="";
$selected_timing="";

//database retrived data keys for slots
$db_service_name="";
$db_price="";
$db_timing="";
$db_date="";


date_default_timezone_set('Asia/Kolkata');
//$date_and_time = date("d-m-Y,h:i:sa");

$only_date= date("Y-m-d");
$_POST['only_date'] = $only_date;

$cost = '3000';


if(isset($_POST['validate_todays_slot']))
{
	$selected_timing = $_POST['selected_timing'];
	$user_email = $_POST['user_email'];
	$user_name = $_POST['user_name'];
	
	
	$sql_2 = "INSERT INTO scheduledata(Customer_Name, Service_Name, Price, Timing, Email, Date) VALUES ('$user_name','$service_name','$cost','$selected_timing','$user_email','$only_date')";
				
				$result = mysqli_query($link, $sql_2);
		
				
				
				if($result)
				{
					header("location: slotconfirmed.php?user_name=$user_name&user_email=$user_email&only_date=$only_date&selected_timing=$selected_timing&cost=$cost&service_name=$service_name");
				}
				else
				{
					echo "something went wrong please try again later";
				}

	
	
}	
	
if(isset($_POST['validate_scheduled_slot']))
{
	$user_email_schedule = $_POST['user_email_schedule'];
	$user_name_schedule = $_POST['user_name_schedule'];
	
	$theDate = isset($_REQUEST["date5"]) ? $_REQUEST["date5"] : "";
	
	
	header("location: validated_slots.php?service_name=$service_name&cost=$cost&schedule_date=$theDate&user_name=$user_name_schedule&user_email=$user_email_schedule");
	
}



?>



<!doctype html>
<html lang="en">
  <head>
	<title>
		Car wash website
	</title>
	
	
	<script language="javascript" src="calendar/calendar.js"></script>
	
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/animate.css">
  </head>
  <body >
  
  
	<br /><br /><br />
  
	<div class="container">
	
		<div class="text-center">
		
			<h2 style="font-weight: lighter;">Book Appointment Slot - Car Wash System</h2>
		
		</div>
	
	</div>
  
  
	<br /><br /><br />
  
	<div class="container">
	
		<h5> Service Name  </h5> <label style="font-size:23px;"> Full Car Repairing </label>
		<hr />
		<h5> Total Service Cost </h5> <h5 style="color:green;font-size:23px;"> 3000 Rs </h5>
		
	</div>
  
  
  
	<br /><br />
  
	<div class="container">
		
		
			  <ul class="nav nav-tabs " id="myTab" role="tablist">
			  <li class="nav-item" role="presentation">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Book Slot Today</a>
			  </li>
			  <li class="nav-item" role="presentation">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Schedule Slot</a>
			  </li>
			 
			</ul>
		
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			  <br />
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					 <fieldset disabled>
					   <div class="form-group">
						  <label for="disabledTextInput">Date</label>
						  <input type="text" id="disabledTextInput" class="form-control" name="date" placeholder="<?php echo $only_date;?>">
						</div>
					  
					   <div class="form-group">
						<label for="exampleFormControlInput1">Service Cost</label>
						<input type="text" class="form-control" name="exampleFormControlInput1" placeholder="<?php echo $cost;?>">
					  </div>
					 </fieldset>
					  <hr/>
					  <label style="font-size:23px;">When you want service ?</label>
					  
					  <br />
					  <?php
						
						$sql_1 = "SELECT Timing FROM scheduledata WHERE Date = '$only_date' && Service_Name = '$service_name'";
	
						$result = mysqli_query($link, $sql_1);
						
						$query_row_no = mysqli_num_rows($result);
						
						if($query_row_no >=1)
						{
							
							while($row_data = mysqli_fetch_assoc($result))
							{
								//$db_slots[] = $row_data;
								$db_slots[] = $row_data['Timing'];
								
							}
							
							
							//core sheduling logic 1.0
							
							
							$updated_array = array_diff($default_slot_array, $db_slots);
							
							$updated_array2 = array_values($updated_array);
							
							$updated_array_length = count($updated_array2);
							
							
						//	print_r($updated_array2);
							
							
							//$db_inverse_dynamic_slots_length = count($db_inverse_dynamic_slots)
							//echo $db_inverse_dynamic_slots_length;
							/*for($i=0;$i<$db_inverse_dynamic_slots_length;$i++)
							{
								echo $db_inverse_dynamic_slots[$i];
							}*/
							
							if($updated_array_length != 0)
							{
									
							
								?>
							
									<div class="form-group">
										<label for="exampleFormControlSelect1">Select available timings</label>
										<select class="form-control" name="selected_timing">
									
										<option selected>Time</option>
										<?php
										for($i=0;$i<$updated_array_length; $i++)
										{
										
											?>
										
											<option><?php echo $updated_array2[$i]; ?></option>
									  
											<?php
										}
							}
							else
							{
								?>
							
										<div class="form-group">
										<label for="exampleFormControlSelect1">Select available timings</label>
										<select class="form-control" name="selected_timing">
									
										<option selected>Time</option>
										
										
										<option>No time slots available today please go for schedule tab.</option>
										
											<?php
											echo "<script>alert('No slot available today i.e. $only_date please go for schedule tab.')</script>";
											
											
							}
							
							
							
						}			
						  
						else
						{
							
					  
					//echo $db_slots[];
					  
					  ?>
					  
						  <div class="form-group">
							<label for="exampleFormControlSelect1">Select timings</label>
							<select class="form-control" name="selected_timing">
							
							 <option selected>Time</option>
							<?php
							for($i=0;$i<$default_slot_array_length; $i++)
							{
								
								?>
							 
							  <option><?php echo $default_slot_array[$i]; ?></option>
							  
								<?php
							}
								
						}	 
						  ?>
						</select>
					  </div>
					  
					  <div class="form-group">
						<label for="exampleFormControlInput1">Enter Email Address</label>
						<input type="email" class="form-control" name="user_email" placeholder="name@example.com">
					  </div>
					  
					   <div class="form-group">
						<label for="exampleFormControlInput1">Enter Your Name </label>
						<input type="text" class="form-control" name="user_name" placeholder="Your name">
					  </div>
					  
					  <br />
					  <input type="submit" name="validate_todays_slot" class="btn btn-success btn-md" value="Validate ">
					  
				</form>
			  
			  </div>
			  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			  
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1">
						 <fieldset disabled>
							  <br />
							   <div class="form-group">
								<label for="exampleFormControlInput1">Service Cost</label>
								<input type="text" class="form-control" name="exampleFormControlInput1" placeholder="<?php echo $cost;?>">
							  </div>
						 </fieldset>
						  <hr/>
						  
						  	<label style="font-size:23px;" >Please Select date</label>
						  
						  <br /><br />
						  
							<?php include "calendar.php";?>
							
							<br />
							<script language="javascript">
							<!--
							function showDateSelected(){
							   alert("Date selected is "+document.form1.date5.value);
							}
							//-->
							
							</script>
							<?php
							
							
								

							?> 
							
							<a class="btn btn-success btn-md" href="javascript:showDateSelected();">Check calendar value</a>
						  
						  <br /><br />
						   <div class="form-group">
							<label for="exampleFormControlInput1">Enter Email Address</label>
							<input type="email" class="form-control" name="user_email_schedule" placeholder="name@example.com">
						  </div>
						  
						   <div class="form-group">
							<label for="exampleFormControlInput1">Enter Your Name </label>
							<input type="text" class="form-control" name="user_name_schedule" placeholder="Your name">
						  </div>
					  
					  <br />
					  <input type="submit" name="validate_scheduled_slot" class="btn btn-success btn-md" value="Find Slots ">
					  
					</form>
			  
			  </div>
			 
			</div>
		
	</div>
  
  
  <br /><br /><br /><br /> <br />
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	
	
	
  </body>
</html>