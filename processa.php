<?php 

header("Content-type: application/json; charset=utf-8");

include 'db.php';


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'Composer/vendor/autoload.php';


$nome = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
$mensagem = filter_input(INPUT_POST, 'mensagem',FILTER_SANITIZE_STRING);
$datahora = date('Y-m-d h:i:s');

//echo 'nome '.$nome."</br>";
//echo 'email '.$email."</br>";
//echo 'mensagem '.$mensagem. "</br>";

//$result = "INSERT INTO entrada (nome, email, mensagem, Enviado) VALUES ('$nome','$email','$mensagem',now())";
$result = "INSERT INTO entrada (nome, email, mensagem, Enviado) VALUES ('$nome','$email','$mensagem','$datahora')";

$resultado_mensagem = mysqli_query($conexao, $result) or die('{"success":false}');

echo '{
	"success":true
}';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'tsalescalabria@gmail.com';                     // SMTP username
    $mail->Password   = '61636567';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('tsalescalabria@gmail.com', 'THIAGO');
    $mail->addAddress('tsalescalabria@thiagocalabria.com');     // Add a recipient
    $mail->addAddress('tsalescalabria@gmail.com');               // Name is optional
    $mail->addAddress('thiago.calabria@holosmedia.com.br');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $nome ." enviou pelo site: ";
    $mail->Body    = $email.'<br>'.$mensagem;
    $mail->AltBody = 'teste 2sem html';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>