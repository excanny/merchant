<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
 
if (! function_exists('SendMail')) {
    function SendMail($email, $name, $to, $subject, $message)
    {
        // get main CodeIgniter object
        $CI =& get_instance();
       
        // $config = Array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_port' => 465,
        //     'smtp_user' => 'veritygeosolutions@gmail.com',
        //     'smtp_pass' => 'Veritygeo1',
        //     'mailtype'  => 'html', 
        //     'charset'   => 'iso-8859-1'
        // );

        // $config = Array(
        //     'protocol' => 'mail',
        //     'smtp_host' => 'mail.awoofmart.ng',
        //     'smtp_port' => 587,
        //     'smtp_user' => 'sales@awoofmart.ng',
        //     'smtp_pass' => 'Excannyg*1914',
        //     'mailtype'  => 'html', 
        //     'charset'   => 'iso-8859-1'
        // );
        
           $config = Array(
            'protocol' => 'mail',
            'smtp_host' => 'mail.tae.com.ng',
            'smtp_port' => 465,
            'smtp_user' => 'test@tae.com.ng',
            'smtp_pass' => 'Pv(7y&?l0PM5',
            'smtp_crypto' => 'ssl',
            'mailtype'  => 'ssl', 
            'charset'   => 'iso-8859-1'
        );

        $CI->load->library('email', $config);
        $CI->email->set_mailtype("html");
        $CI->email->set_newline("\r\n");

        $CI->email->from($email, $name);

        $CI->email->to($to);

        $CI->email->subject($subject);
        $CI->email->message($message);

        $CI->email->send();
        return 1;
        
    }
}

?>