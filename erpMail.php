<?php

set_time_limit(300); 
// Include PHPMailer's classes using a relative path
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
require 'PHPMailer/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer setup
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.outlook.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true;
    $mail->Username = 'info@schnellabs.com'; // SMTP username
    $mail->Password = 'K%061004599138om'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port = 587; // TCP port to connect to

// Recipients
$mail->setFrom('info@schnellabs.com', 'Schnell Labs Notification'); // Replace with your sender email


    // Set email format to HTML
    $mail->isHTML(true);
    
    // Load recipient emails from CSV
    $emailRecipients = array_map('str_getcsv', file('email_recipients.csv')); // CSV file with email addresses

    // Set email subject and message body
    $emailSubject = "Drive Your Digital Transformation with ERPNext Tailored Just for You!";
    $emailMessage = "
    <!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Email Template</title>
  <style type='text/css'>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }
    table {
      border-spacing: 0;
      width: 100%;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      border: 1px solid #e0e0e0;
    }
    .header {
      background-image: url('https://w7.pngwing.com/pngs/812/224/png-transparent-enterprise-resource-planning-technology-management-business-computer-software-organization-electronics-company-text-thumbnail.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-color: #004275;
      padding: 10px;
      color: #ff761b;
      text-align: left;
      position: relative;
      height: 200px;
    }
    /* Resize the logo and position it in the top-left corner */
    .header img {
      width: 150px; /* Adjust size as needed */
      height: auto;
      position: absolute;
      top: 1px;
      left: 10px;
    }
    .header h1 {
      font-family: Arial, sans-serif;
      font-size: 30px;
      margin: 0;
      opacity: 5.5;
      font-weight: bold;
      opacity: 0.85; /* Fade the title */
    }
    .contact-info {
      background-color: #004275;
      color: #ffffff;
      text-align: center;
      padding: 10px 0;
    }
    .contact-info a {
      color: #ffffff;
      text-decoration: none;
      margin: 0 10px;
      display: inline-block;
    }
    .contact-info a img {
      width: 20px; /* Resize WhatsApp icon */
      height: 20px;
      vertical-align: middle;
      margin-right: 5px;
    }
    .hero {
      text-align: center;
      padding: 20px;
      color: #ff761b;
    }
    .hero img {
      width: 100%;
      max-width: 100px; /* Resize ERPNext logo */
      height: auto;
    }
    .content {
      padding: 20px;
    }
    .content h2 {
      color: #004275;
      font-size: 20px;
      margin-top: 0;
    }
    .content p {
      color: #333;
      line-height: 1.6;
    }
    .cta {
      text-align: center;
      padding: 20px;
    }
    .cta a {
      background-color: #004275;
      color: #ffffff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 4px;
      font-size: 16px;
    }
    .list-items {
      margin: 20px 0;
      padding: 0 20px;
    }
    .list-items ul {
      padding: 0;
      list-style-type: none;
    }
    .list-items ul li {
      padding: 5px 0;
    }
    .list-items ul li span {
      color: #004275;
      font-weight: bold;
    }
    .footer {
      background-color: #f4f4f4;
      padding: 20px;
      text-align: center;
      font-size: 12px;
      color: #999;
    }
    .footer a {
      color: #004275;
      text-decoration: none;
    }
    .social-icons {
      margin-top: 10px;
    }
    .social-icons img {
      margin: 0 5px;
      width: 24px; /* Resize social icons */
      height: 24px;
    }
    /* Responsive styles */
    @media screen and (max-width: 768px) {
      .container {
        width: 100%;
      }
      .cta a {
        display: block;
        margin-bottom: 10px;
      }
    }
  </style>
</head>
<body>
  <table class='container'>
    <tr>
      <td>
        <table class='header img' width='100%'>
          <tr>
            <td>
              <img src='https://www.schnellabs.com/images/logo.png' alt='Schnell Labs Logo'>
            </td>
          </tr>
        </table>

        <table class='contact-info' width='100%'>
          <tr>
            <td>
              <a href='tel:+37120030129'><img src='https://uxwing.com/wp-content/themes/uxwing/download/communication-chat-call/calling-icon.png' alt='Contact'> +371 2 0030129</a>
              <a href='https://wa.me/919711207317'><img src='https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/wa-whatsapp-icon.png' alt='Whatsapp'> +91 9711207317</a>
              <a href='https://www.schnellabs.com'>www.schnellabs.com</a>
            </td>
          </tr>
        </table>

        <table class='hero' width='100%'>
          <tr>
            <td>
                <h1>Now Give Your Business a Better Shape at Amazing Prices with ERPNext Tailored Just for You!</h1>
            </td>
          </tr>
        </table>

        <table class='content' width='100%'>
          <tr>
            <td>
              <h2>Hello!</h2>
              <p><strong>Are you struggling with complex business operations and multiple applications?</strong></p>
              <p><strong>Are you still using Spreadsheets for your day-to-day operations?</strong></p>
              <p>We understand the challenges and complexities businesses face in today’s fast-paced digital landscape, which is why we’re thrilled to introduce our <strong>ERPNext implementation services at Schnell Labs</strong> — a modern, scalable, and comprehensive ERP solution designed to streamline your operations.</p>
              <p>At Schnell Labs, we specialize in helping businesses thrive by tailoring ERPNext to meet your specific needs, whether you operate in manufacturing, retail, distribution, healthcare, education, or the public sector. Our goal is to allow you to focus on your core activities while we handle the intricacies of ERP system configuration and implementation.</p>
            </td>
          </tr>
        </table>

        <table class='cta' width='100%'>
          <tr>
            <td>
              <a href='mailto:info@schnellabs.com'>Email Us</a>
            </td>
          </tr>
        </table>

        <table class='list-items' width='100%'>
          <tr>
            <td>
              <ul>
                <li><span>Business Consulting:</span> We help identify key opportunities and align ERPNext with your business goals.</li>
                <li><span>ERPNext Implementation & Configuration:</span> Quick and seamless setup tailored to your operations.</li>
                <li><span>Customization & Localization:</span> We fully personalize the system to suit your unique workflows.</li>
                <li><span>System Upgrades & API Integration:</span> Stay ahead with the latest technology.</li>
                <li><span>Data Migration, Backup & Security:</span> We ensure smooth transitions with no downtime, safeguarding your data.</li>
                <li><span>User Training & Ongoing Support:</span> We empower your team through training and provide continuous support.</li>
              </ul>
            </td>
          </tr>
        </table>

        <table class='cta' width='100%'>
          <tr>
            <td>
              <a href='https://www.schnellabs.com/contact'>Ready to elevate your business operations with ERPNext?</a>
            </td>
          </tr>
        </table>

        <table class='footer' width='100%'>
          <tr>
            <td>
              <p>Follow us on</p>
              <div class='social-icons'>
                <a href='https://www.linkedin.com/company/schnell-labs'><img src='https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/linkedin-app-icon.png' alt='LinkedIn'></a>
              </div>
              <p>&copy; 2024 Schnell Labs. All Rights Reserved.</p>
              <p><a href='#'>Unsubscribe</a> | <a href='#'>Manage Preferences</a></p>
            </td>
          </tr>
        </table>

      </td>
    </tr>
  </table>
</body>
</html>
";

    $mail->Subject = $emailSubject;
    $mail->Body = $emailMessage;

    // Send email to each recipient from CSV
    foreach ($emailRecipients as $recipient) {
        if (!empty($recipient[0])) {
            $mail->clearAddresses(); // Clear previous recipients
            $mail->addAddress($recipient[0]); // Add new recipient from CSV

            try {
                $mail->send();
                echo "Alert email sent successfully to {$recipient[0]}.\n";
            } catch (Exception $e) {
                echo "Mailer Error for {$recipient[0]}: {$mail->ErrorInfo}\n";
            }
        }
    }

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}\n";
}

?>
