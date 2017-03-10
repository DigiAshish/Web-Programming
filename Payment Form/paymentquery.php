<?php
	session_start();
	$_POST['NameOnCard'];
    $name = $_POST['NameOnCard'];
    $date = $_POST['CCExpiresYear'];
    $cvv = $_POST['SecurityCode'];
    $zip = $_POST['ZIPCode'];
    $hostname="localhost";
	$database="digiashi_CarRental";
	$username="digiashi_root";
	$password="digiashi_root";
	$conn = mysqli_connect($hostname, $username, $password,$database);
	if (!$conn)
	{
		die("Connection failed: ".mysqli_connect_error());
	}	
	
	 $sqlUpdateBooking="UPDATE cr_booking SET booking_status='Successful' where booking_id='".$_SESSION['booking_id']."'";
	$resultUpdateBooking = $conn->query($sqlUpdateBooking);
		
	  $sqlBooking = "INSERT INTO `cr_payment`( `booking_id`, `payment_start_time`, `payment_end_time`, `price`, `payment_status`) VALUES ('".$_SESSION['booking_id']."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','".$_SESSION['cost']."','Successful')";
	 $result = $conn->query($sqlBooking);
	  

	
	
  
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Rent Wheels</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
    </script>
</head>
<body>
<div class="header-bg">
	<div class="wrap"> 
				<div class="h-bg">
					<div class="total">
						<div class="header">
							<div class="clear"></div>
								<div class="header-bot">
						<div class="logo">
							<a href="index.php"><img src="images/logo.png" alt="Rent Wheels" /></a>
						</div>
						<div class="cart">
					    	<ul class="ph-no">
								<li class="item  first_item">
									<div class="item_html">
										<span class="text1">Wheels on the go!</span>
									</div>
								</li>
							</ul>
							<?php 
							if($_SESSION['user_id']!=null)
							{
							echo "<div class=myaccount>
		   	   					<span><a href=myaccount.php>MY ACCOUNT</a></span>
		   					</div>";
							}
							?>
				    		
				    		
						</div>					
						<div class="clear"></div>
												
					</div>
			</div>			
	<div class="content-bottom">
		<div class="about-top-pagination"> 
									<ul>
										<li><a href="index.php">Home |</a></li>
										
									</ul>
								</div>
	
			<div class="ourteam">
				<h3 class="successfulbooking">YAY!! Booking Successful!!! Have a Safe Trip!!</h3>
			 
		 </div>
	</div>
	<div class="footer">
		<div class="section group">
				<div class="col_1_of_4 span_1_of_4">
					<h3>INFORMATION</h3>
					<ul>
						<li><a href="#">About us</a></li>
						<li><a href="#">Sitemap</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms and conditions</a></li>
						<li><a href="#">Legal Notice</a></li>
					</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>OUR OFFERS</h3>
					<ul>
						<li><a href="#">New products</a></li>
						<li><a href="#">top sellers</a></li>
						<li><a href="#">Specials</a></li>
						<li><a href="#">Products</a></li>
						<li><a href="#">Comments</a></li>
					</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>YOUR ACCOUNT</h3>
					<ul>
						<li><a href="#">Your Account</a></li>
						<li><a href="#">Personal info</a></li>
						<li><a href="#">Prices</a></li>
						<li><a href="#">Address</a></li>
						<li><a href="#">Locations</a></li>
					</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4 footer-lastgrid">
					<h3>Get in touch</h3>
					<ul>
						<li><a href="#"><img src="images/facebook.png" title="facebook"></a></li>
						<li><a href="#"><img src="images/twitter.png" title="Twiiter"></a></li>
						<li><a href="#"><img src="images/rss.png" title="Rss"></a></li>
						<li><a href="#"><img src="images/gpluse.png" title="Google+"></a></li>
					</ul>
					<p>Design by <a href="#">Rent Wheels</a></p>
				</div>
				<div class="clear"></div> 
		</div>
	</div>
   </div>
</div>
</div>
</div>
</body>
</html>

    	
    	
            