<?php

trait Notifiable {
    public function notify($message)
    {
        echo $message;
    }
}

class SMS 
{
use Notifiable;
}

class Email 
{
    use Notifiable;
}

class PushNotification
{
    use Notifiable;
}

$sms = new SMS();

$sms->notify("We are doing a promo, dial *2435*34# to stand a chance to win a new car.");
echo "<br>";


$email = new Email();

$email->notify("Thank you for shopping with us.");

echo "<br>";

$pushnotification = new PushNotification();

$pushnotification->notify("Congratulations, you have won a brand new Benz.");



