<?php  

session_start();

$_SESSION['price'] = 10.00;
$_SESSION['type'] = 'PREMIUM';

echo "PRICE IS:".$_SESSION['price'];
echo "TYPE IS:".$_SESSION['type'];
?>