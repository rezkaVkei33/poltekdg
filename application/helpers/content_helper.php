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

        $column = ($language == 'english')
            ? $field . '_en'
            : $field . '_id';

        return isset($row->$column)
            ? $row->$column
            : '';
    }
}