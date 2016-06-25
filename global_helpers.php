<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if ( ! function_exists('getDB')) {
    function getDB() {
        return new MysqliDb(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    }
}

if ( !function_exists('autoLoadFiles') ) {
    function autoLoadFiles($path) {
        $dir = $path . DS;
        $dh = opendir($dir);
        $dirList[] = $dir;
        while ( false !== ($filename = readdir($dh)) ) {
            if ( $filename != '.' && $filename != '..' && is_dir("{$dir}{$filename}") ) $dirList[] = "{$dir}{$filename}" . DS;
        }

        foreach ( $dirList as $dir ) {
            foreach ( glob($dir."*.php") as $filename ) require_once $filename;
        }
    }
}

if ( ! function_exists("sendMail") ) {
    function sendMail($to, $subject, $body, $from=[], $attachments=[], $cc=[], $bcc=[]) {
        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';

        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = SMTP_USERNAME;
        //Password to use for SMTP authentication
        $mail->Password = SMTP_PASSWORD;

        //Set who the message is to be sent from
        $mail->setFrom(SMTP_USERNAME, SMTP_FULLNAME);
        if ( ! empty($from) && is_array($from) ) $mail->setFrom($from['address'], $from['name']);


        //Set an alternative reply-to address
        // $mail->addReplyTo('replyto@example.com', 'First Last');


        //Set who the message is to be sent to
        foreach ( $to as $emailInfo ) {
            $address    = $emailInfo['address'];
            $name       = $emailInfo['name'];

            if ( empty($name) ) $mail->addAddress($address);
            else $mail->addAddress($address, $name);
        }

        //Set the subject line
        $mail->Subject  = $subject;
        $mail->msgHTML($body);

        if ( ! empty($attachments) ) {
            foreach ( $attachments as $attachment ) {
                $mail->addAttachment($attachment);
            }
        }

        $mail->send();
    }
}

if ( ! function_exists("dd") ) {
    function dd($arr) {
        die(pr($arr));
    }
}

if ( ! function_exists("pr") ) {
    function pr($arr) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
}

if ( ! function_exists("d") ) {
    function d($string) {
        echo "<p>{$string}</<p>";
    }
}

if ( ! function_exists("mkdirIfNotExist") ) {
    function mkdirIfNotExist($location, $path='app_acs', $mode=0777, $recursive=true) {
        $storeFolder = getPath($path) . '/'. $location;
        if ( !file_exists($storeFolder) ) mkdir($storeFolder, $mode, $recursive);

        return $storeFolder;
    }
}

if ( ! function_exists("generateUUID") ) {
    function generateUUID($length = 0) {
        $min = 100000000;
        $max = 999999999;

        $time1   = time();
        $random1 = rand($min, $max);
        $random2 = rand($min, $max);
        $random3 = rand($min, $max);
        $time2   = time();

        $hashString = hash('sha512', trim($random1 . $time1 . $random2 . $time2 . $random3));

        if ($length > 0)            return substr($hashString, -$length);

        return $hashString;
    }
}

if ( ! function_exists('encodeQuote')) {
    function encodeQuote($string) {
        return addslashes(htmlspecialchars(trim($string), ENT_QUOTES));
    }
}

if (! function_exists('decodeQuote')) {
    function decodeQuote($string) {
        return htmlspecialchars_decode(stripslashes($string));
    }
}
?>
