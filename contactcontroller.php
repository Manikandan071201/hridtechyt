<?php

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	
	$subject=$_POST['subject'];
	$messages=$_POST['messages'];


	$to='info@careerbridgecouncil.com';
	$subject='Contact Form Submission -   ' .$subject;
	$message="Name: ".$name."\n"."Email: ".$email."\n"."Subject: ".$subject."\n"."Message: ".$messages;
	$headers="From: ".$email;

	if(mail($to, $subject, $message, $headers)){

		 echo "<script> alert('Sent Successfully!".". $name  "," , We will contact you soon'); 
        window.location.href='contact.html';
        </script>";
		// echo"<h1>Sent Successfully!".". $username","We will contact you soon</h1>";
	}
	
	else{
		echo"<script> alert('Something went wrong.. Please try again later..'); 
        window.location.href='contact.html';
        </script>";
	}
}
?>