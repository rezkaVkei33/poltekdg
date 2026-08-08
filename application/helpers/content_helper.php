<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('current_language'))
{
    function current_language()
    {
        $CI =& get_instance();

        return $CI->session->userdata('site_language') ?: 'indonesia';
    }
}

if (!function_exists('is_english'))
{
    function is_english()
    {
        return current_language() === 'english';
    }
}

if (!function_exists('is_indonesia'))
{
    function is_indonesia()
    {
        return current_language() === 'indonesia';
    }
}

if (!function_exists('trans'))
{
    function trans($row, $field)
    {
        if (!$row) {
            return '';
        }

        $language = current_language();

        if ($language === 'english') {

            $field_en = $field . '_en';

            if (isset($row->$field_en) && trim($row->$field_en) !== '') {
                return $row->$field_en;
            }
        }

        return isset($row->$field)
            ? $row->$field
            : '';
    }
}

/**
 * Token URL publik untuk berita. Hasil enkripsi memakai IV acak, sehingga ID
 * internal tidak terlihat dan token yang sama dapat berbeda pada setiap render.
 */
if (!function_exists('berita_token'))
{
    function berita_token($id)
    {
        $id = (int) $id;
        if ($id < 1) {
            return '';
        }

        $CI =& get_instance();
        $CI->load->library('encryption');
        $encrypted = $CI->encryption->encrypt((string) $id);

        // Base64 URL-safe: tidak mengandung /, +, atau =.
        return rtrim(strtr($encrypted, '+/', '-_'), '=');
    }
}

if (!function_exists('berita_id_from_token'))
{
    function berita_id_from_token($token)
    {
        if (!is_string($token) || $token === '' || !preg_match('/^[A-Za-z0-9_-]+$/', $token)) {
            return FALSE;
        }

        $encrypted = strtr($token, '-_', '+/');
        $encrypted .= str_repeat('=', (4 - strlen($encrypted) % 4) % 4);

        $CI =& get_instance();
        $CI->load->library('encryption');
        $id = $CI->encryption->decrypt($encrypted);

        return is_string($id) && ctype_digit($id) && (int) $id > 0
            ? (int) $id
            : FALSE;
    }
}
