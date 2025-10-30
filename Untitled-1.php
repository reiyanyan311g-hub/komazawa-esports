<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "reiyanyan311g@gmail.com"; // ← 受信したいメールアドレス
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $headers = "From: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $full_message = "お名前: $name\n";
    $full_message .= "メールアドレス: $email\n";
    $full_message .= "件名: $subject\n\n";
    $full_message .= "内容:\n$message\n";

    if (mail($to, $subject ?: "お問い合わせ", $full_message, $headers)) {
        echo "<p>送信完了しました。ありがとうございました。</p>";
        echo '<p><a href="contact.html">戻る</a></p>';
    } else {
        echo "<p>送信に失敗しました。時間をおいて再度お試しください。</p>";
        echo '<p><a href="contact.html">戻る</a></p>';
    }
} else {
    header("Location: contact.html");
    exit();
}
?>