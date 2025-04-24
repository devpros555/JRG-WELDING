<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "welding2");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Save message in the database
    $stmt = $conn->prepare("INSERT INTO messages (name, phone, email, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $email, $message);

    if ($stmt->execute()) {
        // Email recipient (change to your client's email)
        $to = "raul.garcia.1627.com"; // Replace with the actual email
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nPhone: $phone\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email\r\nReply-To: $email\r\n";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "Message saved and email sent successfully!";
        } else {
            echo "Message saved, but email sending failed.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
