<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phone"]);
    $password = trim($_POST["password"]);
    $city = trim($_POST["city"]);

    if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($phone) OR empty($city) ) {
        http_response_code(400);
        echo "There was a problem with your submission (400). Please try again";
        exit;
    }

    try {
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'testbohdan577@gmail.com';
        $mail->Password   = 'wdmq tvjv kcxc pjil';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('testbohdan577@gmail.com', 'Mailer');
        $mail->addAddress($email, $name);

        $mail->isHTML(true);
        $mail->Subject = 'Hello Tester';
        $mail->Body    = "Name: $name<br>Email: $email<br>Phone: $phone<br>Password: Not send because of security! Use password recovery links or password generate logic instead.<br>City: $city";

        $mail->send();
        http_response_code(200);
        echo "Thank You! Your message has been sent";
    } catch (Exception $e) {
        http_response_code(500);
        echo "Something went wrong and we couldn't send your message (500). Mailer error: {$mail->ErrorInfo}";
    }

} else {
    http_response_code(403);
    echo "There was a problem with your submission (403). Pplease try again";
}
?>
