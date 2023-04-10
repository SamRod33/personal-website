<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Email Procssing - Samuel Rodriguez</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8" />
<link rel="icon" type="image/x-icon" href="/src/man.svg">
</head>

<body>
    <main>
        <?php
            session_start();
            function validEmail($str) {
                $injections = array('(\n+)',
                    '(\r+)',
                    '(\t+)',
                    '(%0A+)',
                    '(%0D+)',
                    '(%08+)',
                    '(%09+)'
                    );
                        
                $inject = join('|', $injections);
                $inject = "/$inject/i";
                
                if(preg_match($inject,$str)) {
                    return true;
                } else {
                    return false;
                }
            }

            if($_POST['formSubmit'] == "Submit") 
            {
                $errorMessage = "";

                if(empty($_POST['name'])) {
                    $errorMessage .= "<li>You forgot to enter your name!</li>";
                }
                if(empty($_POST['subject'])) {
                    $errorMessage .= "<li>You forgot to enter a subject!</li>";
                }
                if (validEmail($_POST['email'])) {
                    $errorMessage .= "<li>Your email is invalid!</li>";
                }

                if(!empty($errorMessage)) {
                    echo("<p>There was an error with your form:</p>\n");
                    echo("<ul>" . $errorMessage . "</ul>\n");
                } else {
                    $name = $_POST['name'];
                    $subject = $_POST['subject'];
                    $visitorEmail = $_POST['email'];
                    $myEmail = "sam@thesamrodriguez.com";
                    $headers = "From: $myEmail \r\n";
                    $headers .= "Reply-To: $visitorEmail \r\n";
                    $headers .= "Cc: $visitorEmail \r\n";
                    $msg = $_POST['msg'];
                    $fs = fopen("emails.csv", "a");
                    fwrite($fs, $name . ", " . $subject . ", " . $visitorEmail . ", " . $msg . "\n");
                    fclose($fs);
                    mail($myEmail, $subject, $msg, $headers);
                    $_SESSION['name'] = $name;
                    $_SESSION['subject'] = $subject;
                    $_SESSION['visitorEmail'] = $visitorEmail;
                    $_SESSION['msg'] = $msg;
                    echo("Success!");
                    header("Location: email-form-confirmation.php");
                    exit;
                }
            }
        ?>
    </main>
</body>
</html>