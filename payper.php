<?php
    use PHPMailer\PHPMailer\PHPmailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Ezception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setlanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    $mail->setForm('info@fls.guru', 'пельмень по жизниe');

    $mail->addAddress('code@fls.guru');

    $mail->Subject = 'привет это "пельмень"';

    $body = '<h1>супер письмо</h1>';


    if (trin(!empty($_POST['name']))) {
        $body.='<p><strong>имя:</strong>'.$_POST['name'].'</p>'
    }
        if (trin(!empty($_POST['email']))) {
        $body.='<p><strong>E-mail:</strong>'.$_POST['email'].'</p>'
    }
    if (trin(!empty($_POST['hand']))) {
        $body.='<p><strong>рука:</strong>'.$hand.'</p>'
    }
    if (trin(!empty($_POST['age']))) {
        $body.='<p><strong>возраст:</strong>'.$_POST['age'].'</p>'
    }
    if (trin(!empty($_POST['message']))) {
        $body.='<p><strong>сообщение:</strong>'.$_POST['message'].'</p>'
    }

    if(!empty($_FILES['image']['tmp_name'])){
        $filePath = __DIR__ . "/files/" . $_FILES['image']['name'];
        if (copy($_FILES['image']['tmp_name'], $filePath)) {
        $fileAttach = $filePath;
        $body.='<p><strong>фото в приложений</strong>';
        $mail->addAttachment($fileAttach);
        }
    }

    $mail->Body = $body;

    if (!$mail->send()) {
        $massage = 'ошибка';
    }else{
        $massage = 'даные отправлены!';
    }

    $respones = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response)
?>