<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $company = htmlspecialchars(trim($_POST['company']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $service = htmlspecialchars(trim($_POST['Service']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Email details
    $to = "contactus@connectware.in"; // Replace with your email address
    $subject = "Website Contact Form";
    $body = "Name: $name\nCompany: $company\nEmail: $email\nPhone: $phone\nService: $service\nMessage:\n$message";
    $headers = "From: $name <$email>\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Your message has been sent. Thank you!";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request method.";
}
?>