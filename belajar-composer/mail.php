<?php
require 'vendor/autoload.php';
use \Mailjet\Resources;


// Use your saved credentials, specify that you are using Send API v3.1

$mj = new \Mailjet\Client('290ccee36a1f00c950c53bb7fc7981c7', '36c78c777abe2d8b6d52a946af38678b',true,
        ['version' => 'v3.1']);

// Define your request body

$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "uptdifk24@gmail.com",
                'Name' => "IFK Balikpapan"
            ],
            'To' => [
                [
                    'Email' => "indrayogapermana@gmail.com",
                    'Name' => "Indra Yoga"
                ]
            ],
            'Subject' => "My first Mailjet Email!",
            'TextPart' => "Greetings from Mailjet!",
            'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href=\"https://www.mailjet.com/\">Mailjet</a>!</h3>
            <br />May the delivery force be with you!",
            'Attachments' => [
                [
                    'ContentType' => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                    'Filename' => "test.xlsx",
                    'Base64Content' => base64_encode(file_get_contents('test.xlsx'))
                ]
            ]
        ]
    ]
];

// All resources are located in the Resources class

$response = $mj->post(Resources::$Email, ['body' => $body],[
            'verify' => false,
            'timeout' => 3.14]);

// Read the response

$response->success() && var_dump($response->getData());
?>