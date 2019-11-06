<?php
    


$headers = "From: arditcaravella1@gmail.com"."\r\n"."Reply-To:arditcaravella1@gmail.com"."\r\n"."X-Mailer: PHP/".phpversion()."\r\n";

$message = "-- Test message";

mail('arditcaravella1@gmail.com','arditcaravella1@gmail.com has sent you a message',$message,$headers);

echo "Mail sent successfully";
?>