<?php

require 'phpmailer/PHPMailerAutoload.php';
$result="";
var_dump($_POST);
	if(isset($_POST['submit'])){
        try{
            $mail = new PHPMailer;
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
            $mail->Username='chapagain.pujan@gmail.com';
            $mail->Password='fikkal2052';
            var_dump($mail);
            $mail->setFrom($_POST['email'],$_POST['name']);
            $mail->addAddress('chapagain.pujan@gmail.com');
            $mail->addReplyTo($_POST['email'],$_POST['name']);
            $mail->isHTML(true);
            $mail->Subject='Form Submission:'.$_POST['subject'];
            $mail->Body ='<h1 align=center>Name:'.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Message: '.$_POST['message'].'</h1>';
            if(!$mail->send()){
                $result="Something went wrong";
            }
            else{
                $result="Thanks ".$_POST['name']." For Contacting me. I'll get back to you soon!";
            }
        }
        catch(Exception $e){
            var_dump($e);
        }
		
	}else{
        echo "failed";    
    }
?>