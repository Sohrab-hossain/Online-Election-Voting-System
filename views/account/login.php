<?php
$html->formBegin();
$html->textField("email",$email,$eemail);
$html->textField("nidNumber",$nidNumber,$enidNumber);
$html->passwordField("password",$password,$epassword);
$html->submitField("btnLogin", "Login");
$html->formEnd();
?>