<?php
namespace Acme\Email;

/**
 * SendEmail
 */
class SendEmail
{
    public static function sendEmail($to, $subject, $bodymessage, $from = "", $contentType="text/html")
    {
        if (strlen($from)==0)
            $from = getenv('SMTP_FROM');
        // Create the Transport
        $transport = (new \Swift_SmtpTransport(getenv('SMTP_HOST'), getenv('SMTP_PORT')))
            ->setUsername(getenv('SMTP_USER'))
            ->setPassword(getenv('SMTP_PASS'))
          ;

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message($subject))
            ->setFrom($from)
            ->setTo($to)
            ->setBody($bodymessage, $contentType);

        // Send the message
        $result = $mailer->send($message);
    }
}
