<?php
//register
include 'Connection.php';


                    $to = "jhonlieve1997@gmail.com";
                    $subject = "Activation of Friends Login";
                    $message=" <p>YOUR PASSWORD IS password123</p>
                                <p>password123123</p>";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= 'From: <noreply@activation.com' . "\r\n";
                    $headers .= 'Cc: myboss@example.com' . "\r\n";

                    mail($to, $subject, $message, $headers);

?>
