<?php
namespace App\Utilities;

class SendEmail {
    private $name;
    private $email;
    private $message;
    private $from;
    private $to;
    private $subject;
    private $headers;

    public function __construct ($namePar, $emailPar, $messagePar, $fromPar, $toPar, $subjectPar)
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

        if(isset($fromPar)){
            $this->from = $fromPar;
        } else {
            $this->from = "Developer Best Friends Site";
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
        $this->headers =  'MIME-Version: 1.0' . "\r\n";
        $this->headers .= 'From: Mo Faruqe <faruqem@yahoo.com>' . "\r\n";
        $this->headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        return 'Your message has been sent successfully. We will be in touch soon.';
        if (mail ($this->to, $this->subject, $this->message, $this->from, $this->headers)) {
	        $confMsg='Your message has been sent successfully. We will be in touch soon.';
        } else {
	        $congMsg='Sorry we could not send your message. Please, try again soon';
        }

        return $confMsg;
    } //End of send() function
}
