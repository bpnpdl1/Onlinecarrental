<?php
 require 'db.php';
 require 'functions.php';

 $name = request('name');
$email = request('email');
$message = request('message');

if (empty($name) || empty($email) || empty($message)) {
    setError('You must fill all the fields!');
    header("Location: contact.php");
    die;
}

if (!validateName($name)) {
    setError("Please provide Valid name.");
    header("Location: contact.php");
    die;
}

if(str_word_count($name)!=2){
    setError("FirstName and LastName is required.");
    header("Location: contact.php");
    die;
}

create('contact', compact('name', 'email', 'message'));

setSuccess('Message sent successfully!');
header("Location: contact.php");

?>