<?php

require_once "config.php";

static $count_validator ;

//url variables
	$service_name = $_GET['service_name'];
	$price = $_GET['cost'];
	$selected_date = $_GET['schedule_date'];
	$user_name = $_GET['user_name'];
	$user_email = $_GET['user_email'];
	
//alloated data
$db_user_name = "";
$db_user_email = "";
$db_date = "";
$db_timings = "";
$db_cost = "";
$db_service_name = "";


$current_id = "";

$selected_timing="";
/*echo $service_name;
echo $booked_slot;*/

$default_slot_array = array("9am - 11am","11am - 1pm","1pm - 3pm","3pm - 5pm");
$default_slot_array_length = count($default_slot_array);

$db_slots = array();
$db_inverse_dynamic_slots = array();

if($count_validator==0)
{
	

	$sql_2 = "INSERT INTO scheduledata(Customer_Name, Service_Name, Price, Email, Date) VALUES ('$user_name','$service_name','$price','$user_email','$selected_date')";
					
					$result = mysqli_query($link, $sql_2);
			
				
				
				if($result)
				{
					//echo 'saved';
					$count_validator++;
					//echo $count_validator;
					$sql_3 = "SELECT Id FROM scheduledata WHERE Date = '$selected_date' && Email='$user_email'";
					
					$result2 = mysqli_query($link, $sql_3);
					
					if($result2)
					{
						while($row_data = mysqli_fetch_assoc($result2))
						{
							$current_id = $row_data['Id'];
						}
						//echo $current_id;
					}
					
					
				}
				
}


//echo $service_name , $price , $selected_date , $user_name , $user_email ;
$current_id = $current_id-1;
if(isset($_POST['select_timings_schedule_slot']))
{	
	$selected_timing = $_POST['selected_timing'];
	
	
	$sql_4 = "UPDATE scheduledata SET Timing = '$selected_timing' WHERE Id = '$current_id'";
	
				
				$result4 = mysqli_query($link, $sql_4);
		
				
				
				if($result4)
				{
					
					header("location: slotconfirmed2.php");
					
					$sql_3 = "SELECT Customer_Name, Service_Name, Price, Timing, Email, Date  FROM scheduledata WHERE Id  = '$current_id' ";
					
					$result2 = mysqli_query($link, $sql_3);
					
					if($result2)
					{
						while($row_data = mysqli_fetch_assoc($result2))
						{
							$db_user_name = $row_data['Customer_Name'];
							$db_service_name = $row_data['Service_Name'];
							$db_cost = $row_data['Price'];
							$db_timings = $row_data['Timing'];
							$db_user_email = $row_data['Email'];
							$db_date = $row_data['Date'];
						}
						
						header("location: slotconfirmed2.php?user_name=$db_user_name&user_email=$db_user_email&only_date=$db_date&selected_timing=$db_timings&cost=$db_cost&service_name=$db_service_name");

						
					}
					
				}
				else
				{
					echo "something went wrong please try again later";
				}
	
	
}





?>

<!doctype html>
<html lang="en">
  <head>
	<title>
		Car wash website
	</title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/animate.css">
  </head>
  <body >
	
	<br /><br /><br /><br />
	
	<div class="container">
	
		<div class="text-center">
		
			<h2 style="font-weight:lighter;"><?php echo $user_name; ?> ! Please select available slots for <?php echo $selected_date; ?></h2>
		
		</div>
	
	</div>
	<br /><br /><br />
	
	<div class="container">
	
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
								 
								  <label style="font-size:23px;">When you want service ?</label>
								  
								  <br />
								  <?php
									
									$sql_1 = "SELECT Timing FROM scheduledata WHERE Date = '$selected_date' && Service_Name = '$service_name'";
				
									$result = mysqli_query($link, $sql_1);
									
									$query_row_no = mysqli_num_rows($result);
									
									if($query_row_no >=1)
									{
										
										while($row_data = mysqli_fetch_assoc($result))
										{
											//$db_slots[] = $row_data;
											$db_slots[] = $row_data['Timing'];
											
										}
										
										
										//core sheduling logic 1.1
										
										$updated_array = array_diff($default_slot_array, $db_slots);
										
										$updated_array2 = array_values($updated_array);
										
										$updated_array_length = count($updated_array2);
										
										
									
										
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
														echo "<script>alert('No slot available today i.e. $booked_slot .')</script>";
														
														
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
	
					  <br />
					  <input type="submit" name="select_timings_schedule_slot" class="btn btn-success btn-md" value="Book slot ">
					  
				</form>
				
	</div>
	
	<div class="container">
	
		<div class="text-center">
		
			<img src="img/select_scheduled_slot.png" width="492px" height="343px"/>
		
		</div>
	
	</div>
  
  
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	
  </body>
</html>