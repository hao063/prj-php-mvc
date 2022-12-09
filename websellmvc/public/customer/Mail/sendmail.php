<?php 
include "./public/customer/Mail/PHPMailer/src/PHPMailer.php";
include "./public/customer/Mail/PHPMailer/src/Exception.php";
include "./public/customer/Mail/PHPMailer/src/OAuth.php";
include "./public/customer/Mail/PHPMailer/src/POP3.php";
include "./public/customer/Mail/PHPMailer/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class Mailer{
    public function confirmEmail($email, $token, $username) {
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'viphao0603@gmail.com';                 // SMTP username
            $mail->Password = 'mhcjhqytmtvwuvhe';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
         
            $mail->setFrom('viphao0603@gmail.com', 'Xác Nhận HPRO');
            $mail->addAddress($email, $username);     // Add a recipient
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Mã xác nhận email';
            $mail->Body    = $token;
            $result = $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}


?>