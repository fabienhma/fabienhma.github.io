<?php
 /* PHP functions for website, some of which (most of which) are taken from CS50 psets 7 and 8 :) */
    require_once("constants.php");
    require("../includes/PHPMailer-master/PHPMailerAutoload.php");
    function apologize($message)
    {
        render("apology.php", ["message" => $message]);
        exit;
    }

    function render($template, $values = [])
    {
        // if template exists, render it
        if (file_exists("../templates/$template"))
        {
            // extract variables into local scope
            extract($values);

            // render header
            require("../templates/header.php");

            // render template
            require("../templates/$template");

            // render footer
            require("../templates/footer.php");
        }

        // else err
        else
        {
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }

    function query(/* $sql [, ... ] */)
    {
        // SQL statement
        $sql = func_get_arg(0);

        // parameters, if any
        $parameters = array_slice(func_get_args(), 1);

        // try to connect to database
        static $handle;
        if (!isset($handle))
        {
            try
            {
                // connect to database
                $handle = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);

                // ensure that PDO::prepare returns false when passed invalid SQL
                $handle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
            }
            catch (Exception $e)
            {
                // trigger (big, orange) error
                trigger_error($e->getMessage(), E_USER_ERROR);
                exit;
            }
        }

        // prepare SQL statement
        $statement = $handle->prepare($sql);
        if ($statement === false)
        {
            // trigger (big, orange) error
            trigger_error($handle->errorInfo()[2], E_USER_ERROR);
            exit;
        }

        // execute SQL statement
        $results = $statement->execute($parameters);

        // return result set's rows, if any
        if ($results !== false)
        {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }
    }

    function logout()
    {
        // Unset all of the session variables.
        $_SESSION = array();
        $_COOKIE = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) 
        {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
            );
        }

    // Finally, destroy the session.
    session_destroy();
    }

    // Taken from PHPMailer's GMAIL example
    function sendEmail($to, $name, $subject, $msg)
    {
        if(empty($to))
        {
            query("TRUNCATE `guest_crap`");
            echo "Successfully deleted!";
        }
        else
        {
            $mail = new PHPMailer;

            $mail->isSMTP();
            //$mail->SMTPDebug = 2;
            //$mail->Debugoutput = 'html';

            //Set the hostname of the mail server
            $mail->Host = 'smtp.gmail.com';

            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587;

            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls';

            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;

            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = "15minutefreewrites@gmail.com";

            //Password to use for SMTP authentication
            $mail->Password = EMAIL_PW;

            //Set who the message is to be sent from
            $mail->setFrom('15minutefreewrites@gmail.com', '15 Minute Freewrites');

            //Set an alternative reply-to address
            $mail->addReplyTo('15minutefreewrites@gmail.com', '15 Minute Freewrites');

            //Set who the message is to be sent to
            $mail->addAddress($to, $name);

            $mail->IsHTML(false);
            //Set the subject line
            $mail->Subject = $subject;

            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

            //Replace the plain text body with one created manually
            //$mail->AltBody = $msg;
            $mail->Body = $msg;
            //Attach an image file
            //$mail->addAttachment('images/phpmailer_mini.png');

            //send the message, check for errors
            if (!$mail->send()) 
            {   
                        
                echo "Mailer Error: " . $mail->ErrorInfo;
                echo "Retrying...";
                sendEmail($to, $name, $subject, $msg);
            } 
            else 
            {
                render("freewrite_sent.php");
            }
        }
    }

    function redirect($destination)
    {
        // handle URL
        if (preg_match("/^https?:\/\//", $destination))
        {
            header("Location: " . $destination);
        }

        // handle absolute path
        else if (preg_match("/^\//", $destination))
        {
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            header("Location: $protocol://$host$destination");
        }

        // handle relative path
        else
        {
            // adapted from http://www.php.net/header
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: $protocol://$host$path/$destination");
        }

        // exit immediately since we're redirecting anyway
        exit;
    }
?>