<?php
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    $email_send = $_GET['mail'];
    $content = $_GET['content'];

  

      
    //Define name spaces
      
    //Create instance of PHPMailer
      $mail = new PHPMailer();
    //Set mailer to use smtp
      $mail->isSMTP();
    //Define smtp host
      $mail->Host = "smtp.gmail.com";
    //Enable smtp authentication
      $mail->SMTPAuth = true;
    //Set smtp encryption type (ssl/tls)
      $mail->SMTPSecure = "tls";
    //Port to connect smtp
      $mail->Port = "587";
    //Set gmail username
      $mail->Username = "huynhvangiang0504@gmail.com";
    //Set gmail password
      $mail->Password = "cfmykgtxmkqmeoki";
    //Email subject
      $mail->Subject = "Test email using PHPMailer";
    //Set sender email
      $mail->setFrom('huynhvangiang0504@gmail.com');
    //Enable HTML
      $mail->isHTML(true);
    //Attachment
      // $mail->addAttachment('img/attachment.png');
    //Email body
      $mail->Body = $content;
    //Add recipient
      $mail->addAddress($email_send);
    //Finally send email
      // if ( $mail->send() ) {
      //   echo "Email Sent..!";
      // }else{
      //   echo "Message could not be sent. Mailer Error: ";
      // }
    //Closing smtp connection
      $mail->smtpClose();
    
?>  