<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('send_mail'))
{
    function send_mail($to, $subject, $emailContent)
    {
        $from = 'shadyrock101@gmail.com';
        $emailContent = 'Hello and Welcome Here';
                    
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_user']    = $from;
        $config['smtp_pass']    = 'Shady Rock 101 149 !$(';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        // $config['smtp_timeout'] = '7';
        // $config['crlf']    = "\r\n";
        // $config['smtp_crypto'] = 'tls';
        // $config['validation'] = TRUE; // bool whether to validate email or not 

        $this->email->initialize($config);
        $this->email->from($from, 'Woodland University');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        if($this->email->send()){
            return true;
        }else{
            return false;
        }
    }   
}