<?php
require_once "../db.php";


// multiple recipients
$to  = 'hamrocar@gmail.com'; // note the comma

// subject
$subject = 'Invoice';

// message
$message = '
    <p style="font-size:20px;margin-left:30%;color:#55BEC7;">Dear Hamro Car Rental</p>
    <p style="margin-left:30%"> Your Invoice, </p>
    <p style="margin-left:30%"> '. $user_name .' has cancelled the booking.</p>


    <table style="width:100%;display: flex;
justify-content: center;">

        <tbody>
            <tr>
                <td style="padding-bottom: 3%;">User Email:</td>
                <td style="padding-bottom: 3%;padding-left: 10%;">' . $user_email . '</td>
            </tr>
            <tr>
                <td style="padding-bottom: 3%;">Booking Status:</td>
                <td style="padding-bottom: 3%;padding-left: 10%;">Cancelled</td>
            </tr>
            <tr>
                <td style="padding-bottom: 3%;">Vehicle Name:</td>
                <td style="padding-bottom: 3%;padding-left: 10%;">' . $vehicle_name . '</td>
            </tr>
            <tr>
                <td style="padding-bottom: 3%;">Vehicle No. :</td>
                <td style="padding-bottom: 3%;padding-left: 10%;">' . $vehicle_no . '</td>
            </tr>
            <tr>
                <td style="padding-bottom: 3%;">Price per day:</td>
                <td style="padding-bottom: 3%;padding-left: 10%;">' . $vehicle_price . '</td>
            </tr>
            <tr>
            <td style="padding-bottom: 3%;">From:</td>
            <td style="padding-bottom: 3%;padding-left: 10%;">' . $from_date . '</td>
        </tr>
        <tr>
        <td style="padding-bottom: 3%;">To:</td>
        <td style="padding-bottom: 3%;padding-left: 10%;">' . $to_date . '</td>
    </tr>
        </tbody>
    </table>
    ';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// Additional headers
$headers .= "To: $to" . "\r\n";
$headers .= "From: $user_name <$user_email>" . "\r\n";


// Mail it
if (mail($to, $subject, $message, $headers)) {
    setSuccess("Email sent!!");
} else {
    setError('Email sent failed!');
}
