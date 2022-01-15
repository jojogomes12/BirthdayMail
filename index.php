<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

/* scipt to get detail of employee whose birthday is today */
$con=mysqli_connect('localhost','root','','mydb');
/* scipt to get detail of dados whose birthday is today */
//date_default_timezone_set('Asia/Kolkata');
date_default_timezone_set('America/Sao_Paulo');

$d=date('Y-m-d');

$q="SELECT   * From employee Where DATE_FORMAT(dob,'%m-%d')=DATE_FORMAT('$d','%m-%d')";
$r=mysqli_query($con,$q);

/* end */

$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'your email';                     //SMTP username
$mail->Password   = 'your pass';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
$mail->setFrom('your email', 'João Pedro Gomes');
          

$mail->isHTML(true);                                  // Set email format to HTML

$mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
);

$mail->Subject = 'Feliz Aniversario!!!';
while($row=mysqli_fetch_assoc($r)){
$mail->AddAddress($row['email'],$row['name']);
$mail->Body="<div style='background-image: url(https://th.bing.com/th/id/R.a9c8c32638ef82cb768f791b12d3a218?rik=tT7jZPd1UOgHxw&riu=http%3a%2f%2f1.bp.blogspot.com%2f-GjOHJP7Xrtw%2fUkXL_WYRqPI%2fAAAAAAAAI1U%2fK0lTSla30iw%2fw1200-h630-p-k-no-nu%2fmensagens-aniversario-frases-parabens.jpg&ehk=HDmDKOhFjoKUAU%2f8F03vHIfqBnULyXAbl2AmYLXbZW8%3d&risl=&pid=ImgRaw&r=0);
padding: 40px 0px;
color:#000000;
border: 5px solid #00D3FF;
background-repeat: no-repeat;
background-size: cover;'><center>
      <h1>Feliz Aniversario</h1>
      <h3>João Pedro Gomes</h3>
      <img src='https://besthqwallpapers.com/Uploads/12-1-2018/36979/thumb2-happy-birthday-4k-wall-e-birthday-cakes-candles.jpg' style='width:141px;height:121px;'>
      <p >Um feliz aniversario!!!! Que todos os seus sonhos se tornem verdade</p>
      <p>Feito por João Pedro Gomes </p>
    </center>
</div>";

$mail->send();
}
echo "Mensagem de Aniversario enviada!";







?>
