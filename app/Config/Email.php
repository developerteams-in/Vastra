<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'your-email@gmail.com';  // Your email address
    public string $fromName   = 'Your App Name';         // Name of your app or sender
    public string $recipients = '';                      // You can leave this empty if not required

    public string $userAgent = 'CodeIgniter';
    public string $protocol = 'smtp';                    // Use SMTP for sending emails

    public string $mailPath = '/usr/sbin/sendmail';
    public string $SMTPHost = 'smtp.gmail.com';         // Gmail SMTP server
    public string $SMTPUser = 'your-email@gmail.com';   // Your email (same as fromEmail)
    public string $SMTPPass = 'your-email-password';    // Your email password or App Password
    public int $SMTPPort = 587;                         // Gmail's SMTP port for TLS
    public int $SMTPTimeout = 5;
    public bool $SMTPKeepAlive = false;
    public string $SMTPCrypto = 'tls';                  // Use TLS for encryption
    public bool $wordWrap = true;
    public int $wrapChars = 76;
    public string $mailType = 'html';                   // Set to 'html' for HTML emails
    public string $charset = 'UTF-8';
    public bool $validate = true;
    public int $priority = 3;
    public string $CRLF = "\r\n";
    public string $newline = "\r\n";
    public bool $BCCBatchMode = false;
    public int $BCCBatchSize = 200;
    public bool $DSN = false;
}
