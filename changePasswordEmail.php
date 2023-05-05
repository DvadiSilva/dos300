<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require("vendor/autoload.php");

    $mail= new PHPMailer();

    $mail-> isSMTP();

    $mail-> Host= "smtp.gmail.com";

    $mail-> SMTPAuth= true;

    $mail-> Username= "jornalinhoj@gmail.com";

    $mail-> Password= "zgkrlykxrhsobhym";

    $mail-> SMTPSecure= PHPMailer::ENCRYPTION_SMTPS;

    $mail-> Port= 465;
    
    $mail-> setFrom('jornalinhoj@gmail.com', 'Jornalinho');

    $mail-> addAddress($_SESSION["user"]["email"], $_SESSION["user"]["name"]);

    $mail-> isHTML(true);

    $mail-> Subject= "Mudança de password - Dos 300!¡";

    $mail-> Body= '
        <h1>Olá '.$_SESSION["user"]["name"].'</h1>
        <p>A sua palavra-passe no nosso site foi alterada, caso não o tenha feito contacte-nos o mais breve possível.<p>
        <p><b>A sua equipa Dos 300!¡</b></p>
    ';

    $mail-> CharSet= "UTF-8";

    $mail-> send();
?>