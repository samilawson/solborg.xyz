<!DOCTYPE html>
<html>
    <head>
        <title>Contact Form Submission</title>
        <style>
            body {
                font-family: sans-serif;
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <?php
        if ($_POST["name"] != null) {
            $website = $_POST["website"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $message = wordwrap($_POST["message"], 70);

            $to = $_POST["to"];
            $subject = "Contact Form Submission";
            $fullmessage = "
            <html>
            <head>
            <title>HTML Email</title>
            <style>
            body {font-family: sans-serif; font-size: 18px;}
            </style>
            </head>
            <body>
            <h2>Contact Form Submission From $website</h2>
            <h3>Name:</h3>
            $name
            <h3>Email:</h3>
            $email
            <h3>Message:</h3>
            $message
            </body>
            </html>
            ";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: noreply@solborg.xyz" . "\r\n";

            mail($to, $subject, $fullmessage, $headers);
            echo "Your message has been sent. You may close this tab.";
        }
        ?>
    </body>
</html>