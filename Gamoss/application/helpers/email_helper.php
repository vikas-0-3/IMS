<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('send_email'))
{
    function send_email($to, $subject, $message, $attach=null)
    {
        $CI =& get_instance();

        $CI->load->config('email');
        $CI->load->library('email');
        
        $from = $CI->config->item('smtp_user');

        $CI->email->set_newline("\r\n");
        $CI->email->from($from);
        $CI->email->to($to);
        $CI->email->subject($subject);
        $CI->email->message($message);
        
        if($attach != null) {
            $CI->email->attach($attach, 'attachment', 'invoice');
        }


        if ($CI->email->send()) {
            return true;
        } else {
            return false;
        }
    }   
}