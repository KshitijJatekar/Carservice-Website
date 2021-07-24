<?php
ob_start(); 
$user_name="";
$user_email="";
$currentdate="";
$selected_timing="";

$user_name = $_GET['user_name'];
$user_email= $_GET['user_email'];
$currentdate = $_GET['only_date'];
$selected_timing = $_GET['selected_timing'];
$price = $_GET['cost'];
$service_name = $_GET['service_name'];

//echo $user_email , $user_email, $currentdate, $selected_timing;





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
	
			<h2 style="font-weight:lighter; color:green;">Congratulations <?php echo $user_name; ?> !</h2>
			<h4 style="font-weight:lighter; color:green;">Your slot has confirmed. We've sent mail for confirmation of booking slot. Please check in spam or inbox. </h4>
			
			<br />
			<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModalLong">
						 See details
						</button>
						
						<!-- Modal -->
								<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Slot confirmation details</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
										
											<h4 style="font-weight:lighter;">Name :					<?php echo $user_name;?> </h4>
											<h4 style="font-weight:lighter;">Email :				<?php echo $user_email;?> </h4>
											<h4 style="font-weight:lighter;">Date of confirmation : <?php echo $currentdate;?> </h4>
											<h4 style="font-weight:lighter;">Selected time slot : <?php echo $selected_timing;?> </h4>
											<h4 style="font-weight:lighter;">Service name : <?php echo $service_name;?> </h4>
											<h4 style="font-weight:lighter;color:green;">Total price  : <?php echo $price;?> </h4>
											
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									
									  </div>
									</div>
								  </div>
								</div>
								
								
								
								
					
		</div>
		
		
  
	</div>	
	<br />
	<div class="container">
	
	<?php
								
									$result="";
								
								
									
									require 'phpmailer/PHPMailerAutoload.php';
									$mail = new PHPMailer;
									$mail -> Host='smtp.gmail.com';
									$mail -> Port=587;
									$mail -> SMTPAuth=true;
									$mail -> SMTPSecure='tls';
									$mail -> Username='host@gmail.com';  //owner email
									$mail -> Password='host@123';		//owner password
									$mail -> setFrom('sender email');	//host email address
									$mail -> addAddress($user_email);	//clients email address 
							
									$mail -> isHTML(true);
								
									$mail -> Body='<h3>Name :'.$user_name.'<br> Email : '.$user_email.'<br>Service Name: '.$service_name.'<br>Date of service: '.$currentdate.'<br>Selected time slot:'.$selected_timing.'<br>Quantity : '.$price.'</h1>';

									if($mail ->send()){
										//$result="something went wrong";
										Echo"<div class='alert alert-success' role='alert'>Confirmation email sent.</div>";
											//
										//
										//header('location:success.php');
										
										
									}
									else{
									//	$result="thanks ".$_POST['name']." for contacting us.";
										Echo" <div class='alert alert-danger' role='alert'>Something went wrong please try again later</div>";
											
									
										//header('location:fail.php');
									
									}
									
										
									
								
								
		?>
	
	</div>
	<br />
	
	<div class="container">
	
		<div class="text-center">
		
			<img src="img/yes.png" width="288.75" height="252.25"/>
		
		</div>
	
	</div>
  
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	
  </body>
</html>