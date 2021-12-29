<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'AC2dd017a03f5eebfba2b1ca2a4951cb1e';
$auth_token = '8b65c4992df89d4dc4967945b26c50a6';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+12674294530";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+24174416546',
    array(
        'from' => $twilio_number,
        'body' => 'I sent this message in under 10 minutes!'
    )
);
