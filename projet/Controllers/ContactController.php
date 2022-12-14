<?php

namespace App\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\ContactModel;

class ContactController extends Controller {

    public function index(): void {
        $this->view('contact');
    }

    public function send(): void {
        // Include library files
        require 'phpmailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

// Create an instance; Pass true to enable exceptions
        $mail = new PHPMailer;

// Server settings
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output
        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username = 'projetsbouhouch@gmail.com';       // SMTP username
        $mail->Password = 'wxpuczvqtgkblkee';         // SMTP password
        $mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, ssl also accepted
        $mail->Port = 465;


// Sender info
        $mail->setFrom($_POST['email'], 'SenderName');
//$mail->addReplyTo('reply@example.com', 'SenderName');

// Add a recipient
        $mail->addAddress('recipient@example.com');

//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

// Set email format to HTML
        $mail->isHTML(true);

// Mail subject
        $mail->Subject = $_POST['objet'];

// Mail body content
        $bodyContent = $_POST['message'];
//$bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>CodexWorld</b></p>';
        $mail->Body    = $bodyContent;

// Send email
        if(!$mail->send()) {
            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
        } else {
            $this->view('home');
        }


        }



    public function message(): void{

        $message = new ContactModel();
        $list = $message->listMessage();
        $this->view('AdminMessages', array(
            'messages' => $list,
        ));

    }

}

