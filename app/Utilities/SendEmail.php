<?php
namespace App\Utilities;

class SendEmail {
    private $name;
    private $email;
    private $message;
    private $to;
    private $subject;
    private $headers;

    public function __construct ($namePar, $emailPar, $messagePar, $toPar, $subjectPar)
    {
        if(isset($namePar)){
            $this->name = $namePar;
        } else {
            $this->name = "";
        }

        if(isset($emailPar)){
            $this->email = $emailPar;
        } else {
            $this->email = "";
        }

        if(isset($messagePar)){
            $this->message = $messagePar;
        } else {
            $this->message = "";
        }

        if(isset($toPar)){
            $this->to = $toPar;
        } else {
            $this->to = "faruqem@yahoo.com";
        }

        if(isset($subjectPar)){
            $this->subject = $subjectPar;
        } else {
            $this->subject = "Message from Developer Best Friends Site User";
        }
    }

    public function send() {
        //Set the body
        $body = "User Name: " . $this->name . "<br>" . "User Email: " . $this->email . "<br>" . "Message: " . $this->message;

        //Set the headers
        $this->headers =  "MIME-Version: 1.0" . "\r\n";
        $this->headers .= "From: <faruqe@gmail.com>" . "\r\n";
        $this->headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        //return 'Your message has been sent successfully. We will be in touch soon.';

        $confMsg="";

        if (mail ($this->to, $this->subject, $body, $this->headers)) {
	        $confMsg='Your message has been sent successfully. We will be in touch soon.';
        } else {
	        $congMsg='Sorry we could not send your message. Please, try again soon';
        }

        return $confMsg;
    } //End of send() function
}
