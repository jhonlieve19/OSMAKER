<?php  

session_start();

$_SESSION['price'] = 5.00;
$_SESSION['type'] = 'REGULAR';

echo "PRICE IS:".$_SESSION['price'];
echo "TYPE IS:".$_SESSION['type'];

?>