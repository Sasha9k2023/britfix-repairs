<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Проверка на наличие всех обязательных данных
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        // Укажите ваш email для получения сообщения
        $to = 'your-email@example.com';
        
        // Заголовки email
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        // Сообщение
        $message_body = "<h3>Contact Form Submission</h3>";
        $message_body .= "<p><strong>Name:</strong> $name</p>";
        $message_body .= "<p><strong>Email:</strong> $email</p>";
        $message_body .= "<p><strong>Subject:</strong> $subject</p>";
        $message_body .= "<p><strong>Message:</strong><br>$message</p>";

        // Отправка email
        if (mail($to, $subject, $message_body, $headers)) {
            echo "<script>alert('Your message has been sent successfully!');</script>";
        } else {
            echo "<script>alert('There was a problem sending your message.');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields.');</script>";
    }
}
?>