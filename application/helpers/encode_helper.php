<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (! function_exists('url_encode')) {

    function url_encode($str = '')
    {
        $CI = & get_instance();
        
        $CI->encrypt->set_cipher(MCRYPT_BLOWFISH);
        return strtr($CI->encrypt->encode($str), '+=/', '.-~');
    }
}

if (! function_exists('url_decode')) {

    function url_decode($str = '')
    {
        $CI = & get_instance();
        
        $CI->encrypt->set_cipher(MCRYPT_BLOWFISH);
        $str = strtr($str, '.-~', '+=/');
        return $CI->encrypt->decode($str);
    }
}

if (! function_exists('check_url_encode')) {

    function check_url($str = '')
    {
        $str = url_decode($str);
        if ($str === false)
            return false;
        return true;
    }
}

if (! function_exists('get_form_token')) {

    function get_form_token($token = null, $name = null, $decrypt = false)
    {
        $CI = & get_instance();
        
        $tmptoken = url_decode($token);
        if ($tmptoken === false) {
            if ($CI->input->post($name))
                return ($decrypt === true) ? url_decode($CI->input->post($name)) : $CI->input->post($name);
            else
                return false;
        }
        
        return $tmptoken;
    }
}

// End of file: encode_helper.php
// Location: ./system/application/helpers/encode_helper.php
