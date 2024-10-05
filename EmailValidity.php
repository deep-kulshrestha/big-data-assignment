<?php

set_time_limit(900);

// Function to check if an email is valid by syntax
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Function to validate the domain of an email
function isDomainValid($domain) {
    return checkdnsrr($domain, 'MX') || checkdnsrr($domain, 'A');
}

// Function to check if the email exists via SMTP
function doesEmailExist($email) {
    list($user, $domain) = explode('@', $email);
    
    // Check if the domain has valid MX records
    if (!isDomainValid($domain)) {
        return false;
    }

    // Set up a connection to the mail server
    $connect = @fsockopen($domain, 25, $errno, $errstr, 10);
    
    if (!$connect) {
        return false; // If connection fails, the domain may not be reachable
    }

    // Send SMTP commands to verify email existence
    $response = fgets($connect, 1024);
    fputs($connect, "HELO localhost\r\n");
    $response = fgets($connect, 1024);
    fputs($connect, "MAIL FROM:<test@$domain>\r\n");
    $response = fgets($connect, 1024);
    fputs($connect, "RCPT TO:<$email>\r\n");
    $response = fgets($connect, 1024);
    
    // Close the connection
    fputs($connect, "QUIT\r\n");
    fclose($connect);

    // If the server responds with a success code (250), the email likely exists
    return (strpos($response, '250') === 0);
}

// Input and output file paths
$inputFile = 'email_recipients.csv';
$outputFile = 'refined_emails.csv';

// Open the input CSV file for reading
if (($handle = fopen($inputFile, 'r')) !== false) {
    $validEmails = []; // Array to store valid emails

    // Read each row of the CSV file
    while (($data = fgetcsv($handle)) !== false) {
        foreach ($data as $email) {
            // Trim whitespace and validate email
            $email = trim($email);
            if (isValidEmail($email) && doesEmailExist($email)) {
                $validEmails[] = $email; // Add valid email to the array
            }
        }
    }
    fclose($handle); // Close the input file

    // Open the output CSV file for writing
    if (($handle = fopen($outputFile, 'w')) !== false) {
        // Write valid emails to the output file
        foreach ($validEmails as $validEmail) {
            fputcsv($handle, [$validEmail]);
        }
        fclose($handle); // Close the output file
        echo "Valid emails have been written to $outputFile.\n";
    } else {
        echo "Error: Unable to open $outputFile for writing.\n";
    }
} else {
    echo "Error: Unable to open $inputFile for reading.\n";
}
?>
