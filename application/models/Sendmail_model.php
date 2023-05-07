<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SendMail_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('PhpMailer_Lib');
    }

    function send_mail21($sender_email, $username, $receiver_email, $subject, $msg) {
        // $mail = new PHPMailer();
        $mail = $this->phpmailer_lib->load();
        $mail->SMTPDebug = 2;    
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host = "cognita.cymru";      // mail.52wkends.com setting GMail as our SMTP server
        // $mail->Host = "linux3.gipcloudlinux.com";      // mail.52wkends.com setting GMail as our SMTP server
        $mail->Port = 465;                   //25 SMTP port to connect to GMail
        $mail->Username = "donotreply@cognita.cymru";  // user email address
        // $mail->Username = "admin@trading.moogli.in";  // user email address
        $mail->Password = "Auto1-ABC";            // password in GMail       
        // $mail->Password = "Augurs@9848";            // password in GMail      
        
        
        $mail->SetFrom($sender_email, 'donotreply@cognita.cymru');  //Who is sending the email	
        // $mail->AddReplyTo($sender_email, 'donotreply@cognita.cymru');  //email address that receives the response
        $body = $msg;
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AltBody = "Plain text message";
        // echo "hellob $receiver_email";
        // die;
        $emails = explode(",", $receiver_email);
        foreach ($emails as $key => $value) {
            $mail->AddAddress(trim($value));
        }
        // $mail->AddAddress($receiver_email, $username);
        //$mail->addbCC('khalidhashmi13@gmail.com');
        if (!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
            die;
        } else {
            return TRUE;
        }
    }
    public function send_mail2($sender_email, $username, $receiver_email, $subject, $msg) {
        $mail = $this->phpmailer_lib->load();
		// echo "<pre>";print_r($mail);die;
        $mail->SMTPDebug = 0;                                 
        $mail->isSMTP();
        $mail->SMTPAuth = false;
        $mail->SMTPSecure = "ssl";  
        $mail->Host = "mail.moogli.in";      
        $mail->Port = 465;                   
        $mail->Username = "marine@moogli.in";  
        $mail->Password = "Temp@123";            
        $mail->SetFrom($sender_email, 'donotreply@cognita.cymru');  
        // $mail->AddReplyTo($sender_email, 'Mail Reply');  
        // $mail->addAddress('sarita@augurs.in', 'Sarita Gupta');
        $body = $msg;
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AltBody = "Plain text message";
        $emails = explode(",", $receiver_email);
        foreach ($emails as $key => $value) {
            $mail->AddAddress(trim($value));
        }
        if (!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
            die;
        } else {
            return TRUE;
        }
    }
}
