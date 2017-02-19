<?php

namespace Sms;

use Sms\SmsGateway;

class SmsGatewayClass {

    protected $username;
    protected $password;
    protected $deviceId;

    function __construct($username, $password, $deviceId)
    {

        $this->username = $username;
        $this->password = $password;
        $this->deviceId = $deviceId;

    }


    public function send($message='', $numbers=[])
    {


        //        include "smsGateway.php";
        $smsGateway = new SmsGateway($this->username, $this->password);

        //        $deviceID = 1;
        //        $numbers = ['+44771232343', '+44771232344'];
        //        $message = 'Hello World!';

        //        $options = [
        //            'send_at' => strtotime('+10 minutes'), // Send the message in 10 minutes
        //            'expires_at' => strtotime('+1 hour') // Cancel the message in 1 hour if the message is not yet sent
        //        ];
        //
        //Please note options is no required and can be left out


        $result = $smsGateway->sendMessageToManyNumbers($numbers, $message, $this->deviceId);


        return $result;

    }
    public function composeSmsHealth($visitorInfo, $inMateInfo, $diagnosis, $prescription)
    {

        $message = '';

        $visitorName = $visitorInfo[0]['visitorname'];
        $inMateName = $inMateInfo[0]['firstname'] . ' ' . $inMateInfo[0]['surname'];



         $message = 'Hi ' . $visitorName . ', ' . ' inmate ' . $inMateName . ' ' .
             ' has been diagnosis: ' . $diagnosis . ' and prescription: ' . $prescription;

        return $message;

    }
}